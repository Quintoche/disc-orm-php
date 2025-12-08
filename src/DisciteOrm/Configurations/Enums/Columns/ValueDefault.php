<?php

namespace DisciteOrm\Configurations\Enums\Columns;

/**
 * Enum representing different default values for columns in the ORM configuration.
 * 
 * @enum ValueDefault
 */
enum ValueDefault: int
{
    /** 
     * __Null__
     * 
     * NULL value (default SQL behavior) 
    */
    case Null = 251;

    /** 
     * __CurrentTimestamp__
     * 
     * CURRENT_TIMESTAMP (e.g. for DATETIME, TIMESTAMP columns) 
    */
    case CurrentTimestamp = 252;

    /** 
     * __Zero__
     * 
     * Zero for numeric types 
    */
    case Zero = 253;

    /** 
     * __EmptyString__
     * 
     * Empty string for string types 
    */
    case EmptyString = 254;

    /** 
     * __UUIDv4__
     * 
     * UUID generator default (handled in PHP callback, fallback) 
    */
    case UUIDv4 = 255;

    /** 
     * __Now__
     * 
     * Now (alias for CURRENT_TIMESTAMP for consistency) 
    */
    case Now = 266;
}

?>
