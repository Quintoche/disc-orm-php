<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait InClause
{
    /**
     * Adds an in condition to the query.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function in(string $field, mixed $value): static
    {
        $this->clauses[] = [
            'type' => QueryClauses::In,
            'field' => $field,
            'value' => $value,
        ];

        return $this;
    }
}

?>