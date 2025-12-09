<?php

namespace DisciteOrm\Query;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;
use DisciteOrm\Utilities\Formats\ToStringColumn;
use DisciteOrm\Utilities\Formats\ToStringValue;

class QueryClausesParser
{
    private const CLAUSE_SEPARATOR = ' AND ';

    private const CLAUSE_FORMAT = '%s %s %s';

    public static function toSql(?array $clauses) : string
    {
        if(empty($clauses))
        {
            return '';
        }

        return 'WHERE ' . self::render($clauses);
    }

    private static function render(array $clauses) : string
    {        
        foreach($clauses as $index => $clause)
        {

            $clauses[$index] = self::renderClause($clause);
        }

        return implode(self::CLAUSE_SEPARATOR, $clauses);
    }



    private static function renderClause(array $clause) : string
    {
        $field = (is_null($clause['field'])) ? $clause['field'] : self::formatField($clause['field']);
        $value = (is_null($clause['value'])) ? $clause['value'] : self::formatValue($clause['value']);

        return self::buildClause(
            $clause['type'],
            $field,
            self::buildValue($clause['type'], $value),
        );
    }

    private static function formatField(string $field) : string
    {
        return ToStringColumn::render($field);
    }

    private static function formatValue(mixed $value) : string
    {
        return ToStringValue::render($value);
    }


    private static function buildClause(QueryClauses $type, mixed $field, mixed $value) : string
    {
        return match($type)
        {
            // QueryClauses::Or => self::buildOrClause($field, $value),
            QueryClauses::Having => sprintf(self::CLAUSE_FORMAT, $field, 'HAVING', $value),
            QueryClauses::Between => sprintf(self::CLAUSE_FORMAT, $field, 'BETWEEN', $value),
            QueryClauses::Not => sprintf(self::CLAUSE_FORMAT, $field, 'NOT', $value),
            QueryClauses::NotHaving => sprintf(self::CLAUSE_FORMAT, $field, 'NOT HAVING', $value),
            QueryClauses::NotBetween => sprintf(self::CLAUSE_FORMAT, $field, 'NOT BETWEEN', $value),
            QueryClauses::MoreThan => sprintf(self::CLAUSE_FORMAT, $field, '>', $value),
            QueryClauses::LessThan => sprintf(self::CLAUSE_FORMAT, $field, '<', $value),
            QueryClauses::MoreOrEqual => sprintf(self::CLAUSE_FORMAT, $field, '>=', $value),
            QueryClauses::LessOrEqual => sprintf(self::CLAUSE_FORMAT, $field, '<=', $value),
            QueryClauses::Equal => sprintf(self::CLAUSE_FORMAT, $field, '=', $value),
            QueryClauses::Like => sprintf(self::CLAUSE_FORMAT, $field, 'LIKE', $value),
            QueryClauses::NotLike => sprintf(self::CLAUSE_FORMAT, $field, 'NOT LIKE', $value),
            QueryClauses::NotIn => sprintf(self::CLAUSE_FORMAT, $field, 'NOT IN', "$value"),
            QueryClauses::In => sprintf(self::CLAUSE_FORMAT, $field, 'IN', "$value"),
            QueryClauses::NotNull => sprintf(self::CLAUSE_FORMAT, $field, 'IS NOT NULL', ""),
            QueryClauses::Null => sprintf(self::CLAUSE_FORMAT, $field, 'IS NULL', ""),
            // QueryClauses::AndGroup, QueryClauses::OrGroup, QueryClauses::OpenGroup, QueryClauses::CloseGroup => self::buildGroupClause($type),
        };
    }

    private static function buildValue(QueryClauses $type, mixed $value) : string
    {
        return match($type)
        {
            QueryClauses::Between => sprintf("%s AND %s", $value[0], $value[1]),
            QueryClauses::NotBetween => sprintf("%s AND %s", $value[0], $value[1]),
            QueryClauses::In => sprintf("(%s)", $value),
            QueryClauses::NotIn => sprintf("(%s)", $value),
            default => $value,
        };
    }


    private static function buildGroupClause(QueryClauses $type) : string
    {
        return match($type)
        {
            QueryClauses::AndGroup => sprintf(self::CLAUSE_FORMAT, ')', 'AND', '('),
            QueryClauses::OrGroup => sprintf(self::CLAUSE_FORMAT, ')', 'OR', '('),
            QueryClauses::OpenGroup => sprintf(self::CLAUSE_FORMAT, '(', '', ''),
            QueryClauses::CloseGroup => sprintf(self::CLAUSE_FORMAT, ')', '', ''),
        };
    }

    private static function isGroupClause(QueryClauses $type) : bool
    {
        return in_array($type, [QueryClauses::AndGroup, QueryClauses::OrGroup]);
    }

    private static function havingGroupExists(array $clauses) : bool
    {
        foreach($clauses as $clause)
        {
            if(in_array($clause['type'], [QueryClauses::Having, QueryClauses::NotHaving]))
            {
                return true;
            }
        }

        return false;
    }

    private static function isFirstClauseAGroup(array $clauses) : bool
    {
        return self::isGroupClause($clauses[0]['type']);
    }

    private static function isLastClauseAGroup(array $clauses) : bool
    {
        return self::isGroupClause($clauses[count($clauses) - 1]['type']);
    }

    private static function buildOrClause(mixed $field, mixed $value) : string
    {
        $orClause = [];

        if(!is_array($value))
        {
            return self::buildClause(
                QueryClauses::Equal,
                ' OR ' . $field,
                $value,
            );
        }

        foreach($value as $val)
        {
            $orClause[] = match(true)
            {
                is_array($val) => self::buildClause(
                    $val['type'],
                    $val['field'],
                    $val['value'],
                ),
                default => self::buildClause(
                    QueryClauses::Equal,
                    $field,
                    $val,
                ),
            };
        }

        return ' OR ' . implode(' OR ', $orClause);
    }
}

?>