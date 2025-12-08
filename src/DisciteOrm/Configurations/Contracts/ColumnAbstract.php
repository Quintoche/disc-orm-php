<?php

namespace DisciteOrm\Configurations\Contracts;

use DisciteOrm\Configurations\Enums\Columns\BoolCreatable;
use DisciteOrm\Configurations\Enums\Columns\BoolNullable;
use DisciteOrm\Configurations\Enums\Columns\BoolSecured;
use DisciteOrm\Configurations\Enums\Columns\BoolUpdatable;
use DisciteOrm\Configurations\Enums\Columns\TypeIndex;
use DisciteOrm\Configurations\Enums\Columns\ValueDefault;
use DisciteOrm\Configurations\Enums\Columns\ValueType;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeBinary;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeDate;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeFloat;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeInteger;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeString;

abstract class ColumnAbstract implements ColumnInterface
{


    /**
     * ColumnAbstract constructor.
     *
     * @param string $columnName The name of the column.
     */
    public function __construct(string $columnName)
    {
        $this->name = $columnName;
    }
    


    /**
     * The name of the column.
     *
     * @var string
     */
    protected string $name;


    /**
     * The type of the column.
     *
     * @var ValueType
     */
    protected ValueType $type = ValueType::STRING;


    /**
     * The subtype of the column.
     *
     * @var ValueTypeString|ValueTypeInteger|ValueTypeFloat|ValueTypeDate|ValueTypeBinary
     */
    protected ValueTypeString|ValueTypeInteger|ValueTypeFloat|ValueTypeDate|ValueTypeBinary $subType = ValueTypeString::String;


    /**
     * The length of the column.
     *
     * @var int|null
     */
    protected int|null $length = 255;


    /**
     * The default value of the column.
     *
     * @var mixed
     */
    protected mixed $default = ValueDefault::EmptyString;


    /**
     * Whether the column is nullable.
     *
     * @var BoolNullable
     */
    protected BoolNullable $nullable = BoolNullable::FALSE;


    /**
     * Whether the column is secured.
     *
     * @var BoolSecured
     */
    protected BoolSecured $secured = BoolSecured::FALSE;


    /**
     * Whether the column is updatable.
     *
     * @var BoolUpdatable
     */
    protected BoolUpdatable $updatable = BoolUpdatable::TRUE;


    /**
     * Whether the column is creatable.
     *
     * @var BoolCreatable
     */
    protected BoolCreatable $creatable = BoolCreatable::TRUE;


    /**
     * The index type of the column.
     *
     * @var TypeIndex
     */
    protected TypeIndex $index = TypeIndex::NONE;


    /**
     * The index table for the column.
     *
     * @var TableAbstract|null
     */
    protected ?TableAbstract $indexTable = null;



    /**
     * Get or set the column name.
     * 
     * @param string|null $name The name to set. If null, the current name is returned.
     * 
     * @return string|static Returns the column name if getting, or the current instance if setting.
     */
    public function name(?string $name = null) : string|static
    {
        if($name)
        {
            $this->name = $name;
            return $this;
        }
        else
        {
            return $this->name;
        }
    }

    
    /**
     * Get or set the column type.
     * 
     * @param ValueType|null $type The type to set. If null, the current type is returned.
     * 
     * @return ValueType|static Returns the column type if getting, or the current instance if setting.
     */
    public function type(?ValueType $type = null) : ValueType|static
    {
        if($type)
        {
            $this->type = $type;
            return $this;
        }
        else
        {
            return $this->type;
        }
    }


    /**
     * Get or set the column subtype.
     * 
     * @param ValueTypeString|ValueTypeInteger|ValueTypeFloat|ValueTypeDate|ValueTypeBinary|null $subType The subtype to set. If null, the current subtype is returned.
     * 
     * @return ValueTypeString|ValueTypeInteger|ValueTypeFloat|ValueTypeDate|ValueTypeBinary|static Returns the column subtype if getting, or the current instance if setting.
     */
    public function subType(ValueTypeString|ValueTypeInteger|ValueTypeFloat|ValueTypeDate|ValueTypeBinary|null $subType = null) : ValueTypeString|ValueTypeInteger|ValueTypeFloat|ValueTypeDate|ValueTypeBinary|static
    {
        if($subType)
        {
            $this->subType = $subType;
            return $this;
        }
        else
        {
            return $this->subType;
        }
    }

    
    /**
     * Get or set the column length.
     * 
     * @param int|null $length The length to set. If null, the current length is returned.
     * 
     * @return int|static Returns the column length if getting, or the current instance if setting.
     */
    public function length(?int $length = null) : int|static
    {
        if($length)
        {
            $this->length = $length;
            return $this;
        }
        else
        {
            return $this->length;
        }
    }

    
    /**
     * Get or set the column default value.
     * 
     * @param mixed $default The default value to set. If null, the current default value is returned.
     * 
     * @return mixed|static Returns the column default value if getting, or the current instance if setting.
     */
    public function default(mixed $default = null) : mixed
    {
        if($default)
        {
            $this->default = $default;
            return $this;
        }
        else
        {
            return $this->default;
        }
    }

    
    /**
     * Get or set the column nullable status.
     * 
     * @param BoolNullable|null $nullable The nullable status to set. If null, the current nullable status is returned.
     * 
     * @return BoolNullable|static Returns the column nullable status if getting, or the current instance if setting.
     */
    public function nullable(?BoolNullable $nullable = null) : BoolNullable|static
    {
        if($nullable)
        {
            $this->nullable = $nullable;
            return $this;
        }
        else
        {
            return $this->nullable;
        }
    }

    
    /**
     * Get or set the column secured status.
     * 
     * @param BoolSecured|null $secured The secured status to set. If null, the current secured status is returned.
     * 
     * @return BoolSecured|static Returns the column secured status if getting, or the current instance if setting.
     */
    public function secured(?BoolSecured $secured = null) : BoolSecured|static
    {
        if($secured)
        {
            $this->secured = $secured;
            return $this;
        }
        else
        {
            return $this->secured;
        }
    }

    
    /**
     * Get or set the column updatable status.
     * 
     * @param BoolUpdatable|null $updatable The updatable status to set. If null, the current updatable status is returned.
     * 
     * @return BoolUpdatable|static Returns the column updatable status if getting, or the current instance if setting.
     */
    public function updatable(?BoolUpdatable $updatable = null) : BoolUpdatable|static
    {
        if($updatable)
        {
            $this->updatable = $updatable;
            return $this;
        }
        else
        {
            return $this->updatable;
        }
    }

    
    /**
     * Get or set the column creatable status.
     * 
     * @param BoolCreatable|null $creatable The creatable status to set. If null, the current creatable status is returned.
     * 
     * @return BoolCreatable|static Returns the column creatable status if getting, or the current instance if setting.
     */
    public function creatable(?BoolCreatable $creatable = null) : BoolCreatable|static
    {
        if($creatable)
        {
            $this->creatable = $creatable;
            return $this;
        }
        else
        {
            return $this->creatable;
        }
    }


    
    /**
     * Get or set the column index.
     * 
     * @param TypeIndex|null $index The index to set. If null, the current index is returned.
     * 
     * @return TypeIndex|static Returns the column index if getting, or the current instance if setting.
     */
    public function index(?TypeIndex $index = null) : TypeIndex|static
    {
        if($index)
        {
            $this->index = $index;
            return $this;
        }
        else
        {
            return $this->index;
        }
    }

    
    /**
     * Get or set the column index table.
     * 
     * @param TableAbstract|null $indexTable The index table to set. If null, the current index table is returned.
     * 
     * @return TableAbstract|static Returns the column index table if getting, or the current instance if setting.
     */
    public function indexTable(?TableAbstract $indexTable = null) : TableAbstract|static
    {
        if($indexTable)
        {
            $this->indexTable = $indexTable;
            return $this;
        }
        else
        {
            return $this->indexTable;
        }
    }

}

?>