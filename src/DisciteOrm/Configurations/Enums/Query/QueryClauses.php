<?php

namespace DisciteOrm\Configurations\Enums\Query;

/**
 * Enum representing different query clauses in the ORM configuration.
 * 
 * @enum QueryClauses
 */
enum QueryClauses: int
{
    /*
     * __Or__
     * 
     * Or clause used in back code to retrieve query clauses.
     * 
    */
    case Or = 421;

    /** 
     * __Contains__
     * 
     * Contains clause used in back code to retrieve query clauses.
     * 
    */
    case Having = 422;

    /** 
     * __Between__
     * 
     * Between clause used in back code to retrieve query clauses.
     * 
    */
    case Between = 423;

    /** 
     * __Not__
     * 
     * Not clause used in back code to retrieve query clauses.
     * 
    */
    case Not = 424;

    /** 
     * __NotContains__
     * 
     * Not Contains clause used in back code to retrieve query clauses.
     * 
    */
    case NotHaving = 425;

    /** 
     * __NotBetween__
     * 
     * Not Between clause used in back code to retrieve query clauses.
     * 
    */
    case NotBetween = 426;

    /** 
     * __MoreThan__
     * 
     * MoreThan clause used in back code to retrieve query clauses.
     * 
    */
    case MoreThan = 427;

    /** 
     * __LessThan__
     * 
     * LessThan clause used in back code to retrieve query clauses.
     * 
    */
    case LessThan = 428;

    /** 
     * __MoreOrEqual__
     * 
     * MoreOrEqual clause used in back code to retrieve query clauses.
     * 
    */
    case MoreOrEqual = 429;

    /** 
     * __LessOrEqual__
     * 
     * LessOrEqual clause used in back code to retrieve query clauses.
     * 
    */
    case LessOrEqual = 4210;

    /** 
     * __Equal__
     * 
     * Equal clause used in back code to retrieve query clauses.
     * 
    */
    case Equal = 4211;

    /** 
     * __Like__
     * 
     * Like clause used in back code to retrieve query clauses.
     * 
    */
    case Like = 4212;

    /** 
     * __NotLike__
     * 
     * NotLike clause used in back code to retrieve query clauses.
     * 
    */
    case NotLike = 4213;

    /** 
     * __NotIn__
     * 
     * NotIn clause used in back code to retrieve query clauses.
     * 
    */
    case NotIn = 4214;

    /** 
     * __In__
     * 
     * In clause used in back code to retrieve query clauses.
     * 
    */
    case In = 4215;

    /** 
     * __Null__
     * 
     * Null clause used in back code to retrieve query clauses.
     * 
    */
    case Null = 4216;

    /** 
     * __NotNull__
     * 
     * NotNull clause used in back code to retrieve query clauses.
     * 
    */
    case NotNull = 4217;

    /** 
     * __AndGroup__
     * 
     * And group clause used in back code to retrieve query clauses.
     * 
    */
    case AndGroup = 4218;

    /** 
     * __OrGroup__
     * 
     * Or group clause used in back code to retrieve query clauses.
     * 
    */
    case OrGroup = 4219;

    /** 
     * __OpenGroup__
     * 
     * Open group clause used in back code to retrieve query clauses.
     * 
    */
    case OpenGroup = 4220;

    /** 
     * __CloseGroup__
     * 
     * Close group clause used in back code to retrieve query clauses.
     * 
    */
    case CloseGroup = 4221;
}

?>