<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait LikeClause
{
    /**
     * Adds a like condition to the query.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function like(string $field, mixed $value): static
    {
        $this->clauses[] = [
            'type' => QueryClauses::Like,
            'field' => $field,
            'value' => $value,
        ];

        return $this;
    }
}

?>