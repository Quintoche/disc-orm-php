<?php

namespace DisciteOrm;

use mysqli;

class DisciteConnection
{

    /**
     * The database connection instance.
     *
     * @var ?mysqli
     */
    public static ?mysqli $mysqli = null;


    /**
     * Constructor to initialize the database connection.
     *
     * @param ?mysqli $connection Optional custom mysqli connection.
     */
    public function __construct(?mysqli $connection = null)
    {
        self::$mysqli = $connection ? self::useCustomParameters($connection) : self::useDefaultParameters();

        if(!self::allowConnection(self::$mysqli))
        {
            throw new \RuntimeException('Connection failed: ' . self::$mysqli->connect_error);
        }
        else
        {
            $this->connect();
        }
        
        
    }

    /**
     * Destructor to clean up the database connection.
     */
    public function __destruct()
    {
        if (self::$mysqli) {
            self::$mysqli->close();
        }
    }

    /**
     * Connect to the database.
     *
     * Define all necessary settings after connection.
     *
     * @return void
     */
    private function connect(): void
    {
        $this->timezone();
        $this->charset();
    }

    /**
     * Set the timezone for the database connection.
     *
     * @return void
     */
    private function timezone() : void
    {
        self::$mysqli->query("SET time_zone = '" . DisciteConst::TIMEZONE_DEFAULT_CONFIG . "'");
    }

    /**
     * Set the character set for the database connection.
     *
     * @return void
     */
    private function charset() : void
    {
        self::$mysqli->set_charset(DisciteConst::CHARSET_DEFAULT_CONFIG);
    }


    /**
     * Check if the connection is allowed.
     *
     * @param ?mysqli $connection The mysqli connection to check.
     * @return bool True if the connection is allowed, false otherwise.
     */
    private static function allowConnection(mysqli $connection) : bool
    {
        if(!$connection)
        {
            return false;
        }

        if($connection->connect_error)
        {
            return false;
        }

        return true;
    }


    /**
     * Use the default database connection parameters.
     *
     * @return ?mysqli The mysqli connection instance.
     */
    private static function useDefaultParameters() : ?mysqli
    {
        return new mysqli(
            DisciteConst::CONNECTION_DEFAULT_CONFIG_HOSTNAME,
            DisciteConst::CONNECTION_DEFAULT_CONFIG_USERNAME,
            DisciteConst::CONNECTION_DEFAULT_CONFIG_PASSWORD,
            DisciteConst::CONNECTION_DEFAULT_CONFIG_DATABASE,
            DisciteConst::CONNECTION_DEFAULT_CONFIG_PORT
        );
    }

    /**
     * Use custom database connection parameters.
     *
     * @param ?mysqli $connection The custom mysqli connection.
     * @return ?mysqli The mysqli connection instance.
     */
    private static function useCustomParameters(?mysqli $connection) : ?mysqli
    {
        return $connection;
    }
}

?>