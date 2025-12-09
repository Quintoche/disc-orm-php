<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait LessOrEqualClause
{
    /**
     * Adds a less or equal condition to the query.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function lessOrEqual(string $field, mixed $value): static
    {
        $this->clauses[] = [
            'type' => QueryClauses::LessOrEqual,
            'field' => $field,
            'value' => $value,
        ];

        return $this;
    }
}

?>