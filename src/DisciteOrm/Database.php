<?php

namespace DisciteOrm;

use DisciteOrm\Core\ColumnsManager;
use DisciteOrm\Core\QueryBuilder;
use DisciteOrm\Core\TablesManager;
use DisciteOrm\Reader\AllReader;
use DisciteOrm\Reader\ColumnsReader;
use DisciteOrm\Reader\TablesReader;
use DisciteOrm\Tables\Table;

class Database
{
    use AllReader;
    use ColumnsReader;
    use TablesReader;

    protected TablesManager $tablesManager;

    protected ColumnsManager $columnsManager;


    public function __construct(TablesManager $tablesManager, ColumnsManager $columnsManager)
    {
        $this->tablesManager = $tablesManager;

        $this->columnsManager = $columnsManager;
    }

    /**
     * Selects the database to use.
     *
     * @param string|null $databaseName The name of the database to select. If null, no action is taken.
     * @return \DisciteOrm\Database Returns the current Database instance for method chaining.
     */
    public function database(?string $databaseName = null) : self
    {
        if($databaseName)
        {
            DisciteConnection::$mysqli->select_db($databaseName);
        }

        return $this;
    }

    /**
     * Initializes a query builder for the specified table.
     *
     * @param string $tableName The name of the table to query.
     * @return \DisciteOrm\Core\QueryBuilder The query builder instance.
     */
    public function table(string $tableName): QueryBuilder
    {
        return new QueryBuilder(
            new Table($tableName),
            null,
        );
    }
}

?>