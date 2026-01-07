<?php

namespace DisciteOrm\Utilities\Readers\Columns;

use DisciteOrm\Configurations\Enums\Columns\BoolCreatable;
use DisciteOrm\Configurations\Enums\Columns\BoolNullable;
use DisciteOrm\Configurations\Enums\Columns\BoolUpdatable;

class RenderColumnParameters
{
    /** Render column nullable as boolean.
     *
     * @param array $columnData
     * @return BoolNullable
     */
    public static function renderNullable(array $columnData) : BoolNullable
    {
        return (strtoupper($columnData['IS_NULLABLE']) === 'YES' ? BoolNullable::TRUE : BoolNullable::FALSE);
    }

    /** Render column creatable as boolean.
     *
     * @param array $columnData
     * @return BoolCreatable
     */
    public static function renderCreatable(array $columnData) : BoolCreatable
    {
        if(strtoupper($columnData['COLUMN_KEY'] ?? '') === 'PRI')
        {
            return BoolCreatable::FALSE;
        }

        if(strtoupper($columnData['CONSTRAINT_NAME'] ?? '') === 'PRIMARY')
        {
            return BoolCreatable::FALSE;
        }
        
        if((strtoupper($columnData['EXTRA'] ?? '') === 'AUTO_INCREMENT'))
        {
            return BoolCreatable::FALSE;
        }

        return BoolCreatable::TRUE;
    }

    /** Render column updatable as boolean.
     *
     * @param array $columnData
     * @return BoolUpdatable
     */
    public static function renderUpdatable(array $columnData) : BoolUpdatable
    {
        if(strtoupper($columnData['COLUMN_KEY'] ?? '') === 'PRI')
        {
            return BoolUpdatable::FALSE;
        }

        if(strtoupper($columnData['CONSTRAINT_NAME'] ?? '') === 'PRIMARY')
        {
            return BoolUpdatable::FALSE;
        }
        
        if((strtoupper($columnData['EXTRA'] ?? '') === 'AUTO_INCREMENT'))
        {
            return BoolUpdatable::FALSE;
        }

        if(str_contains(strtoupper($columnData['COLUMN_DEFAULT'] ?? ''), 'ON UPDATE'))
        {
            return BoolUpdatable::FALSE;
        }
        
        return BoolUpdatable::TRUE;
    }
}

?>