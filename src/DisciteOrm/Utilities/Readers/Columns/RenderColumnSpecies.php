<?php

namespace DisciteOrm\Utilities\Readers\Columns;

use DisciteOrm\Configurations\Enums\Columns\BoolSecured;

class RenderColumnSpecies
{
    /** Render column secured as boolean.
     *
     * @param array $columnData
     * @return BoolSecured
     */
    public static function renderSecured(array $columnData) : BoolSecured
    {
        if(str_contains(strtoupper($columnData['COLUMN_NAME']), 'SECURE'))
        {
            return BoolSecured::TRUE;
        }

        if(str_contains(strtoupper($columnData['COLUMN_NAME']), 'PASSWORD'))
        {
            return BoolSecured::TRUE;
        }

        if(str_contains(strtoupper($columnData['COLUMN_NAME']), 'TOKEN'))
        {
            return BoolSecured::TRUE;
        }
        
        return BoolSecured::FALSE;
    }
}

?>