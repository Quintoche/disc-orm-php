<?php

namespace DisciteOrm\Utilities\Formats;

use DisciteOrm\DisciteConnection;

class ToStringValue
{
    /** Render value as SQL string.
     *
     * @param string $string
     * @return string
     */
    public static function render(string $string): string
    {
        $string = DisciteConnection::$mysqli->escape_string($string);
        
        if(is_numeric($string))
        {
            return $string;
        }
        
        return "'$string'";
    }
}
?>