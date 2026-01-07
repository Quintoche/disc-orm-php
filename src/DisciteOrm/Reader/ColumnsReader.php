<?php

namespace DisciteOrm\Reader;

use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Configurations\Enums\Columns\TypeIndex;
use DisciteOrm\DisciteConnection;
use DisciteOrm\Utilities\Readers\Columns\RenderColumn;

trait ColumnsReader
{
    /**
     * Reads columns information.
     * 
     * @return array The columns information.
     */
    public function readColumns(): array
    {
        $query = "SELECT c.TABLE_NAME, c.COLUMN_NAME, c.DATA_TYPE, c.COLUMN_KEY, c.COLUMN_DEFAULT, c.IS_NULLABLE, c.CHARACTER_MAXIMUM_LENGTH, c.EXTRA, s.NON_UNIQUE, s.INDEX_TYPE, k.CONSTRAINT_NAME, k.REFERENCED_TABLE_NAME, k.REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS c LEFT JOIN INFORMATION_SCHEMA.STATISTICS s ON c.TABLE_SCHEMA = s.TABLE_SCHEMA AND c.TABLE_NAME = s.TABLE_NAME AND c.COLUMN_NAME = s.COLUMN_NAME LEFT JOIN INFORMATION_SCHEMA.KEY_COLUMN_USAGE k ON c.TABLE_SCHEMA = k.TABLE_SCHEMA AND c.TABLE_NAME = k.TABLE_NAME AND c.COLUMN_NAME = k.COLUMN_NAME WHERE c.TABLE_SCHEMA = DATABASE();";
        $result = DisciteConnection::$mysqli->query($query)->fetch_all(MYSQLI_ASSOC) ?? [];
        
        return $result;
    }

    /**
     * Reads and stores columns in their respective tables.
     * 
     * @return array The columns information.
     */
    public function storeColumns(): array
    {
        $columns = $this->readColumns();

        foreach($columns as $columnData)
        {
            $columnClass = RenderColumn::render(
                $columnData
            );

            if($this->tablesManager->getTable(ucfirst($columnData['TABLE_NAME'])) instanceof TableAbstract)
            {
                if($columnClass->index() === TypeIndex::INDEX && $this->tablesManager->getTable(ucfirst($columnClass->indexTableName())) instanceof TableAbstract)
                {
                    $columnClass->indexTable(
                        $this->tablesManager->getTable(ucfirst($columnClass->indexTableName()))
                    );
                }

                if($columnClass->index() === TypeIndex::PRIMARY)
                {
                    $this->tablesManager->getTable(ucfirst($columnData['TABLE_NAME']))->primaryKey(
                        $columnClass
                    );
                }

                $this->tablesManager->getTable(ucfirst($columnData['TABLE_NAME']))?->addColumn(
                    $columnClass
                );
                
            }

            $this->columnsManager->registerColumn(
                ucfirst($columnData['TABLE_NAME']) . '.' . $columnData['COLUMN_NAME'],
                $columnClass
            );
        }

        return $columns;
    }

    /**
     * Retrieves all registered columns from the TablesManager.
     *
     * @return array An array of registered columns with their details.
     */
    public function getColumns() : array
    {
        $columns = [];

        foreach($this->columnsManager->getColumns() as $column)
        {
            $columns[] = [
                'name' => $column->name(),
                'type' => $column->type()->name,
                'subType' => $column->subType()->name,
                'length' => $column->length(),
                'default' => ($column->default() instanceof \DisciteOrm\Configurations\Enums\Columns\ValueDefault) ? $column->default()->name : null,
                'nullable' => $column->nullable()->name,
                'secured' => $column->secured()->name,
                'updatable' => $column->updatable()->name,
                'creatable' => $column->creatable()->name,
                'index' => $column->index()->name,
                'indexTable' => ($column->indexTable() instanceof TableAbstract) ? $column->indexTable()->name() : null,
            ];
        }

        return $columns;
    }
}

?>