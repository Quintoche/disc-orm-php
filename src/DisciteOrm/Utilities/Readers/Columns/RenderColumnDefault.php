<?php

namespace DisciteOrm\Utilities\Readers\Columns;

use DisciteOrm\Configurations\Enums\Columns\ValueDefault;

class RenderColumnDefault
{
    /** Render column default value.
     *
     * @param array $columnData
     * 
     * @return mixed
     */
    public static function render(array $columnData) : mixed
    {
        $columnData = self::formatDatas($columnData);

        return self::matchDatas($columnData);
    }

    /** Match column data to ValueDefault or return default value.
     *
     * @param array $data
     * 
     * @return mixed
     */
    protected static function matchDatas(array $data) : mixed
    {
        $default = $data['DEFAULT'] ?? null;
        $isNullable = $data['NULLABLE'] ?? null;
        
        return match (true) 
        {
            $data['EXTRA'] == 'auto_increment'           => ValueDefault::Null,
            is_null($default) && $isNullable == 'YES'    => ValueDefault::Null,
            $default == 'current_timestamp()'            => ValueDefault::CurrentTimestamp,
            $default == 'current_timestamp(3)'           => ValueDefault::CurrentTimestamp,
            $default == '0' && $isNullable == 'NO'       => ValueDefault::Zero,
            $default == 'UUID()'                         => ValueDefault::UUIDv4,
            $default == '' && $isNullable == 'NO'        => ValueDefault::EmptyString,
            is_null($default) && $isNullable == 'NO'     => ValueDefault::EmptyString,
            default                                      => $default,
        };
    }

    /** Format column data.
     *
     * @param array $data
     * @return array
     */
    protected static function formatDatas(array $data) : array
    {
        $formattedData = [];

        foreach($data as $key => $value)
        {
            $formattedData[strtoupper($key)] = $value;
        }

        return $formattedData;
    }
}

?>