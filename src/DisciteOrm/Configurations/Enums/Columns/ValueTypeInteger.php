<?php

namespace DisciteOrm\Configurations\Enums\Columns;

/**
 * Enum representing different value types for integer columns in the ORM configuration.
 * 
 * @enum ValueTypeInteger
 */
enum ValueTypeInteger: int
{

    /**
     * __Boolean__
     * 
     * Boolean type (O or 1), (false or true).
     */
    case Boolean = 2100;

    /**
     * __Integer__
     * 
     * Signed standard integer.
     */
    case Integer = 2101;

    /**
     * __BigInt__
     * 
     * Big integer, commonly used for IDs.
     */
    case BigInt = 2102;

    /**
     * __TinyInteger__
     * 
     * Tiny integer, used for small range values.
     */
    case TinyInt = 2103;

    /**
     * __MediumInt__
     * 
     * Medium integer, used for medium-range values.
     */
    case MediumInt = 2104;

    /**
     * __SmallInt__
     * 
     * Small int, smaller than regular INT.
     */
    case SmallInt = 2105;

    /**
     * __UnixTime__
     * 
     * Unix time, Alternative to TypeDate::Timestamp.
     */
    case UnixTime = 2106;
}

?>