<?php

namespace DisciteOrm\Configurations\Enums\Columns;

/**
 * Enum representing different boolean nullable options for columns in the ORM configuration.
 * 
 * @enum BoolNullable
 */
enum BoolNullable: int
{
    /** 
     * __True__
     * 
     * TRUE value
    */
    case TRUE = 211;

    /** 
     * __False__
     * 
     * FALSE value
    */
    case FALSE = 212;

    /** 
     * __Null__
     * 
     * NULL value
    */
    case NULL = 213;
}

?>
