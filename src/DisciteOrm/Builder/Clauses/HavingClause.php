<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait HavingClause
{
    /**
     * Adds a having condition to the query.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function having(string $field, mixed $value): static
    {
        $this->clauses[] = [
            'type' => QueryClauses::Having,
            'field' => $field,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * Adds a contains condition to the query.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function contains(string $field, mixed $value): static
    {
        $this->clauses[] = [
            'type' => QueryClauses::Having,
            'field' => $field,
            'value' => $value,
        ];

        return $this;
    }
}

?>