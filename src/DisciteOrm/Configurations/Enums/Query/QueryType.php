<?php

namespace DisciteOrm\Configurations\Enums\Query;

/**
 * Enum representing different query types in the ORM configuration.
 * 
 * @enum QueryType
 */
enum QueryType: int
{
    /**
     * __Insert__
     * 
     * Insert query type.
     */
    case INSERT = 411;

    
    /**
     * __Update__
     * 
     * Update query type.
     */
    case UPDATE = 412;

    
    /**
     * __Delete__
     * 
     * Delete query type.
     */
    case DELETE = 413;


    /**
     * __Select__
     * 
     * Select query type.
     */
    case SELECT = 414;
}

?>