<?php

namespace DisciteOrm\Builder\Readers;

trait FetchReader
{
    /**
     * Fetch the records from the result set.
     *
     * @return bool
     */
    public function fetch() : bool
    {   
        $this->createReaderInstance();
        
        return $this->queryResult->fetch();
    }
}

?>