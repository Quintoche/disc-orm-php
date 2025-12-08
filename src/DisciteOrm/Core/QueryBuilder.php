<?php

namespace DisciteOrm\Core;

use DisciteOrm\Builder\Clauses\WhereClause;
use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Configurations\Enums\Query\QueryType;
use DisciteOrm\Configurations\Query\QueryBase;
use DisciteOrm\Query\QueryColumns;
use DisciteOrm\Query\QueryTable;
use DisciteOrm\Reader\GetReader;

class QueryBuilder
{
    use WhereClause;


    use GetReader;

    protected QueryBase $queryBase;
    
    protected QueryType $queryType;

    protected TableAbstract $table;

    protected ?array $data = null;

    protected ?array $conditions = null;

    protected string $queryString = '';




    protected array $columns = [];

    public function __construct(
        ?TableAbstract $table = null,
        ?QueryType $queryType = null,
    )
    {
        $this->table = $table;
        $this->queryType = $queryType;

        $this->queryBase = QueryBase::fromQueryType($queryType);
    }

    protected function retrieveQueryString() : string
    {
        $this->buildQuery();
        return $this->queryString;
    }

    public function type(?QueryType $queryType = null): QueryType|static
    {
        if($queryType)
        {
            $this->queryType = $queryType;
            return $this;
        }
        else
        {
            return $this->queryType;
        }
    }

    public function base(?QueryBase $queryBase = null): QueryBase|static
    {
        if($queryBase)
        {
            $this->queryBase = $queryBase;
            return $this;
        }
        else
        {
            return $this->queryBase;
        }
    }
    
    public function table(?TableAbstract $table = null): TableAbstract|static
    {
        if($table)
        {
            $this->table = $table;
            return $this;
        }
        else
        {
            return $this->table;
        }
    }

    public function data(?array $data = null): array|static
    {
        if($data)
        {
            $this->data = $data;
            return $this;
        }
        else
        {
            return $this->data;
        }
    }


    public function addColumn(string $columns) : static
    {
        $this->columns[] = $columns;
        return $this;
    }


    public function columns(?array $columns = null) : array|static
    {
        if($columns)
        {
            $this->columns = $columns;
            return $this;
        }
        else
        {
            return $this->columns;
        }
    }


    public function conditions(?array $conditions = null) : array|static
    {
        if($conditions)
        {
            $this->conditions = $conditions;
            return $this;
        }
        else
        {
            return $this->conditions;
        }
    }

    private function buildQuery()
    {
        $this->queryString = str_replace(
            [
                '{TABLE}',
                '{COLUMNS}',
                '{VALUES}',
                '{CONDITIONS}',
                '{ORDER}',
                '{LIMIT}',
            ],
            [
                $this->buildTable(),
                $this->buildColumns(),
                $this->buildValues(),
                $this->buildConditions(),
                $this->buildOrder(),
                $this->buildLimit(),
            ],
            $this->queryBase->value
        );
    }

    private function buildTable() : string
    {
        return QueryTable::toSql($this->table);
    }

    private function buildColumns() : string
    {
        return QueryColumns::toSql($this->columns, $this->table, $this->queryType);
    }

    private function buildValues() : string
    {
        // Implementation for building values
        return '';
    }

    private function buildConditions() : string
    {
        // Implementation for building where clause
        return '';
    }

    private function buildOrder() : string
    {
        // Implementation for building order clause
        return '';
    }

    private function buildLimit() : string
    {
        // Implementation for building limit clause
        return '';
    }
}

?>