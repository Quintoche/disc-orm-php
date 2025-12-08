<?php

namespace DisciteOrm\Configurations\Enums\Tables;

/**
 * Enum representing different types of permissions in the ORM configuration.
 * 
 * @enum Permissions
 */
enum Permissions: int
{
    /**
     * __Read__
     * 
     * Permission to read data.
     */
    case READ = 511;

    /**
     * __Write__
     * 
     * Permission to write or modify data.
     */
    case WRITE = 512;

    /**
     * __Delete__
     * 
     * Permission to delete data.
     */
    case DELETE = 513;

    /**
     * __Admin__
     * 
     * Permission to perform administrative actions.
     */
    case ADMIN = 514;
}

?>