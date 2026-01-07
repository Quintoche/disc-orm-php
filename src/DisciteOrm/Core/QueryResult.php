<?php

namespace DisciteOrm\Core;

use DisciteOrm\Configurations\Enums\Query\QueryReturns;
use DisciteOrm\DisciteConnection;
use mysqli_result;

class QueryResult
{
    /**
     * Holds the executed query string.
     */
    private string $query;
    
    /**
     * Holds the raw query result data.
     *
     * @var array<int, array<string, mixed>>
     */
    private array $data = [];

    /**
     * Holds the raw result from the database.
     *
     * @var mysqli_result|bool
     */
    private mysqli_result|bool $rawResult;

    /**
     * Holds the return type of the query results.
     */
    private QueryReturns $returnType;

    /**
     * Constructor to initialize the query result with data.
     *
     * @param string $query The executed query string.
     */
    public function __construct(string $query, QueryReturns $returnType)
    {
        $this->query = $query;
        $this->returnType = $returnType;
        
        $this->executeQuery($this->query);
    }

    /**
     * Destructor to free up resources.
     */
    public function __destruct()
    {
        if($this->rawResult instanceof mysqli_result)
        {
            mysqli_free_result($this->rawResult);
        }
    }

    /**
     * Execute the query against the database.
     *
     * @param string $query The query string to execute.
     */
    protected function executeQuery(string $query) : void
    {
        try 
        {
            $this->rawResult = @mysqli_query(DisciteConnection::$mysqli, $query);
        } 
        catch (\Exception $e) 
        {
            $this->rawResult = false;
        }
    }

    /**
     * Fetch if there are any results in the result set.
     *
     * @return bool True if there are results, false otherwise.
     */
    public function fetch(): bool
    {
        if($this->rawResult instanceof mysqli_result)
        {
            return $this->rawResult->num_rows > 0;
        }
        elseif($this->rawResult === true)
        {
            return true;
        }
        elseif($this->rawResult === false)
        {
            return false;
        }

        return false;
    }

    /**
     * Fetch all results as an associative array.
     *
     * @return array<int, array<string, mixed>> The fetched data.
     */
    public function fetchAll() : array
    {
        if($this->rawResult instanceof mysqli_result)
        {
            $this->data = $this->rawResult->fetch_all(MYSQLI_ASSOC);
        }
        elseif($this->rawResult === true)
        {
            return ['result' => true];
        }
        elseif($this->rawResult === false)
        {
            return ['result' => false];
        }

        return $this->data;
    }

    /**
     * Fetch a single result as an associative array.
     *
     * @return array<string, mixed>|null The fetched data or null if no data.
     */
    public function fetchOne() : ?array
    {
        if($this->rawResult instanceof mysqli_result)
        {
            $data = $this->rawResult->fetch_assoc();
            return $data !== null ? $data : null;
        }
        elseif($this->rawResult === true)
        {
            return ['result' => true];
        }
        elseif($this->rawResult === false)
        {
            return ['result' => false];
        }

        return null;
    }

    /**
     * Fetch a single result by a specific field and value.
     *
     * @param string $field The field name to search by.
     * @param mixed $value The value to match.
     * @return array<string, mixed>|null The fetched data or null if no match found.
     */
    public function fetchByField(string $field, mixed $value) : ?array
    {
        if($this->rawResult instanceof mysqli_result)
        {
            while($row = $this->rawResult->fetch_assoc())
            {
                if(array_key_exists($field, $row) && $row[$field] === $value)
                {
                    return $row;
                }
            }
        }


        return null;
    }

    /**
     * Get the number of rows in the result set.
     *
     * @return int The number of rows.
     */
    public function rowCount() : int
    {
        if($this->rawResult instanceof mysqli_result)
        {
            $result = $this->rawResult->num_rows;
            return $result;
        }

        return 0;
    }

    /**
     * Get the number of affected rows.
     *
     * @return int The number of affected rows.
     */
    public function affectedRows() : int
    {
        return DisciteConnection::$mysqli->affected_rows;
    }

    /**
     * Get the raw result from the database.
     *
     * @return mysqli_result|bool The raw result.
     */
    public function getRawResult() : mysqli_result|bool
    {
        return $this->rawResult;
    }

    /**
     * Format data based on the return type.
     *
     * @param array<int, array<string, mixed>> $data
     * @return mixed
     */
    protected function formatData(array $data) : mixed
    {
        return match($this->returnType)
        {
            QueryReturns::ARRAY => $data,
            QueryReturns::JSON => json_encode($data),
            QueryReturns::OBJECT => (object) $data,
            QueryReturns::RAW => $data,
        };
    }

}

?>