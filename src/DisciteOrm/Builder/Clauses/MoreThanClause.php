<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait MoreThanClause
{
    /**
     * Adds a more than condition to the query.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function moreThan(string $field, mixed $value): static
    {
        $this->clauses[] = [
            'type' => QueryClauses::MoreThan,
            'field' => $field,
            'value' => $value,
        ];

        return $this;
    }
}

?>