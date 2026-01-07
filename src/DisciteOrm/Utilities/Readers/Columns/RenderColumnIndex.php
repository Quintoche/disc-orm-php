<?php

namespace DisciteOrm\Utilities\Readers\Columns;

use DisciteOrm\Configurations\Enums\Columns\TypeIndex;

class RenderColumnIndex
{
    /** Render column index as string.
     *
     * @param array $indexData
     * 
     * @return TypeIndex
     */
    public static function render(array $indexData): TypeIndex
    {   
        $indexData = self::formatDatas($indexData);
        
        return self::matchDatas($indexData);
    }

    /** Render table name for index.
     *
     * @param array $indexData
     * 
     * @return string|null
     */
    public static function renderTableName(array $indexData): ?string
    {
        return ucfirst($indexData['REFERENCED_TABLE_NAME'] ?? null);
    }

    /** Match index data to TypeIndex.
     *
     * @param array $data
     * 
     * @return TypeIndex
     */
    protected static function matchDatas(array $data): TypeIndex
    {
        return match(true)
        {
            $data['EXTRA'] === 'AUTO_INCREMENT' => TypeIndex::PRIMARY,
            $data['COLUMN_KEY'] === 'PRI' => TypeIndex::PRIMARY,
            $data['COLUMN_KEY'] === 'UNI' => TypeIndex::UNIQUE,
            $data['CONSTRAINT_NAME'] === 'PRIMARY' => TypeIndex::PRIMARY,
            $data['NON_UNIQUE'] === 0 => TypeIndex::UNIQUE,
            $data['INDEX_TYPE'] === 'FULLTEXT' => TypeIndex::FULLTEXT,
            !is_null($data['REFERENCED_TABLE_NAME']) => TypeIndex::INDEX,
            default => TypeIndex::NONE,
        };
    }

    /** Format index data.
     *
     * @param array $data
     * @return array
     */
    protected static function formatDatas(array $data) : array
    {
        $data['EXTRA'] = isset($data['EXTRA']) ? strtoupper($data['EXTRA']) : null;
        $data['COLUMN_KEY'] = isset($data['COLUMN_KEY']) ? strtoupper($data['COLUMN_KEY']) : null;
        $data['CONSTRAINT_NAME'] = isset($data['CONSTRAINT_NAME']) ? strtoupper($data['CONSTRAINT_NAME']) : null;
        $data['INDEX_TYPE'] = isset($data['INDEX_TYPE']) ? strtoupper($data['INDEX_TYPE']) : null;
        $data['NON_UNIQUE'] = isset($data['NON_UNIQUE']) ? (int)$data['NON_UNIQUE'] : null;
        $data['REFERENCED_TABLE_NAME'] = isset($data['REFERENCED_TABLE_NAME']) ? $data['REFERENCED_TABLE_NAME'] : null;

        return $data;
    }
}

?>