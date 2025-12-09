<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait NotInClause
{
    /**
     * Adds a not in condition to the query.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function notIn(string $field, mixed $value): static
    {
        $this->clauses[] = [
            'type' => QueryClauses::NotIn,
            'field' => $field,
            'value' => $value,
        ];

        return $this;
    }
}

?>