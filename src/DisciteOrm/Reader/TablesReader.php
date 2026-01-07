<?php

namespace DisciteOrm\Reader;

use DisciteOrm\DisciteConnection;
use DisciteOrm\Utilities\Readers\Tables\RenderTable;

trait TablesReader
{
    /**
     * Reads all table names from the current database.
     *
     * @return array An array of table names.
     */
    public function readTables() : array
    {
        $query = "SELECT table_name FROM information_schema.tables WHERE table_type = 'BASE TABLE' AND table_schema = DATABASE();";
        
        $result = DisciteConnection::$mysqli->query($query)->fetch_all(MYSQLI_ASSOC) ?? [];

        return array_map(fn($table) => $table['table_name'], $result);
    }

    /**
     * Reads and stores all tables in the TablesManager.
     *
     * @return array An array of stored tables.
     */
    public function storeTables(): array
    {
        $tables = $this->readTables();
        
        foreach($tables as $table)
        {
            $tableClass = RenderTable::render(
                ['TABLE_NAME' => $table]
            );

            $this->tablesManager->registerTable(
                ucfirst($table),
                $tableClass
            );
        }
        
        return $this->tablesManager->getTables();
    }

    /**
     * Retrieves all registered tables from the TablesManager.
     *
     * @return array An array of registered tables with their details.
     */
    public function getTables() : array
    {
        $tables = [];

        foreach($this->tablesManager->getTables() as $table)
        {
            $tables[] = [
                'name' => $table->name(),
                'type' => $table->type()->name,
                'primaryKey' => $table->primaryKey()?->name(),
            ];
        }

        return $tables;
    }
}

?>