<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait AndClause
{
    /**
     * Adds an and condition to the query.
     *
     * Used to combine multiple clauses.
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function and(): static
    {
        $this->clauses[] = [
            'type' => QueryClauses::AndGroup,
            'field' => null,
            'value' => null,
        ];

        return $this;
    }
}

?>