<?php

namespace DisciteOrm\Configurations\Enums\Columns;

/**
 * Enum representing different value types for date columns in the ORM configuration.
 * 
 * @enum ValueTypeDate
 */
enum ValueTypeDate: int
{
    /**
     * __Date__
     * 
     * Date only (YYYY-MM-DD).
     */
    case Date = 280;

    /**
     * __Time__
     * 
     * Time only (HH:MM:SS).
     */
    case Time = 281;

    /**
     * __DateTime__
     * 
     * Full date and time (YYYY-MM-DD HH:MM:SS).
     */
    case DateTime = 282;

    /**
     * __Timestamp__
     * 
     * Timestamp (numeric UNIX time).
     */
    case Timestamp = 283;

    /**
     * __Year__
     * 
     * Year only (YYYY).
     */
    case Year = 284;
}

?>