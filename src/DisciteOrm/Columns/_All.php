<?php

namespace DisciteOrm\Tables;

use DisciteOrm\Configurations\Contracts\ColumnAbstract;

class _All extends ColumnAbstract
{
    protected string $name = '*';

    public function __construct()
    {
        $this->name = '*';
    }
}

?>