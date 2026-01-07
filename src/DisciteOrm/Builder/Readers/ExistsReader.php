<?php

namespace DisciteOrm\Builder\Readers;

trait ExistsReader
{
    /**
     * Check if any record exists in the result set.
     *
     * @return bool
     */
    public function exists() : bool
    {   
        $this->createReaderInstance();
        
        $result = $this->queryResult->fetchAll();
        return !empty($result);
    }
}

?>