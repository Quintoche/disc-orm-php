<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait BetweenClause
{
    /**
     * Adds a between condition to the query.
     *
     * @param string $field
     * @param mixed $start
     * @param mixed $end
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function between(string $field, mixed $start, mixed $end): static
    {
        $this->clauses[] = [
            'type' => QueryClauses::Between,
            'field' => $field,
            'value' => [$start, $end],
        ];

        return $this;
    }
}

?>