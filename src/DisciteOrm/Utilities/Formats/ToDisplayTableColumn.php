<?php

namespace DisciteOrm\Utilities\Formats;

class ToDisplayTableColumn
{
    public static function render(string $tableName, string $columnName): string
    {
        if($columnName === '*')
        {
            return ToStringTable::render($tableName) . '.*';
        }
        
        return ToStringTable::render($tableName) . '.' . ToStringColumn::render($columnName);
    }
}