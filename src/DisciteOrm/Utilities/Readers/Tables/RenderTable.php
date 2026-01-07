<?php

namespace DisciteOrm\Utilities\Readers\Tables;

use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Tables\Table;

class RenderTable
{
    /** Render column from data array.
     *
     * @param array $columnData
     * @return ColumnAbstract
     */
    public static function render(array $tableData) : TableAbstract
    {
        $tableClass = new Table(ucfirst($tableData['TABLE_NAME']));

        $tableClass->type(
            RenderTableType::render($tableData)
        );

        return $tableClass;
    }
}

?>