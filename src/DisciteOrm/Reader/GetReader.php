<?php

namespace DisciteOrm\Reader;

trait GetReader
{
    public function get() : string
    {
        return $this->retrieveQueryString();
    }
}

?>