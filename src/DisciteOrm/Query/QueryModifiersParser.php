<?php

namespace DisciteOrm\Query;

use DisciteOrm\Configurations\Enums\Query\QueryClauses;
use DisciteOrm\Configurations\Enums\Query\QueryModifiers;
use DisciteOrm\Configurations\Enums\Query\QuerySort;
use DisciteOrm\Utilities\Formats\ToStringColumn;
use DisciteOrm\Utilities\Formats\ToStringValue;

class QueryModifiersParser
{
    /** 
     * Clause separator 
     * 
     * @var string
    */
    private const CLAUSE_SEPARATOR = ' ';

    /** 
     * Clause format 
     * 
     * @var string
    */
    private const CLAUSE_FORMAT = '%s %s %s';

    /** Convert modifiers to SQL string representation.
     *
     * @param array|null $modifiers
     * @return string
     */
    public static function toSql(?array $modifiers) : string
    {
        if(empty($modifiers))
        {
            return '';
        }

        return self::render($modifiers);
    }

    /** Render modifiers as SQL string.
     *
     * @param array $modifiers
     * @return string
     */
    private static function render(array $modifiers) : string
    {
        foreach(self::sortModifiers($modifiers) as $index => $modifier)
        {

            $modifiers[$index] = self::renderModifier($modifier);
        }

        return implode(self::CLAUSE_SEPARATOR, $modifiers);
    }

    /** Render a single modifier as SQL string.
     *
     * @param array $modifier
     * @return string
     */
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

    /** Format field name to SQL string.
     *
     * @param string $field
     * @return string
     */
    private static function formatField(string $field) : string
    {
        return ToStringColumn::render($field);
    }

    /** Format value to SQL string.
     *
     * @param mixed $value
     * @return string
     */
    private static function formatValue(mixed $value) : string
    {
        return ToStringValue::render($value);
    }

    /** Build SQL clause string.
     *
     * @param QueryModifiers $type
     * @param mixed $field
     * @param mixed $value
     * @return string
     */
    private static function buildClause(QueryModifiers $type, mixed $field, mixed $value) : string
    {
        return match($type)
        {
            QueryModifiers::Limit => sprintf(self::CLAUSE_FORMAT, 'LIMIT', $value, ''),
            QueryModifiers::Offset => sprintf(self::CLAUSE_FORMAT, 'OFFSET', $value, ''),
            QueryModifiers::Order => sprintf(self::CLAUSE_FORMAT, 'ORDER BY', $field, $value),
        };
    }

    /** Build value string based on modifier type.
     *
     * @param QueryModifiers $type
     * @param mixed $value
     * @return string
     */
    private static function buildValue(QueryModifiers $type, mixed $value) : string
    {
        return match(true)
        {
            $type === QueryModifiers::Order && $value === QuerySort::ASC => 'ASC',
            $type === QueryModifiers::Order && $value === QuerySort::DESC => 'DESC',
            $type === QueryModifiers::Order => 'ASC',
            default => $value,
        };
    }

    /** Sort modifiers based on predefined order.
     *
     * @param array $modifiers
     * @return array
     */
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