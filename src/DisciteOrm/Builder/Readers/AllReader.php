<?php

namespace DisciteOrm\Builder\Readers;

trait AllReader
{
    /**
     * Retrieve all records from the result set.
     *
     * @return array
     */
    public function all() : array
    {   
        $this->createReaderInstance();
        
        return $this->queryResult->fetchAll();
    }
}

?>