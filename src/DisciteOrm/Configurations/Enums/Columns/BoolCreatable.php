<?php

namespace DisciteOrm\Configurations\Enums\Columns;

/**
 * Enum representing different boolean creatable options for columns in the ORM configuration.
 * 
 * @enum BoolCreatable
 */
enum BoolCreatable: int
{
    /** 
     * __True__
     * 
     * TRUE value
    */
    case TRUE = 231;

    /** 
     * __False__
     * 
     * FALSE value
    */
    case FALSE = 232;

    /** 
     * __Null__
     * 
     * NULL value
    */
    case NULL = 233;
}

?>