<?php

namespace DisciteOrm\Builder\Query;

use DisciteOrm\Configurations\Enums\Query\QueryType;

trait SelectQuery
{
    /**
     * Get a list of records from the database.
     *
     * @param array<string|ColumnAbstract> $columns The columns to select.
     * 
     * @return \DisciteOrm\Core\QueryBuilder The query builder instance.
     */
    public function listing(mixed ...$columns): static
    {
        $this->type(QueryType::SELECT);

        foreach($columns as $column)
        {
            $this->columns[] = $column;
        }
        return $this;
    }

    /**
     * Select records from the database.
     *
     * @param array<string|ColumnAbstract> $columns The columns to select.
     * 
     * @return \DisciteOrm\Core\QueryBuilder The query builder instance.
     */
    public function select(mixed ...$columns) : static
    {
        $this->type(QueryType::SELECT);

        foreach($columns as $column)
        {
            $this->columns[] = $column;
        }
        return $this;
    }
}

?>