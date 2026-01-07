<?php

namespace DisciteOrm\Utilities\Readers\Tables;

use DisciteOrm\Configurations\Enums\Tables\Type;

class RenderTablePrimary
{
    /** Render table type as Type.
     *
     * @param array $tableData
     * 
     * @return Type
     */
    public static function render(array $tableData) : Type
    {
        return self::matchDatas($tableData);
    }

    /** Match table data to Type.
     *
     * @param array $data
     * 
     * @return Type
     */
    protected static function matchDatas(array $data): Type
    {
        return match (true) {
            str_contains($data['table_name'], '_log')  => Type::LOGS,
            str_contains($data['table_name'], '_archive')  => Type::ARCHIVES,
            str_contains($data['table_name'], '_lookup')  => Type::LOOKUP_CONFIG,
            str_contains($data['table_name'], '_config')  => Type::ENVIRONMENT_CONFIG,
            default => Type::STANDARD,
        };
    }
}

?>