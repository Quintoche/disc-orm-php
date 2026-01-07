<?php

namespace DisciteOrm\Builder\Modifiers;

use DisciteOrm\Configurations\Enums\Query\QueryModifiers;
use DisciteOrm\Configurations\Enums\Query\QuerySort;

trait OrderModifier
{
    /**
     * Adds an order by condition to the query.
     *
     * @param string $field
     * @param QuerySort $direction
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function orderBy(string $field, QuerySort $direction = QuerySort::ASC): static
    {
        $this->modifiers[] = [
            'type' => QueryModifiers::Order,
            'field' => $field,
            'value' => $direction,
        ];
        return $this;
    }
}

?>