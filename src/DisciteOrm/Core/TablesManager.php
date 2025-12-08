<?php

namespace DisciteOrm\Core;

use DisciteOrm\Configurations\Contracts\TableAbstract;

class TablesManager
{
    /**
     * Holds the registered tables.
     *
     * @var array<string, TableAbstract>
     */
    private array $tables = [];

    /**
     * Registers a table with the manager.
     *
     * @param string $name The name of the table.
     * @param Table $table The table instance.
     * @return void
     */
    public function registerTable(string $name, TableAbstract $table): void
    {
        $this->tables[$name] = $table;
    }

    /**
     * Retrieves a registered table by name.
     *
     * @param string $name The name of the table.
     * @return TableAbstract|null The table instance or null if not found.
     */
    public function getTable(string $name): ?TableAbstract
    {
        return $this->tables[$name] ?? null;
    }

}

?>