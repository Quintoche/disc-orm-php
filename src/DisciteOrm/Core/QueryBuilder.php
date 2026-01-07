<?php

namespace DisciteOrm\Core;

use DisciteOrm\Builder\Clauses\BetweenClause;
use DisciteOrm\Builder\Clauses\InClause;
use DisciteOrm\Builder\Clauses\LessOrEqualClause;
use DisciteOrm\Builder\Clauses\LessThanClause;
use DisciteOrm\Builder\Clauses\LikeClause;
use DisciteOrm\Builder\Clauses\MoreOrEqualClause;
use DisciteOrm\Builder\Clauses\MoreThanClause;
use DisciteOrm\Builder\Clauses\NotBetweenClause;
use DisciteOrm\Builder\Clauses\NotClause;
use DisciteOrm\Builder\Clauses\NotInClause;
use DisciteOrm\Builder\Clauses\NotLikeClause;
use DisciteOrm\Builder\Clauses\OrClause;
use DisciteOrm\Builder\Clauses\WhereClause;
use DisciteOrm\Builder\Modifiers\OrderModifier;
use DisciteOrm\Builder\Modifiers\LimitModifier;
use DisciteOrm\Builder\Query\DeleteQuery;
use DisciteOrm\Builder\Query\InsertQuery;
use DisciteOrm\Builder\Query\SelectQuery;
use DisciteOrm\Builder\Query\UpdateQuery;
use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Configurations\Enums\Query\QueryReturns;
use DisciteOrm\Configurations\Enums\Query\QueryType;
use DisciteOrm\Configurations\Query\QueryBase;
use DisciteOrm\Query\QueryClausesParser;
use DisciteOrm\Query\QueryColumnsParser;
use DisciteOrm\Query\QueryModifiersParser;
use DisciteOrm\Query\QueryTableParser;
use DisciteOrm\Query\QueryValuesParser;
use DisciteOrm\Builder\Readers\AllReader;
use DisciteOrm\Builder\Readers\CountReader;
use DisciteOrm\Builder\Readers\ExistsReader;
use DisciteOrm\Builder\Readers\FindReader;
use DisciteOrm\Builder\Readers\FirstReader;
use DisciteOrm\Builder\Readers\GetReader;
use DisciteOrm\Builder\Readers\LastReader;
use DisciteOrm\Builder\Readers\NextReader;
use DisciteOrm\Builder\Readers\Reader;

class QueryBuilder
{
    use SelectQuery;
    use DeleteQuery;
    use InsertQuery;
    use UpdateQuery;

    use WhereClause;
    use BetweenClause;
    use InClause;
    use LessOrEqualClause;
    use LessThanClause;
    use LikeClause;
    use MoreOrEqualClause;
    use MoreThanClause;
    use NotBetweenClause;
    use NotClause;
    use NotInClause;
    use NotLikeClause;
    use OrClause;

    use LimitModifier;
    use OrderModifier;

    use Reader;
    use GetReader;
    use AllReader;
    use FindReader;
    use LastReader;
    use NextReader;
    use FirstReader;
    use CountReader;
    use ExistsReader;

    protected QueryBase $queryBase;
    
    protected QueryType $queryType;

    protected QueryReturns $returnType = QueryReturns::ARRAY;

    protected ?QueryResult $queryResult = null;

    protected TableAbstract $table;

    protected array $data = [];

    protected array $columns = [];

    protected array $clauses = [];

    protected array $modifiers = [];

    protected string $queryString = '';


    public function __construct(?TableAbstract $table = null)
    {
        $this->table = $table;
    }

    /**
     * Retrieve the query string.
     *
     * @return string The constructed query string.
     */
    protected function retrieveQueryString() : string
    {
        $this->buildQuery();
        
        return $this->queryString;
    }

    /**
     * Get or set the query type.
     *
     * @param QueryType|null $queryType The query type to set (optional).
     * 
     * @return QueryType|static The current query type or the instance for chaining.
     */
    public function type(?QueryType $queryType = null): QueryType|static
    {
        if($queryType)
        {
            $this->queryType = $queryType;
            $this->queryBase = QueryBase::fromQueryType($queryType);
            return $this;
        }
        else
        {
            return $this->queryType;
        }
    }

    /**
     * Build the SQL query string.
     * 
     * @return void
     */
    private function buildQuery()
    {
        $this->queryString = str_replace(
            [
                '{table}',
                '{columns}',
                '{values}',
                '{clauses}',
                '{modifiers}',
            ],
            [
                $this->buildTable(),
                $this->buildColumns(),
                $this->buildValues(),
                $this->buildClauses(),
                $this->buildModifiers(),
            ],
            $this->queryBase->value
        );
    }

    /** Build table as SQL string.
     *
     * @return string
     */
    private function buildTable() : string
    {
        return QueryTableParser::toSql($this->table);
    }

    /** Build columns as SQL string.
     *
     * @return string
     */
    private function buildColumns() : string
    {
        return QueryColumnsParser::toSql($this->columns, $this->table, $this->queryType);
    }

    /** Build values as SQL string.
     *
     * @return string
     */
    private function buildValues() : string
    {
        return QueryValuesParser::toSql($this->data, $this->table, $this->queryType);
    }

    /** Build clauses as SQL string.
     *
     * @return string
     */
    private function buildClauses() : string
    {
        return QueryClausesParser::toSql($this->clauses);
    }

    /** Build modifiers as SQL string.
     *
     * @return string
     */
    private function buildModifiers() : string
    {
        return QueryModifiersParser::toSql($this->modifiers);
    }
}

?>