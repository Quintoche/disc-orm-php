<?php

namespace DisciteOrm\Query;

use DisciteOrm\Configurations\Contracts\ColumnAbstract;
use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Configurations\Enums\Query\QueryType;
use DisciteOrm\Utilities\Formats\ToDisplayTableColumn;
use DisciteOrm\Utilities\Query\CheckColumn;
use DisciteOrm\Utilities\Query\CheckUsage;

class QueryColumnsParser
{
    public static function toSql(array $columns, TableAbstract $table, QueryType $queryType) : string
    {
        return self::render(self::ColumnsToString($columns), $table, $queryType);
    }

    private static function render(array $columns, TableAbstract $table, QueryType $queryType) : string
    {
        if(in_array('*', $columns, true))
        {
            return '*';
        }

        self::formatToSql($columns, $table);

        return self::buildColumnArray($columns);
    }

    private static function ColumnsToString(array $columns) : array
    {
        foreach($columns as $index => $column)
        {
            $columns[$index] = ($column instanceof ColumnAbstract) ? $column->name() : $column;
        }

        return $columns;
    }

    private static function formatToSql(array &$columns, TableAbstract $table) : void
    {
        foreach($columns as $index => $column)
        {
            $columns[$index] = ToDisplayTableColumn::render($table->name(), $column);
        }
    }

    private static function buildColumnArray(array $columns) : string
    {
        return implode(', ', $columns);
    }

    
}

?>