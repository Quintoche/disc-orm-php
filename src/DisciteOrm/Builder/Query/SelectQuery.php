<?php

namespace DisciteOrm\Builder\Query;

use DisciteOrm\Configurations\Enums\Query\QueryType;
use DisciteOrm\Configurations\Query\QueryBase;
use DisciteOrm\Core\QueryBuilder;
use DisciteOrm\Tables\_All;
use DisciteOrm\Utilities\Paths\TraitNameToQueryBase;

trait SelectQuery
{
    /**
     * Get a list of records from the database.
     *
     * @param array<string|ColumnAbstract> $columns The columns to select.
     * 
     * @return QueryBuilder The query builder instance.
     */
    public function listing(array $columns = [new _All()]): QueryBuilder
    {
        $queryBuilder = new QueryBuilder(
            $this,
            QueryType::SELECT,
        );

        foreach($columns as $column)
        {
            $queryBuilder->addColumn($column);
        }

        return $queryBuilder;
    }

    /**
     * Select records from the database.
     *
     * @param array<string|ColumnAbstract> $columns The columns to select.
     * 
     * @return QueryBuilder The query builder instance.
     */
    public function select(array $columns = [new _All()]): QueryBuilder
    {
        $queryBuilder = new QueryBuilder(
            $this,
            QueryType::SELECT,
        );

        foreach($columns as $column)
        {
            $queryBuilder->addColumn($column);
        }

        return $queryBuilder;
    }
}

?>