<?php

namespace DisciteOrm\Builder\Query;

use DisciteOrm\Configurations\Enums\Query\QueryType;

trait InsertQuery
{
    /**
     * Insert records into the database.
     *
     * @param array<string|ColumnAbstract, mixed> $data The data to insert.
     * 
     * @return \DisciteOrm\Core\QueryBuilder The query builder instance.
     */
    public function insert(array $data): static
    {
        
        $this->type(QueryType::INSERT);

        foreach($data as $column => $value)
        {
            $this->data[$column] = $value;
        }

        foreach(array_keys($data) as $column)
        {
            $this->columns[] = $column;
        }

        return $this;
    }

    /**
     * Create records in the database.
     *
     * @param array<string|ColumnAbstract, mixed> $data The data to create.
     * 
     * @return \DisciteOrm\Core\QueryBuilder The query builder instance.
     */
    public function create(array $data): static
    {
        $this->type(QueryType::INSERT);

        foreach($data as $column => $value)
        {
            $this->data[$column] = $value;
        }

        foreach(array_keys($data) as $column)
        {
            $this->columns[] = $column;
        }

        return $this;
    }
}

?>