<?php

namespace DisciteOrm\Builder\Query;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;
use DisciteOrm\Configurations\Enums\Query\QueryType;

trait DeleteQuery
{
    /**
     * Delete records based on a column and its value.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder The query builder instance.
     */
    public function delete(string $field, mixed $value): static
    {
        $this->type(QueryType::DELETE);

        $this->clauses[] = [
            'type' => (is_null($value)) ? QueryClauses::Null : QueryClauses::Equal,
            'field' => $field,
            'value' => $value,
        ];

        return $this;

    }

    /**
     * Remove records based on a column and its value.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder The query builder instance.
     */
    public function remove(string $field, mixed $value): static
    {
        $this->type(QueryType::DELETE);

        $this->clauses[] = [
            'type' => (is_null($value)) ? QueryClauses::Null : QueryClauses::Equal,
            'field' => $field,
            'value' => $value,
        ];

        return $this;
    }
}

?>