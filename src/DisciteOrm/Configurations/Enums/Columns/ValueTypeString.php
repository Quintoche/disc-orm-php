<?php

namespace DisciteOrm\Configurations\Enums\Columns;

/**
 * Enum representing different value types for integer columns in the ORM configuration.
 * 
 * @enum ValueTypeInteger
 */
enum ValueTypeString: int
{
        /**
     * __String__
     * 
     * Standard short string (VARCHAR).
     */
    case String = 2110;

    /**
     * __SmallText__
     * 
     * Text for small textual content.
     */
    case SmallText = 2111;

    /**
     * __MediumText__
     * 
     * Medium text for longer values.
     */
    case MediumText = 2112;

    /**
     * __LongText__
     * 
     * Long text for very large content like article bodies.
     */
    case LongText = 2113;

    /**
     * __UUID__
     * 
     * Unique identifier string (like UUID).
     */
    case UUID = 2114;

    /**
     * __Email__
     * 
     * Email string format.
     */
    case Email = 2115;

    /**
     * __URL__
     * 
     * URL string format.
     */
    case URL = 2116;

    /**
     * __IP__
     * 
     * IP string format.
     */
    case IP = 2117;

    /**
     * __Username__
     * 
     * username string format.
     */
    case Username = 2118;

    /**
     * __Password__
     * 
     * Password string format.
     */
    case Password = 2119;
}

?>