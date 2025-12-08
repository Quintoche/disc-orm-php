<?php

namespace DisciteOrm\Builder\Query;

use DisciteOrm\Configurations\Enums\Query\QueryType;
use DisciteOrm\Configurations\Query\QueryBase;
use DisciteOrm\Core\QueryBuilder;
use DisciteOrm\Utilities\Paths\TraitNameToQueryBase;

trait UpdateQuery
{
    /**
     * Update records in the database.
     *
     * @param array<string|ColumnAbstract, mixed> $data The data to update.
     * 
     * @return QueryBuilder The query builder instance.
     */
    public function update(array $data): QueryBuilder
    {
        $queryBuilder = new QueryBuilder();
        $queryBuilder
            ->table($this)
            ->base(TraitNameToQueryBase::render(__CLASS__))
            ->type(QueryType::UPDATE)
            ->data($data);

        return $queryBuilder;
    }
}