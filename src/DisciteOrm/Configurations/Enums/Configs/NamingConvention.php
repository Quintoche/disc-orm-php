<?php

namespace DisciteOrm\Configurations\Enums\Configs;

/**
 * Enum representing different naming conventions for the ORM configuration.
 * 
 * @enum NamingConvention
 */
enum NamingConvention: int
{
    /** 
     * __camelCase__
     * 
     * Words are not separated. Each word except the first starts with an uppercase letter.
    */
    case CamelCase = 321;

    /** 
     * __PascalCase__
     * 
     * Words are not separated. Each word starts with an uppercase letter.
    */
    case PascalCase = 322;

    /** 
     * __snake_case__
     * 
     * Words are separated by underscores. All words are lowercase.
    */
    case SnakeCase = 323;

    /** 
     * __SNAKE_CASE_UPPERCASE__
     * 
     * Words are separated by underscores. All words are uppercase.
    */
    case SnakeUpperCase = 324;

    /** 
     * __Undefined__
     * 
     * Words will not be formated.
    */
    case Undefined = 325;
}

?>