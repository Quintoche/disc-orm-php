<?php

namespace DisciteOrm\Builder\Query;

use DisciteOrm\Configurations\Enums\Query\QueryType;
use DisciteOrm\Configurations\Query\QueryBase;
use DisciteOrm\Core\QueryBuilder;
use DisciteOrm\Utilities\Paths\TraitNameToQueryBase;

trait InsertQuery
{
    /**
     * Insert records into the database.
     *
     * @param array<string|ColumnAbstract, mixed> $data The data to insert.
     * 
     * @return QueryBuilder The query builder instance.
     */
    public function insert(array $data): QueryBuilder
    {
        
        $queryBuilder = new QueryBuilder();
        $queryBuilder
            ->table($this)
            ->base(TraitNameToQueryBase::render(__CLASS__))
            ->type(QueryType::INSERT)
            ->data($data)
            ->columns(array_keys($data));
        
        return $queryBuilder;
    }

    /**
     * Create records in the database.
     *
     * @param array<string|ColumnAbstract, mixed> $data The data to create.
     * 
     * @return QueryBuilder The query builder instance.
     */
    public function create(array $data): QueryBuilder
    {
        $queryBuilder = new QueryBuilder();
        $queryBuilder
            ->table($this)
            ->base(TraitNameToQueryBase::render(__CLASS__))
            ->type(QueryType::INSERT)
            ->data($data)
            ->columns(array_keys($data));

        return $queryBuilder;
    }
}

?>