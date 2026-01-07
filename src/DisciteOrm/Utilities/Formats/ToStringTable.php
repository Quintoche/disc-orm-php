<?php

namespace DisciteOrm\Utilities\Formats;

use DisciteOrm\DisciteConnection;

class ToStringTable
{
    /** Render table name as SQL string.
     *
     * @param string $string
     * @return string
     */
    public static function render(string $string): string
    {
        $string = DisciteConnection::$mysqli->escape_string($string);
        
        if(str_contains($string, '`'))
        {
            return $string;
        }
        
        return "`$string`";
    }
}
?>