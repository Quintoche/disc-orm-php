<?php

namespace DisciteOrm\Utilities\Readers\Columns;

use DisciteOrm\Configurations\Enums\Columns\ValueType;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeBinary;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeDate;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeFloat;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeInteger;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeString;

class RenderColumnType
{
    /** Render column type as string.
     *
     * @param array $indexData
     * 
     * @return ValueType
     */
    public static function renderType(array $columnData): ValueType
    {
        $columnData = self::formatDatas($columnData);
        
        return self::matchDatasType($columnData);
    }

    /** Render column subtype as string.
     *
     * @param array $columnData
     * 
     * @return ValueTypeString|ValueTypeInteger|ValueTypeFloat|ValueTypeDate|ValueTypeBinary
     */
    public static function renderSubtype(array $columnData): ValueTypeString|ValueTypeInteger|ValueTypeFloat|ValueTypeDate|ValueTypeBinary
    {
        $columnData = self::formatDatas($columnData);
        
        return self::matchDatasSubType($columnData);
    }

    /** Render column length as integer.
     *
     * @param array $columnData
     * 
     * @return int
     */
    public static function renderLength(array $columnData) : int
    {
        $columnData = self::formatDatas($columnData);

        return $columnData['CHARACTER_MAXIMUM_LENGTH'] ?? self::matchDefaultLength($columnData);
    }

    /** Match index data to ValueType.
     *
     * @param array $data
     * 
     * @return ValueType
     */
    protected static function matchDatasType(array $data): ValueType
    {
        return match($data['DATA_TYPE'])
        {
            'INT', 'INTEGER', 'TINYINT', 'SMALLINT', 'MEDIUMINT', 'BIGINT', 'BIT' => ValueType::INTEGER,
            'FLOAT', 'DOUBLE', 'DECIMAL', 'NUMERIC' => ValueType::FLOAT,
            'CHAR', 'VARCHAR', 'TEXT', 'TINYTEXT', 'MEDIUMTEXT', 'LONGTEXT', 'ENUM', 'SET' => ValueType::STRING,
            'DATE', 'DATETIME', 'TIMESTAMP', 'TIME', 'YEAR' => ValueType::DATE,
            'BLOB', 'TINYBLOB', 'MEDIUMBLOB', 'LONGBLOB', 'BINARY', 'VARBINARY' => ValueType::BINARY,
            'BOOLEAN', 'BOOL' => ValueType::INTEGER,
            default => ValueType::STRING,
        };
    }

    /** Match index data to subtype.
     *
     * @param array $data
     * 
     * @return ValueTypeString|ValueTypeInteger|ValueTypeFloat|ValueTypeDate|ValueTypeBinary
     */
    protected static function matchDatasSubType(array $data): ValueTypeString|ValueTypeInteger|ValueTypeFloat|ValueTypeDate|ValueTypeBinary
    {
        return match ($data['DATA_TYPE']) {
            'CHAR'          => self::returnTypeString($data['CHARACTER_MAXIMUM_LENGTH']), 
            'VARCHAR'       => self::returnTypeString($data['CHARACTER_MAXIMUM_LENGTH']), 
            'TINYTEXT'      => ValueTypeString::SmallText, 
            'TEXT'          => ValueTypeString::String, 
            'MEDIUMTEXT'    => ValueTypeString::MediumText, 
            'LONGTEXT'      => ValueTypeString::LongText, 
            'ENUM'          => self::returnTypeString($data['CHARACTER_MAXIMUM_LENGTH']), 
            'SET'           => self::returnTypeString($data['CHARACTER_MAXIMUM_LENGTH']),
            'TINYINT'       => ValueTypeInteger::TinyInt,
            'SMALLINT'      => ValueTypeInteger::SmallInt,
            'MEDIUMINT'     => ValueTypeInteger::MediumInt,
            'INT'           => ValueTypeInteger::Integer,
            'BIGINT'        => ValueTypeInteger::BigInt,
            'FLOAT'         => ValueTypeFloat::Float,
            'DOUBLE'        => ValueTypeFloat::Double,
            'DECIMAL'       => ValueTypeFloat::Decimal,
            'REAL'          => ValueTypeFloat::Double,
            'DATE'          => ValueTypeDate::Date,
            'DATETIME'      => ValueTypeDate::DateTime,
            'TIME'          => ValueTypeDate::Time,
            'TIMESTAMP'     => ValueTypeDate::Timestamp,
            'YEAR'          => ValueTypeDate::Year,
            'BINARY','BLOB' => self::returnTypeBlob($data['CHARACTER_MAXIMUM_LENGTH']),
            default         => ValueTypeString::String,
        };
    }

    /** Match default length for data type.
     *
     * @param array $data
     * 
     * @return int|null
     */
    protected static function matchDefaultLength(array $data) : ?int
    {
        return match ($data['DATA_TYPE']) {
            'CHAR' , 'VARCHAR'              => 255,
            'FLOAT', 'DOUBLE', 'DECIMAL'   => 10,
            'BOOL', 'BOOLEAN'                 => 1,
            'TINYINT'                       => 3,
            'SMALLINT'                      => 5,
            'MEDIUMINT'                     => 8,
            'INT', 'INTEGER'                => 10,
            'BIGINT'                        => 20,
            'TINYTEXT', 'TINYBLOB'         => 255,
            'TEXT', 'BLOB'                 => 65535,
            'MEDIUMTEXT', 'MEDIUMBLOB'     => 16777215,
            'LONGTEXT', 'LONGBLOB'         => 4294967295,
            default                        => 255,
        };
    }

    /** Return subtype for string types.
     *
     * @param int|null $length
     * 
     * @return ValueTypeString
     */
    private static function returnTypeString(?int $length) : ValueTypeString
    {
        return match ($length) {
            100         => ValueTypeString::SmallText,
            255         => ValueTypeString::String,
            16777215    => ValueTypeString::MediumText,
            4294967295  => ValueTypeString::LongText,
            36          => ValueTypeString::UUID,
            default     => ValueTypeString::String,
        };
    }

    /** Return subtype for integer types.
     *
     * @param int|null $length
     * 
     * @return ValueTypeInteger
     */
    private static function returnTypeInteger(?int $length) : ValueTypeInteger
    {
        return match ($length) {
            3         => ValueTypeInteger::TinyInt,
            5         => ValueTypeInteger::SmallInt,
            8         => ValueTypeInteger::MediumInt,
            10        => ValueTypeInteger::Integer,
            20        => ValueTypeInteger::BigInt,
            1         => ValueTypeInteger::Boolean,
            10        => ValueTypeInteger::UnixTime,
            default   => ValueTypeInteger::Integer,
        };
    }

    /** Return subtype for binary types.
     *
     * @param int|null $length
     * 
     * @return ValueTypeBinary
     */
    private static function returnTypeBlob(?int $length) : ValueTypeBinary
    {
        return match ($length) {
            65535     => ValueTypeBinary::Blob,
            255       => ValueTypeBinary::TinyBlob,
            16777215  => ValueTypeBinary::MediumBlob,
            429496729 => ValueTypeBinary::LongBlob,
            65535     => ValueTypeBinary::Json,
            default   => ValueTypeBinary::Blob,
        };
    }

    /** Format index data.
     *
     * @param array $data
     * @return array
     */
    protected static function formatDatas(array $data) : array
    {
        $data['DATA_TYPE'] = isset($data['DATA_TYPE']) ? strtoupper($data['DATA_TYPE']) : null;
        $data['CHARACTER_MAXIMUM_LENGTH'] = isset($data['CHARACTER_MAXIMUM_LENGTH']) ? (int) $data['CHARACTER_MAXIMUM_LENGTH'] : null;
        
        return $data;
    }
}

?>