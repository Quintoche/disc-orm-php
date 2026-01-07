<?php

namespace DisciteOrm\Query;

use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Utilities\Formats\ToStringTable;

class QueryTableParser
{
    /** Convert table to SQL string representation.
     *
     * @param TableAbstract $table
     * @return string
     */
    public static function toSql(TableAbstract $table) : string
    {
        return self::render($table);
    }

    /** Render the table as SQL string.
     *
     * @param TableAbstract $table
     * @return string
     */
    private static function render(TableAbstract $table) : string
    {
        return self::formatToSql(self::tableToString($table));
    }

    /** Convert table to string.
     *
     * @param TableAbstract $table
     * @return string
     */
    private static function tableToString(TableAbstract $table): string
    {
        return $table->name();
    }

    /** Format table name to SQL string.
     *
     * @param string $tableName
     * @return string
     */
    private static function formatToSql(string $tableName): string
    {
        return ToStringTable::render($tableName);
    }
}

?>