<?php

namespace DisciteOrm\Configurations\Enums\Columns;

/**
 * Enum representing different boolean secured options for columns in the ORM configuration.
 * 
 * @enum BoolSecured
 */
enum BoolSecured: int
{
    /** 
     * __True__
     * 
     * TRUE value
    */
    case TRUE = 221;

    /** 
     * __False__
     * 
     * FALSE value
    */
    case FALSE = 222;

    /** 
     * __Null__
     * 
     * NULL value
    */
    case NULL = 223;
}

?>