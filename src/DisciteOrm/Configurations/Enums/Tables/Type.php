<?php

namespace DisciteOrm\Configurations\Enums\Tables;

/**
 * Enum representing different types of tables in the ORM configuration.
 * 
 * @enum Type
 */
enum Type: int
{
    /**
     * __Standard Table__
     * 
     * Represents a standard table type.
     */
    case STANDARD = 531;

    /**
     * __Lookup Configuration Table__
     * 
     * Represents a lookup configuration table type.
     */
    case LOOKUP_CONFIG = 532;

    /**
     * __Environment Configuration Table__
     * 
     * Represents an environment configuration table type.
     */
    case ENVIRONMENT_CONFIG = 533;

    /**
     * __Archives Table__
     * 
     * Represents an archives table type.
     */
    case ARCHIVES = 534;

    /**
     * __Logs Table__
     * 
     * Represents a logs table type.
     */
    case LOGS = 535;
}
?>  