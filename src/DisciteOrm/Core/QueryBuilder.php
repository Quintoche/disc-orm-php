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
use DisciteOrm\Builder\Query\DeleteQuery;
use DisciteOrm\Builder\Query\InsertQuery;
use DisciteOrm\Builder\Query\SelectQuery;
use DisciteOrm\Builder\Query\UpdateQuery;
use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Configurations\Enums\Query\QueryType;
use DisciteOrm\Configurations\Query\QueryBase;
use DisciteOrm\Query\QueryClausesParser;
use DisciteOrm\Query\QueryColumnsParser;
use DisciteOrm\Query\QueryModifiersParser;
use DisciteOrm\Query\QueryTableParser;
use DisciteOrm\Reader\GetReader;

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

    use GetReader;

    protected QueryBase $queryBase;
    
    protected QueryType $queryType;

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

    protected function retrieveQueryString() : string
    {
        $this->buildQuery();
        
        return $this->queryString;
    }

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

    private function buildTable() : string
    {
        return QueryTableParser::toSql($this->table);
    }

    private function buildColumns() : string
    {
        return QueryColumnsParser::toSql($this->columns, $this->table, $this->queryType);
    }

    private function buildValues() : string
    {
        // Implementation for building values
        return '';
    }

    private function buildClauses() : string
    {
        return QueryClausesParser::toSql($this->clauses);
    }

    private function buildModifiers() : string
    {
        return QueryModifiersParser::toSql($this->modifiers);
    }
}

?>