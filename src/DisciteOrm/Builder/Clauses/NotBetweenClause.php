<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait NotBetweenClause
{
    /**
     * Adds a not between condition to the query.
     *
     * @param string $field
     * @param mixed $start
     * @param mixed $end
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function notBetween(string $field, mixed $start, mixed $end): static
    {
        $this->clauses[] = [
            'type' => QueryClauses::NotBetween,
            'field' => $field,
            'value' => [$start, $end],
        ];

        return $this;
    }
}

?>