<?php

namespace DisciteOrm\Builder\Query;

use DisciteOrm\Configurations\Enums\Query\QueryType;

trait UpdateQuery
{
    /**
     * Update records in the database.
     *
     * @param array<string|ColumnAbstract, mixed> $data The data to update.
     * 
     * @return \DisciteOrm\Core\QueryBuilder The query builder instance.
     */
    public function update(array $data): static
    {
        $this->type(QueryType::UPDATE);

        foreach($data as $column => $value)
        {
            $this->data[$column] = $value;
        }

        return $this;
    }
}