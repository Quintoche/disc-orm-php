<?php

namespace DisciteOrm\Configurations\Enums\Configs;

/**
 * Enum representing different usages for columns in the ORM configuration.
 * 
 * @enum ColumnUsage
 */
enum ColumnUsage: int
{
    /** 
     * __Loose__
     * 
     * Loose column usage
    */
    case LOOSE = 310;

    /**
     * __Strict__
     *
     * Strict column usage
     */
    case STRICT = 311;
}
