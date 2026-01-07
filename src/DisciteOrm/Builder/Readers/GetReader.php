<?php

namespace DisciteOrm\Builder\Readers;

trait GetReader
{
    /**
     * Retrieve the query string.
     *
     * @return string
     */
    public function get() : string
    {
        return $this->retrieveQueryString();
    }

    /**
     * Alias for get() method to retrieve the query string.
     *
     * @return string
     */
    public function getQuery() : string
    {
        return $this->get();
    }
}

?>