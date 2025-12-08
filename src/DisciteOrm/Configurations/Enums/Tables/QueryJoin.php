<?php

namespace DisciteOrm\Configurations\Enums\Tables;

/**
 * Enum representing different types of query joins in the ORM configuration.
 * 
 * @enum QueryJoin
 */
enum QueryJoin: int
{
    /**
     * __Inner Join__
     * 
     * Represents an inner join between tables.
     */
    case INNER_JOIN = 521;

    /**
     * __Left Join__
     * 
     * Represents a left join between tables.
     */
    case LEFT_JOIN = 522;

    /**
     * __Right Join__
     * 
     * Represents a right join between tables.
     */
    case RIGHT_JOIN = 523;

    /**
     * __Full Join__
     * 
     * Represents a full join between tables.
     */
    case FULL_JOIN = 524;

}

?>