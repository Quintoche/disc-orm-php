<?php

namespace DisciteOrm;

use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Core\ColumnsManager;
use DisciteOrm\Core\TablesManager;
use DisciteOrm\Tables\Column;
use mysqli;

class DisciteOrm
{
    private DisciteConfiguration $config;

    private Database $database;

    private DisciteConnection $connection;

    private TablesManager $tablesManager;

    private ColumnsManager $columnsManager;

    public function __construct(?mysqli $connection = null)
    {
        $this->connection = $connection ? new DisciteConnection($connection) : new DisciteConnection();

        $this->config = new DisciteConfiguration();
        
        $this->tablesManager = new TablesManager();
        
        $this->columnsManager = new ColumnsManager();
        
        $this->database = new Database($this->tablesManager, $this->columnsManager);
    }

    public function configuration() : DisciteConfiguration
    {
        return $this->config;   
    }

    public function database(?string $databaseName = null) : Database
    {
        return $this->database->database($databaseName);
    }

    public function connection(): mysqli
    {
        return $this->connection::$mysqli;
    }

    public function tables() : TablesManager
    {
        return $this->tablesManager;
    }

    public function columns() : ColumnsManager
    {
        return $this->columnsManager;
    }
}

?>