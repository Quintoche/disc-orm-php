<?php

namespace DisciteOrm\Utilities\Formats;

class ToDisplayConditions
{
    /** Render column condition as display string.
     *
     * @param string $columnName
     * @param mixed $value
     * @return string
     */
    public static function render(string $columnName, mixed $value): string
    {
        return ToStringColumn::render($columnName) . ' = ' . ToStringValue::render($value);
    }
}