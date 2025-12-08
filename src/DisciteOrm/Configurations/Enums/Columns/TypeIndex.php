<?php

namespace DisciteOrm\Configurations\Enums\Columns;

/**
 * Enum representing different types of indexes for columns in the ORM configuration.
 * 
 * @enum TypeIndex
 */
enum TypeIndex: int
{
    /** 
     * __Primary__
     * 
     * Primary key index
    */
    case PRIMARY = 241;

    /** 
     * __Unique__
     * 
     * Unique key index
    */
    case UNIQUE = 242;

    /** 
     * __Fulltext__
     * 
     * Fulltext search index
    */
    case FULLTEXT = 243;

    /** 
     * __Spatial__
     * 
     * Spatial index
    */
    case SPATIAL = 244;

    /** 
     * __Normal__
     * 
     * Normal index
    */
    case NORMAL = 245;

    /** 
     * __None__
     * 
     * No index
    */
    case NONE = 246;
}

?>