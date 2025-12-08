<?php

namespace DisciteOrm\Query;

use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Utilities\Formats\ToStringTable;

class QueryTable
{
    public static function toSql(TableAbstract $table) : string
    {
        return self::render($table);
    }

    private static function render(TableAbstract $table) : string
    {
        return self::formatToSql(self::tableToString($table));
    }

    private static function tableToString(TableAbstract $table): string
    {
        return $table->name();
    }

    private static function formatToSql(string $tableName): string
    {
        return ToStringTable::render($tableName);
    }
}

?>