<?php

namespace DisciteOrm\Query;

use DisciteOrm\Configurations\Contracts\ColumnAbstract;
use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Configurations\Enums\Query\QueryType;
use DisciteOrm\Utilities\Formats\ToDisplayTableColumn;

class QueryColumnsParser
{
    /** Convert columns to SQL string representation.
     *
     * @param array<string|ColumnAbstract> $columns
     * @param TableAbstract $table
     * @param QueryType $queryType
     * @return string
     */
    public static function toSql(array $columns, TableAbstract $table, QueryType $queryType) : string
    {
        return self::render(self::ColumnsToString($columns), $table, $queryType);
    }

    /** Render columns as SQL string.
     *
     * @param array<string> $columns
     * @param TableAbstract $table
     * @param QueryType $queryType
     * @return string
     */
    private static function render(array $columns, TableAbstract $table, QueryType $queryType) : string
    {
        if(in_array('*', $columns, true))
        {
            return '*';
        }

        self::formatToSql($columns, $table);

        return self::buildColumnArray($columns);
    }

    /** Convert columns to string.
     *
     * @param array<string|ColumnAbstract> $columns
     * @return array<string>
     */
    private static function ColumnsToString(array $columns) : array
    {
        foreach($columns as $index => $column)
        {
            $columns[$index] = ($column instanceof ColumnAbstract) ? $column->name() : $column;
        }

        return $columns;
    }

    /** Format columns to SQL string.
     *
     * @param array<string> $columns
     * @param TableAbstract $table
     * @return void
     */
    private static function formatToSql(array &$columns, TableAbstract $table) : void
    {
        foreach($columns as $index => $column)
        {
            $columns[$index] = ToDisplayTableColumn::render($table->name(), $column);
        }
    }

    /** Build column array as SQL string.
     *
     * @param array<string> $columns
     * @return string
     */
    private static function buildColumnArray(array $columns) : string
    {
        asort($columns);
        
        return implode(', ', $columns);
    }

    
}

?>