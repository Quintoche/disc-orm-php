<?php

namespace DisciteOrm\Configurations\Contracts;

use DisciteOrm\Configurations\Enums\Query\QuerySort;
use DisciteOrm\Configurations\Enums\Tables\Permissions;
use DisciteOrm\Configurations\Enums\Tables\Type;

interface TableInterface
{

    /**
     * Get or set the name of the table.
     *
     * @param string|null $name The name of the table.
     * 
     * @return string|static The name of the table or the instance for chaining.
     */
    public function name(?string $name) : string|static;
    

    /**
     * Get or set the type of the table.
     *
     * @param Type|null $type The type of the table.
     * 
     * @return Type|static The type of the table or the instance for chaining.
     */
    public function type(?Type $type) : Type|static;
    

    /**
     * Get or set the primary key of the table.
     *
     * @param ColumnAbstract|null $primaryKey The primary key of the table.
     * 
     * @return ColumnAbstract|static The primary key of the table or the instance for chaining.
     */
    public function primaryKey(?ColumnAbstract $primaryKey) : ColumnAbstract|static;
    

    /**
     * Get or set the columns of the table.
     *
     * @param array $columns The columns of the table.
     * 
     * @return array|static The columns of the table or the instance for chaining.
     */
    public function columns(?array $columns) : array|static;
    

    /**
     * Add a column to the table.
     *
     * @param ColumnAbstract $column The column to add.
     * 
     * @return static The instance for chaining.
     */
    public function addColumn(ColumnAbstract $column) : static;
    

    /**
     * Get or set the default sort direction for the table.
     *
     * @param QuerySort|null $defaultSort The default sort direction.
     * 
     * @return QuerySort|static The default sort direction or the instance for chaining.
     */
    public function defaultSort(?QuerySort $defaultSort) : QuerySort|static;
    

    /**
     * Get or set the default sort column for the table.
     *
     * @param ColumnAbstract|null $defaultSortColumn The default sort column.
     * 
     * @return ColumnAbstract|static The default sort column or the instance for chaining.
     */
    public function defaultSortColumn(?ColumnAbstract $defaultSortColumn) : ColumnAbstract|static;
    

    /**
     * Get or set the permissions for the table.
     *
     * @param Permissions|null $permissions The permissions for the table.
     * 
     * @return Permissions|static The permissions for the table or the instance for chaining.
     */
    public function permissions(?Permissions $permissions) : Permissions|static;
    
}
