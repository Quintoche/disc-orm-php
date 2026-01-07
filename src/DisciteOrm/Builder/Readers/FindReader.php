<?php

namespace DisciteOrm\Builder\Readers;

trait FindReader
{
    /**
     * Retrieve a record by key.
     *
     * @param mixed $id
     * @return mixed
     */
    public function find(string $field, mixed $value) : mixed
    {   
        $this->createReaderInstance();
        
        return $this->queryResult->fetchByField($field, $value);
    }
}

?>