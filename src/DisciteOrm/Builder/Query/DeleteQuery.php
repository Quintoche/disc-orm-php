<?php

namespace DisciteOrm\Builder\Query;

use DisciteOrm\Configurations\Contracts\ColumnAbstract;
use DisciteOrm\Configurations\Enums\Query\QueryType;
use DisciteOrm\Configurations\Query\QueryBase;
use DisciteOrm\Core\QueryBuilder;
use DisciteOrm\Utilities\Paths\TraitNameToQueryBase;

trait DeleteQuery
{
    /**
     * Delete records based on a column and its value.
     *
     * @param ColumnAbstract|string $column The column to match.
     * @param mixed $value The value to match against the column.
     * 
     * @return QueryBuilder The query builder instance.
     */
    public function delete(ColumnAbstract|string $column, mixed $value): QueryBuilder
    {
        $queryBuilder = new QueryBuilder();
        $queryBuilder
            ->table($this)
            ->base(TraitNameToQueryBase::render(__CLASS__))
            ->type(QueryType::DELETE)
            ->conditions([$column => $value]);
        
        return $queryBuilder;
    }

    /**
     * Remove records based on a column and its value.
     *
     * @param ColumnAbstract|string $column The column to match.
     * @param mixed $value The value to match against the column.
     * 
     * @return QueryBuilder The query builder instance.
     */
    public function remove(ColumnAbstract|string $column, mixed $value): QueryBuilder
    {
        $queryBuilder = new QueryBuilder();
        $queryBuilder
            ->table($this)
            ->base(TraitNameToQueryBase::render(__CLASS__))
            ->conditions([$column => $value]);

        return $queryBuilder;
    }
}

?>