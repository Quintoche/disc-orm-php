<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait NotHavingClause
{
    /**
     * Adds a not condition to the query.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function notHaving(string $field, mixed $value): static
    {
        $this->clauses[] = [
            'type' => QueryClauses::NotHaving,
            'field' => $field,
            'value' => $value,
        ];

        return $this;
    }
}

?>