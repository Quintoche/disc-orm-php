<?php

namespace DisciteOrm\Builder\Definers;

use DisciteOrm\Configurations\Enums\Query\QueryReturns;

trait Returns
{
    /**
     * Specifies the return type of the query results.
     *
     * @param QueryReturns $type
     * 
     * @return \DisciteOrm\Core\QueryBuilder
     */
    public function returns(QueryReturns $type): static
    {
        $this->returnType = $type;
        return $this;
    }
}

?>