<?php

namespace DisciteOrm\Configurations\Enums\Query;

/**
 * Enum representing different query modifiers in the ORM configuration.
 * 
 * @enum QueryModifiers
 */
enum QueryModifiers: int
{
    /*
     * __Order__
     * 
     * Order modifier used in back code to retrieve query modifiers.
     * 
    */
    case Order = 431;

    /** 
     * __Limit__
     * 
     * Limit modifier used in back code to retrieve query modifiers.
     * 
    */
    case Limit = 432;

    /** 
     * __Offset__
     * 
     * Offset modifier used in back code to retrieve query modifiers.
     * 
    */
    case Offset = 433;
}

?>