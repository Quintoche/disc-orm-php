<?php

namespace DisciteOrm;

use DisciteOrm\Configurations\Default\CharsetDefaultConfig;
use DisciteOrm\Configurations\Default\ConnectionDefaultConfig;
use DisciteOrm\Configurations\Default\TimeZoneDefaultConfig;

class DisciteConst
{
    public const DEFAULT_FETCH_MODE = \PDO::FETCH_ASSOC;





    public const CONNECTION_DEFAULT_CONFIG_HOSTNAME = ConnectionDefaultConfig::DEFAULT_HOSTNAME;

    public const CONNECTION_DEFAULT_CONFIG_USERNAME = ConnectionDefaultConfig::DEFAULT_USERNAME;

    public const CONNECTION_DEFAULT_CONFIG_PASSWORD = ConnectionDefaultConfig::DEFAULT_PASSWORD;

    public const CONNECTION_DEFAULT_CONFIG_DATABASE = ConnectionDefaultConfig::DEFAULT_DATABASE;

    public const CONNECTION_DEFAULT_CONFIG_PORT = ConnectionDefaultConfig::DEFAULT_PORT;

    public const TIMEZONE_DEFAULT_CONFIG = TimeZoneDefaultConfig::DEFAULT_TIMEZONE;

    public const CHARSET_DEFAULT_CONFIG = CharsetDefaultConfig::DEFAULT_CHARSET;
}

?>