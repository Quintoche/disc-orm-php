<?php

namespace DisciteOrm\Configurations\Contracts;

use DisciteOrm\Builder\Query\DeleteQuery;
use DisciteOrm\Builder\Query\InsertQuery;
use DisciteOrm\Builder\Query\SelectQuery;
use DisciteOrm\Builder\Query\UpdateQuery;
use DisciteOrm\Configurations\Enums\Query\QuerySort;
use DisciteOrm\Configurations\Enums\Tables\Permissions;
use DisciteOrm\Configurations\Enums\Tables\Type;


abstract class TableAbstract implements TableInterface
{
    use SelectQuery;   
    use InsertQuery;
    use UpdateQuery;
    use DeleteQuery;


    /**
     * TableAbstract constructor.
     *
     * @param string $tableName The name of the table.
     */
    public function __construct(string $tableName)
    {
        $this->name = $tableName;
    }



    /**
     * The name of the table.
     *
     * @var string
     */
    protected string $name;


    /**
     * The type of the table.
     *
     * @var Type
     */
    protected Type $type = Type::STANDARD;


    /**
     * The columns of the table.
     *
     * @var array<ColumnAbstract>
     */
    protected array $columns = [];


    /**
     * The primary key of the table.
     *
     * @var ColumnAbstract|null
     */
    protected ?ColumnAbstract $primaryKey;


    /**
     * The default sort order for queries.
     *
     * @var QuerySort
     */
    protected QuerySort $defaultSort = QuerySort::NONE;


    /**
     * The default sort column for queries.
     *
     * @var ColumnAbstract|null
     */
    protected ?ColumnAbstract $defaultSortColumn;


    /**
     * The permissions for the table.
     *
     * @var Permissions
     */
    protected Permissions $permissions = Permissions::WRITE;



    /**
     * Get or set the table name.
     * 
     * @param string|null $name The name of the table to set. If null, the current name is returned.
     * 
     * @return string|static Returns the table name if getting, or the current instance if
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
     * Get or set the table type.
     * 
     * @param Type|null $type The type of the table to set. If null, the current type is returned.
     * 
     * @return Type|static Returns the table type if getting, or the current instance if setting.
     */
    public function type(?Type $type = null) : Type|static
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
     * Get or set the primary key column.
     * 
     * @param ColumnAbstract|null $primaryKey The primary key column to set. If null, the current column is returned.
     * 
     * @return ColumnAbstract|static Returns the primary key column if getting, or the current instance if setting.
     */
    public function primaryKey(?ColumnAbstract $primaryKey = null) : ColumnAbstract|static
    {
        if($primaryKey)
        {
            $this->primaryKey = $primaryKey;
            return $this;
        }
        else
        {
            return $this->primaryKey;
        }
    }


    /**
     * Get or set the columns.
     * 
     * @param array|null $columns The columns to set. If null, the current columns are returned.
     * 
     * @return array|static Returns the columns if getting, or the current instance if setting.
     */
    public function columns(?array $columns = null) : array|static
    {
        if($columns)
        {
            $this->columns = $columns;
            return $this;
        }
        else
        {
            return $this->columns;
        }
    }


    /**
     * Add a column to the table.
     * 
     * @param ColumnAbstract $column The column to add.
     * 
     * @return static Returns the current instance.
     */
    public function addColumn(ColumnAbstract $column) : static
    {
        $this->columns[] = $column;
        return $this;
    }


    /**
     * Get or set the default sort order.
     * 
     * @param QuerySort|null $defaultSort The default sort order to set. If null, the current order is returned.
     * 
     * @return QuerySort|static Returns the default sort order if getting, or the current instance if setting.
     */
    public function defaultSort(?QuerySort $defaultSort = null) : QuerySort|static
    {
        if($defaultSort)
        {
            $this->defaultSort = $defaultSort;
            return $this;
        }
        else
        {
            return $this->defaultSort;
        }
    }


    /**
     * Get or set the default sort column.
     * 
     * @param ColumnAbstract|null $defaultSortColumn The default sort column to set. If null, the current column is returned.
     * 
     * @return ColumnAbstract|static Returns the default sort column if getting, or the current instance if setting.
     */
    public function defaultSortColumn(?ColumnAbstract $defaultSortColumn = null) : ColumnAbstract|static
    {
        if($defaultSortColumn)
        {
            $this->defaultSortColumn = $defaultSortColumn;
            return $this;
        }
        else
        {
            return $this->defaultSortColumn;
        }
    }


    /**
     * Get or set the table permissions.
     * 
     * @param Permissions|null $permissions The permissions to set. If null, the current permissions are returned.
     * 
     * @return Permissions|static Returns the permissions if getting, or the current instance if setting.
     */
    public function permissions(?Permissions $permissions = null) : Permissions|static
    {
        if($permissions)
        {
            $this->permissions = $permissions;
            return $this;
        }
        else
        {
            return $this->permissions;
        }
    }

}

?>