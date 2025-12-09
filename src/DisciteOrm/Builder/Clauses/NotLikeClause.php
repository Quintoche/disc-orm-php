<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait NotLikeClause
{
    /**
     * Adds a not like condition to the query.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function notLike(string $field, mixed $value): static
    {
        $this->clauses[] = [
            'type' => QueryClauses::NotLike,
            'field' => $field,
            'value' => $value,
        ];

        return $this;
    }
}

?>