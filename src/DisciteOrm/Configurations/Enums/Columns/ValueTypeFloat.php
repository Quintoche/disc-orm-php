<?php

namespace DisciteOrm\Configurations\Enums\Columns;

/**
 * Enum representing different value types for float columns in the ORM configuration.
 * 
 * @enum ValueTypeFloat
 */
enum ValueTypeFloat: int
{
    /**
     * __Float__
     * 
     * Float value type
     */
    case Float = 291;

    /**
     * __Double__
     * 
     * Double precision float value type
     */
    case Double = 292;

    /**
     * __Decimal__
     * 
     * Decimal value type
     */
    case Decimal = 293;
}

?>