<?php

namespace DisciteOrm\Builder\Modifiers;

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
        $this->to($limit);

        if(!$this->hasOffset())
        {
            $this->from($offset);
        }
        
        return $this;
    }

    /**
     * Set an offset for the query.
     *
     * @param int $offset
     * 
     * @return static
     */
    public function from(int $offset) : static
    {
        $this->modifiers[] = [
            'type' => QueryModifiers::Offset,
            'field' => 'offset',
            'value' => $offset,
        ];

        return $this;
    }

    /**
     * Set a limit for the query.
     *
     * @param int $limit
     * 
     * @return static
     */
    public function to(int $limit) : static
    {
        $this->modifiers[] = [
            'type' => QueryModifiers::Limit,
            'field' => 'limit',
            'value' => $limit,
        ];

        return $this;
    }

        /**
     * Check if an offset modifier already exists.
     *
     * @return bool
     */
    protected function hasOffset() : bool
    {
        foreach($this->modifiers as $modifier)
        {
            if($modifier['type'] === QueryModifiers::Offset)
            {
                return true;
            }
        }

        return false;
    }
}

?>