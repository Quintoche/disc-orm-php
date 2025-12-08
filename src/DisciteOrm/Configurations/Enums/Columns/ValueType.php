<?php

namespace DisciteOrm\Configurations\Enums\Columns;

/**
 * Enum representing different value types for columns in the ORM configuration.
 * 
 * @enum ValueType
 */
enum ValueType: int
{
    /** 
     * __String__
     * 
     * String value type
    */
    case STRING = 261;

    /** 
     * __Integer__
     * 
     * Integer value type
    */
    case INTEGER = 262;

    /** 
     * __Float__
     * 
     * Float value type
    */
    case FLOAT = 263;

    /** 
     * __Date__
     * 
     * Date value type
    */
    case DATE = 264;

    /** 
     * __Binary__
     * 
     * Binary value type
    */
    case BINARY = 265;
}

?>