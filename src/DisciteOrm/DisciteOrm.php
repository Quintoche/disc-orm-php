<?php

namespace DisciteOrm;

use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Core\TablesManager;
use mysqli;

class DisciteOrm
{
    private DisciteConfiguration $config;

    private Database $database;

    private DisciteConnection $connection;

    private TablesManager $tablesManager;

    public function __construct(?mysqli $connection = null)
    {
        $this->connection = $connection ? new DisciteConnection($connection) : new DisciteConnection();

        $this->config = new DisciteConfiguration();
        
        $this->database = new Database();
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

    
}

?>