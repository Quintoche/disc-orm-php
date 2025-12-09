<?php

namespace DisciteOrm\Query;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;
use DisciteOrm\Configurations\Enums\Query\QueryModifiers;
use DisciteOrm\Configurations\Enums\Query\QuerySort;
use DisciteOrm\Utilities\Formats\ToStringColumn;
use DisciteOrm\Utilities\Formats\ToStringValue;

class QueryModifiersParser
{
    private const CLAUSE_SEPARATOR = ' ';

    private const CLAUSE_FORMAT = '%s %s %s';

    public static function toSql(?array $modifiers) : string
    {
        if(empty($modifiers))
        {
            return '';
        }

        return self::render($modifiers);
    }

    private static function render(array $modifiers) : string
    {
        foreach(self::sortModifiers($modifiers) as $index => $modifier)
        {

            $modifiers[$index] = self::renderModifier($modifier);
        }

        return implode(self::CLAUSE_SEPARATOR, $modifiers);
    }



    private static function renderModifier(array $modifier) : string
    {
        $field = (is_null($modifier['field'])) ? $modifier['field'] : self::formatField($modifier['field']);
        $value = (is_null($modifier['value'])) ? $modifier['value'] : self::formatValue($modifier['value']);

        return self::buildClause(
            $modifier['type'],
            $field,
            self::buildValue($modifier['type'], $value),
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
            QueryModifiers::Limit => sprintf(self::CLAUSE_FORMAT, 'LIMIT', $value, ''),
            QueryModifiers::Offset => sprintf(self::CLAUSE_FORMAT, 'OFFSET', $value, ''),
            QueryModifiers::Order => sprintf(self::CLAUSE_FORMAT, 'ORDER BY', $field, $value),
        };
    }

    private static function buildValue(QueryClauses $type, mixed $value) : string
    {
        return match(true)
        {
            $type === QueryModifiers::Order && $value === QuerySort::ASC => 'ASC',
            $type === QueryModifiers::Order && $value === QuerySort::DESC => 'DESC',
            $type === QueryModifiers::Order => 'ASC',
            default => $value,
        };
    }

    private static function sortModifiers(array $modifiers) : array
    {
        usort($modifiers, function ($a, $b) {
            $order = [
                QueryModifiers::Order,
                QueryModifiers::Limit,
                QueryModifiers::Offset,
            ];

            $posA = array_search($a['type'], $order, true);
            $posB = array_search($b['type'], $order, true);

            return $posA <=> $posB;
        });

        return $modifiers;
    }

}

?>