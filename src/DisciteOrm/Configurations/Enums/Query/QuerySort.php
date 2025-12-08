<?php

namespace DisciteOrm\Configurations\Enums\Query;

/**
 * Enum representing different sorting options for queries in the ORM configuration.
 * 
 * @enum QuerySort
 */
enum QuerySort: int
{
    /**
     * __Ascending__
     * 
     * Sort results in ascending order.
     */
    case ASC = 401;

    /**
     * __Descending__
     * 
     * Sort results in descending order.
     */
    case DESC = 402;

    /**
     * __None__
     * 
     * No specific sorting order.
     */
    case NONE = 403;
}

?>