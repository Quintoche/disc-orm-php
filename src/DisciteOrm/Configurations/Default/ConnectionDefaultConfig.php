<?php

namespace DisciteOrm\Configurations\Default;

final class ConnectionDefaultConfig
{
    public const DEFAULT_HOSTNAME = 'localhost';
    
    public const DEFAULT_USERNAME = 'root';
    
    public const DEFAULT_PASSWORD = '';
    
    public const DEFAULT_DATABASE = 'db';
    
    public const DEFAULT_PORT = null;

    public static ?string $DATABASE = null;
}
?>