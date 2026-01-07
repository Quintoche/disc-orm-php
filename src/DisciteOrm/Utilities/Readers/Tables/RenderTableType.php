<?php

namespace DisciteOrm\Utilities\Readers\Tables;

use DisciteOrm\Configurations\Enums\Tables\Type;

class RenderTableType
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
            str_contains($data['TABLE_NAME'], '_log')  => Type::LOGS,
            str_contains($data['TABLE_NAME'], '_archive')  => Type::ARCHIVES,
            str_contains($data['TABLE_NAME'], '_lookup')  => Type::LOOKUP_CONFIG,
            str_contains($data['TABLE_NAME'], '_config')  => Type::ENVIRONMENT_CONFIG,
            default => Type::STANDARD,
        };
    }
}

?>