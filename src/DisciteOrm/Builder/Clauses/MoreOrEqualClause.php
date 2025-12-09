<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait MoreOrEqualClause
{
    /**
     * Adds a more or equal condition to the query.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function moreOrEqual(string $field, mixed $value): static
    {
        $this->clauses[] = [
            'type' => QueryClauses::MoreOrEqual,
            'field' => $field,
            'value' => $value,
        ];

        return $this;
    }
}

?>