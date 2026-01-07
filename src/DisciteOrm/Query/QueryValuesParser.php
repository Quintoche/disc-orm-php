<?php

namespace DisciteOrm\Query;

use DisciteOrm\Configurations\Contracts\ColumnAbstract;
use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Configurations\Enums\Query\QueryType;
use DisciteOrm\Utilities\Formats\ToDisplayTableColumn;
use DisciteOrm\Utilities\Formats\ToStringValue;

class QueryValuesParser
{
    /** Convert columns to SQL string representation.
     *
     * @param array<string|ColumnAbstract> $columns
     * @param TableAbstract $table
     * @param QueryType $queryType
     * @return string
     */
    public static function toSql(array $datas, TableAbstract $table, QueryType $queryType) : string
    {   
        return self::render($datas, $table, $queryType);
    }

    /** Render datas as SQL string.
     *
     * @param array<string> $datas
     * @param TableAbstract $table
     * @param QueryType $queryType
     * @return string
     */
    private static function render(array $datas, TableAbstract $table, QueryType $queryType) : string
    {
        match($queryType)
        {
            QueryType::UPDATE => self::formatToSqlUpdate($datas, $table),
            QueryType::INSERT => self::formatToSqlInsert($datas, $table),
            default => '',
        };

        return match($queryType)
        {
            QueryType::UPDATE => self::buildColumnArrayUpdate($datas),
            QueryType::INSERT => self::buildColumnArrayInsert($datas),
            default => '',
        };
    }

    /** Format columns to SQL string.
     *
     * @param array<string> $columns
     * @param TableAbstract $table
     * @return void
     */
    private static function formatToSqlUpdate(array &$datas, TableAbstract $table) : void
    {
        $datas = self::ColumnsToString($datas);
        
        foreach($datas as $column => $value)
        {
            $datas[$column] = ToDisplayTableColumn::render($table->name(), $column) . ' = ' . (is_null($value) ? 'NULL' : ToStringValue::render($value));
        }
    }

    /** Format columns to SQL string.
     *
     * @param array<string> $columns
     * @param TableAbstract $table
     * @return void
     */
    private static function formatToSqlInsert(array &$datas) : void
    {
        foreach($datas as $index => &$dataset)
        {
            $dataset = self::ColumnsToString($dataset);

            foreach($dataset as $column => $value)
            {
                $dataset[$column] = (is_null($value) ? 'NULL' : ToStringValue::render($value));
            }
            
            ksort($dataset);
        }
    }

    /** Convert columns to string.
     *
     * @param array<string|ColumnAbstract> $columns
     * @return array<string>
     */
    private static function ColumnsToString(array $columns) : array
    {
        $newColumns = [];
        
        foreach($columns as $column => $data)
        {
            $newColumns[($column instanceof ColumnAbstract) ? $column->name() : $column] = $data;
        }

        return $newColumns;
    }

    /** Build column array as SQL string.
     *
     * @param array<string> $datas
     * @return string
     */
    private static function buildColumnArrayUpdate(array $datas) : string
    {
        return implode(', ', $datas);
    }

    /** Build column array as SQL string.
     *
     * @param array<array<string>> $datas
     * @return string
     */
    private static function buildColumnArrayInsert(array $datas) : string
    {
        foreach($datas as $index => $dataset)
        {
            $datas[$index] = '(' . implode(', ', $dataset) . ')';
        }
        
        return implode(', ', $datas);
    }

    
}

?>