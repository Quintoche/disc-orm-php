<?php

namespace DisciteOrm\Configurations\Enums\Configs;

/**
 * Enum representing different usages for tables in the ORM configuration.
 * 
 * @enum TableUsage
 */
enum TableUsage: int
{
    /** 
     * __Loose__
     * 
     * Loose table usage
    */
    case LOOSE = 331;

    /**
     * __Strict__
     *
     * Strict table usage
     */
    case STRICT = 332;
}

?>