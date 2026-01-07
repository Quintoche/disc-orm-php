<?php

namespace DisciteOrm\Utilities\Readers\Columns;

use DisciteOrm\Columns\Column;
use DisciteOrm\Configurations\Contracts\ColumnAbstract;
use DisciteOrm\Configurations\Enums\Columns\TypeIndex;

class RenderColumn
{
    /** Render column from data array.
     *
     * @param array $columnData
     * @return ColumnAbstract
     */
    public static function render(array $columnData) : ColumnAbstract
    {
        $columnClass = new Column($columnData['COLUMN_NAME']);

        $columnClass->index(
            RenderColumnIndex::render($columnData)
        );

        if($columnClass->index() === TypeIndex::INDEX)
        {
            $columnClass->indexTableName(
                RenderColumnIndex::renderTableName($columnData)
            );
        }

        $columnClass->updatable(
            RenderColumnParameters::renderUpdatable($columnData)
        );

        $columnClass->creatable(
            RenderColumnParameters::renderCreatable($columnData)
        );

        $columnClass->nullable(
            RenderColumnParameters::renderNullable($columnData)
        );

        $columnClass->secured(
            RenderColumnSpecies::renderSecured($columnData)
        );

        $columnClass->type(
            RenderColumnType::renderType($columnData)
        );

        $columnClass->subType(
            RenderColumnType::renderSubtype($columnData)
        );

        $columnClass->length(
            RenderColumnType::renderLength($columnData)
        );

        $columnClass->default(
            RenderColumnDefault::render($columnData)
        );

        return $columnClass;
    }
}

?>