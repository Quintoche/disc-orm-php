<?php

namespace DisciteOrm\Builder\Readers;

trait FirstReader
{
    /**
     * Retrieve the first record from the result set.
     *
     * @return mixed
     */
    public function first() : mixed
    {
        $this->to(1);
        
        $this->createReaderInstance();
        
        return $this->queryResult->fetchAll()[0] ?? null;
    }
}

?>