<?php

namespace DisciteOrm\Configurations\Query;

/**
 * Enum representing the base types of SQL queries.
 */
enum QueryBase : string
{
    /**
     * SQL SELECT query type.
     */
    case SELECT = 'SELECT {columns} FROM {table} {clauses} {modifiers}';


    /**
     * SQL INSERT query type.
     */
    case INSERT = 'INSERT INTO {table} ({columns}) VALUES ({values})';

    /**
     * SQL UPDATE query type.
     */
    case UPDATE = 'UPDATE {table} SET {values} WHERE {clauses}';
    

    /**
     * SQL DELETE query type.
     */
    case DELETE = 'DELETE FROM {table} WHERE {clauses}';

    /**
     * Get the QueryBase from a QueryType.
     *
     * @param \DisciteOrm\Configurations\Enums\Query\QueryType $queryType The query type.
     * 
     * @return QueryBase The corresponding QueryBase.
     */
    public static function fromQueryType(\DisciteOrm\Configurations\Enums\Query\QueryType $queryType) : QueryBase
    {
        return match($queryType)
        {
            \DisciteOrm\Configurations\Enums\Query\QueryType::SELECT => QueryBase::SELECT,
            \DisciteOrm\Configurations\Enums\Query\QueryType::INSERT => QueryBase::INSERT,
            \DisciteOrm\Configurations\Enums\Query\QueryType::UPDATE => QueryBase::UPDATE,
            \DisciteOrm\Configurations\Enums\Query\QueryType::DELETE => QueryBase::DELETE,
        };
    }
}

?>