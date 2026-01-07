<?php

namespace DisciteOrm\Builder\Readers;

trait NextReader
{
    /**
     * Retrieve the next record from the result set.
     *
     * @return mixed
     */
    public function next() : mixed
    {   
        $this->createReaderInstance();
        
        return $this->queryResult->fetchOne();
    }
}

?>