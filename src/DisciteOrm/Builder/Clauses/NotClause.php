<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait NotClause
{
    /**
     * Adds a not condition to the query.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function not(string $field, mixed $value): static
    {
        $this->clauses[] = [
            'type' => (is_null($value)) ? QueryClauses::NotNull : QueryClauses::Not,
            'field' => $field,
            'value' => $value,
        ];

        return $this;
    }
}

?>