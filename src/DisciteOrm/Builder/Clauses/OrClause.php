<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;

trait OrClause
{
    /**
     * Adds an or condition to the query.
     *
     * @param ?string $field
     * @param mixed ...$value
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function or(?string $field = null, mixed ...$value): static
    {
        $this->clauses[] = [
            'type' => (is_null($field)) ? QueryClauses::OrGroup : QueryClauses::Or,
            'field' => $field,
            'value' => $value ?: null,
        ];
    
        return $this;
    }
}

?>