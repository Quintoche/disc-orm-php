<?php

namespace DisciteOrm\Builder\Readers;

use DisciteOrm\Core\QueryResult;

trait Reader
{
    /**
     * Create the QueryResult instance.
     *
     * @return static
     */
    protected function createReaderInstance(): static
    {
        if(!$this->queryResult)
        {
            $this->queryResult = new QueryResult(
                $this->getQuery(),
                $this->returnType
            );
        }
        
        return $this;
    }
}


?>