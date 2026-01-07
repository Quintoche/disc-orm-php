<?php

namespace DisciteOrm\Reader;

trait AllReader
{
    /**
     * Reads all tables and their columns from the database.
     * 
     * @return array The tables and columns information.
     */
    public function readAll() : array
    {
        $tables = $this->readTables();

        $columns = $this->readColumns();

        return [
            'tables' => $tables,
            'columns' => $columns
        ];
    }

    /**
     * Stores all tables and their columns in the TablesManager.
     * 
     * @return array The stored tables and columns information.
     */
    public function storeAll() : array
    {
        $tables = $this->storeTables();

        $columns = $this->storeColumns();

        return [
            'tables' => $tables,
            'columns' => $columns
        ];
    }
}

?>