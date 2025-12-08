<?php

namespace DisciteOrm\Configurations\Contracts;

use DisciteOrm\Configurations\Enums\Columns\BoolNullable;
use DisciteOrm\Configurations\Enums\Columns\BoolSecured;
use DisciteOrm\Configurations\Enums\Columns\BoolUpdatable;
use DisciteOrm\Configurations\Enums\Columns\TypeIndex;
use DisciteOrm\Configurations\Enums\Columns\ValueType;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeBinary;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeDate;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeFloat;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeInteger;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeString;

interface ColumnInterface
{
    
    /**
     * Get or set the column name.
     * 
     * @param string|null $name The name to set. If null, the current name is returned.
     * 
     * @return string|static Returns the column name if getting, or the current instance if setting.
     */
    public function name(?string $name = null) : string|static;
    

    /**
     * Get or set the column type.
     * 
     * @param ValueType|null $type The type to set. If null, the current type is returned.
     * 
     * @return ValueType|static Returns the column type if getting, or the current instance if setting.
     */
    public function type(?ValueType $type = null) : ValueType|static;
    

    /**
     * Get or set the column subtype.
     * 
     * @param ValueTypeString|ValueTypeInteger|ValueTypeFloat|ValueTypeDate|ValueTypeBinary|null $subType The subtype to set. If null, the current subtype is returned.
     * 
     * @return ValueTypeString|ValueTypeInteger|ValueTypeFloat|ValueTypeDate|ValueTypeBinary|static Returns the column subtype if getting, or the current instance if setting.
     */
    public function subType(ValueTypeString|ValueTypeInteger|ValueTypeFloat|ValueTypeDate|ValueTypeBinary|null $subType = null) : ValueTypeString|ValueTypeInteger|ValueTypeFloat|ValueTypeDate|ValueTypeBinary|static;


    /**
     * Get or set the column length.
     * 
     * @param int|null $length The length to set. If null, the current length is returned.
     * 
     * @return int|static Returns the column length if getting, or the current instance if setting.
     */
    public function length(?int $length = null) : int|static;
    

    /**
     * Get or set the column default value.
     * 
     * @param mixed $default The default value to set. If null, the current default value is returned.
     * 
     * @return mixed|static Returns the column default value if getting, or the current instance if setting.
     */
    public function default(mixed $default = null) : mixed;
    

    /**
     * Get or set the column nullable flag.
     * 
     * @param BoolNullable|null $nullable The nullable flag to set. If null, the current nullable flag is returned.
     * 
     * @return BoolNullable|static Returns the column nullable flag if getting, or the current instance if setting.
     */
    public function nullable(?BoolNullable $nullable = null) : BoolNullable|static;


    /**
     * Get or set the column secured flag.
     * 
     * @param BoolSecured|null $secured The secured flag to set. If null, the current secured flag is returned.
     * 
     * @return BoolSecured|static Returns the column secured flag if getting, or the current instance if setting.
     */
    public function secured(?BoolSecured $secured = null) : BoolSecured|static;
    

    /**
     * Get or set the column updatable flag.
     * 
     * @param BoolUpdatable|null $updatable The updatable flag to set. If null, the current updatable flag is returned.
     * 
     * @return BoolUpdatable|static Returns the column updatable flag if getting, or the current instance if setting.
     */
    public function updatable(?BoolUpdatable $updatable = null) : BoolUpdatable|static;
    

    /**
     * Get or set the column index type.
     * 
     * @param TypeIndex|null $index The index type to set. If null, the current index type is returned.
     * 
     * @return TypeIndex|static Returns the column index type if getting, or the current instance if setting.
     */
    public function index(?TypeIndex $index = null) : TypeIndex|static;
    

    /**
     * Get or set the index table for the column.
     * 
     * @param TableAbstract|null $indexTable The index table to set. If null, the current index table is returned.
     * 
     * @return TableAbstract|static Returns the index table if getting, or the current instance if setting.
     */
    public function indexTable(?TableAbstract $indexTable = null) : TableAbstract|static;
}

?>

