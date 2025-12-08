<?php

namespace DisciteOrm\Utilities\Query;

use DisciteOrm\Configurations\Contracts\ColumnAbstract;
use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Configurations\Enums\Columns\BoolCreatable;
use DisciteOrm\Configurations\Enums\Columns\BoolNullable;
use DisciteOrm\Configurations\Enums\Columns\BoolSecured;
use DisciteOrm\Configurations\Enums\Columns\BoolUpdatable;
use DisciteOrm\Configurations\Enums\Configs\ColumnUsage;
use DisciteOrm\DisciteConfiguration;

class CheckColumn
{
    public static function exists(string $columnName, TableAbstract $table): bool
    {
        return (DisciteConfiguration::usageColumn()->value == ColumnUsage::STRICT->value) ? array_key_exists($columnName, $table->columns(), true) : true;
    }

    public static function secured(ColumnAbstract $column, TableAbstract $table) : bool
    {
        return ($table->columns()[$column->name()]->secured()->value == BoolSecured::TRUE->value) ? true : false;
    }

    public static function updatable(ColumnAbstract $column, TableAbstract $table) : bool
    {
        return ($table->columns()[$column->name()]->updatable()->value == BoolUpdatable::TRUE->value) ? true : false;
    }

    public static function creatable(ColumnAbstract $column, TableAbstract $table) : bool
    {
        return ($table->columns()[$column->name()]->creatable()->value == BoolCreatable::TRUE->value) ? true : false;
    }

    public static function nullable(ColumnAbstract $column, TableAbstract $table) : bool
    {
        return ($table->columns()[$column->name()]->nullable()->value == BoolNullable::TRUE->value) ? true : false;
    }

    public static function secured_s(string $columnName, TableAbstract $table) : bool
    {
        return ($table->columns()[$columnName]->secured()->value == BoolSecured::TRUE->value) ? true : false;
    }

    public static function updatable_s(string $columnName, TableAbstract $table) : bool
    {
        return ($table->columns()[$columnName]->updatable()->value == BoolUpdatable::TRUE->value) ? true : false;
    }

    public static function creatable_s(string $columnName, TableAbstract $table) : bool
    {
        return ($table->columns()[$columnName]->creatable()->value == BoolCreatable::TRUE->value) ? true : false;
    }

    public static function nullable_s(string $columnName, TableAbstract $table) : bool
    {
        return ($table->columns()[$columnName]->nullable()->value == BoolNullable::TRUE->value) ? true : false;
    }
}


?>