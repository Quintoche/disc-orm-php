<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait LessThanClause
{
    /**
     * Adds a less than condition to the query.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function lessThan(string $field, mixed $value): static
    {
        $this->clauses[] = [
            'type' => QueryClauses::LessThan,
            'field' => $field,
            'value' => $value,
        ];

        return $this;
    }
}

?>