<?php

namespace DisciteOrm\Builder\Readers;

trait CountReader
{
    /**
     * Get the count of records in the result set.
     *
     * @return int
     */
    public function count() : int
    {   
        $this->createReaderInstance();
        
        return $this->queryResult->rowCount();
    }
}

?>