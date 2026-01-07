<?php

namespace DisciteOrm\Builder\Readers;

trait LastReader
{
    /**
     * Retrieve the last record from the result set.
     *
     * @return mixed
     */
    public function last() : mixed
    {
        $this->createReaderInstance();
        
        $allResults = $this->queryResult->fetchAll();
        return $allResults[count($allResults) - 1] ?? null;
    }
}

?>