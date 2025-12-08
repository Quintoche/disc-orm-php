<?php

namespace DisciteOrm;

use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Configurations\Contracts\TableInterface;
use DisciteOrm\Tables\Table;
use mysqli;

class Database
{
    /**
     * Selects the database to use.
     *
     * @param string|null $databaseName The name of the database to select. If null, no action is taken.
     * @return \DisciteOrm\Database Returns the current Database instance for method chaining.
     */
    public function database(?string $databaseName = null) : self
    {
        if ($databaseName) {
            DisciteConnection::$mysqli->select_db($databaseName);
        }


        return $this;
    }


    public function table(string $tableName): TableAbstract
    {
        return new Table($tableName);
    }
}

?>