<?php

namespace DisciteOrm\Utilities\Formats;

class ToDisplayTableColumn
{
    /** Render table column as display string.
     *
     * @param string $tableName
     * @param string $columnName
     * @return string
     */
    public static function render(string $tableName, string $columnName): string
    {
        if($columnName === '*')
        {
            return ToStringTable::render($tableName) . '.*';
        }
        
        return ToStringTable::render($tableName) . '.' . ToStringColumn::render($columnName);
    }
}