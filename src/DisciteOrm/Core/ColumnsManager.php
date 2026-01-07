<?php

namespace DisciteOrm\Core;

use DisciteOrm\Configurations\Contracts\ColumnAbstract;

class ColumnsManager
{
    /**
     * Holds the registered columns.
     *
     * @var array<string, ColumnAbstract>
     */
    private array $columns = [];

    /**
     * Registers a table with the manager.
     *
     * @param string $name The name of the table.
     * @param ColumnAbstract $column The column instance.
     * @return void
     */
    public function registerColumn(string $name, ColumnAbstract $column): void
    {
        $this->columns[$name] = $column;
    }

    /**
     * Retrieves a registered column by name.
     *
     * @param string $name The name of the table.
     * @return ColumnAbstract|null The table instance or null if not found.
     */
    public function getColumn(string $name): ?ColumnAbstract
    {
        return $this->columns[$name] ?? null;
    }

    /**
     * Retrieves all registered columns.
     *
     * @return array<string, ColumnAbstract> The array of registered columns.
     */
    public function getColumns() : array
    {
        return $this->columns;
    }

}

?>