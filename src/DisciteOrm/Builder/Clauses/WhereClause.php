<?php

namespace DisciteOrm\Builder\Clauses;

trait WhereClause
{
    protected array $whereConditions = [];

    /**
     * Adds a where condition to the query.
     *
     * @param string $field
     * @param mixed $value
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function where(string $field, mixed $value): static
    {
        $this->whereConditions[] = [$field, $value];
        return $this;
    }
}

?>