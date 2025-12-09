<?php

namespace DisciteOrm\Builder\Clauses;

use DisciteOrm\Configurations\Enums\Query\QueryModifiers;

trait LimitModifier
{
    /**
     * Adds a limit to the query.
     *
     * @param int $limit
     * @param int $offset
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function limit(int $limit, int $offset = 0): static
    {
        $this->modifiers[] = [
            'type' => QueryModifiers::Limit,
            'field' => 'limit',
            'value' => $limit,
        ];

        $this->modifiers[] = [
            'type' => QueryModifiers::Offset,
            'field' => 'offset',
            'value' => $offset,
        ];
        
        return $this;
    }
}

?>