<?php

namespace DisciteOrm\Configurations\Enums\Query;

/**
 * Enum representing different query return types in the ORM configuration.
 * 
 * @enum QueryReturns
 */
enum QueryReturns: int
{
    /**
     * __Array__
     * 
     * Return results as an array.
     */
    case ARRAY = 441;
    
    /**
     * __JSON__
     * 
     * Return results as a JSON string.
     */
    case JSON = 442;
    
    /**
     * __Object__
     * 
     * Return results as an object.
     */
    case OBJECT = 443;

    /**
     * __Raw__
     * 
     * Return results in raw format.
     */
    case RAW = 444;
}

?>