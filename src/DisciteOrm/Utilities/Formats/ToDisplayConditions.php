<?php

namespace DisciteOrm\Utilities\Formats;

class ToDisplayConditions
{
    public static function render(string $columnName, mixed $value): string
    {
        return ToStringColumn::render($columnName) . ' = ' . ToStringValue::render($value);
    }
}