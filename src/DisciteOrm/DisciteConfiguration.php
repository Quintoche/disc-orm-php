<?php

namespace DisciteOrm;

use DisciteOrm\Configurations\Enums\Configs\ColumnUsage;
use DisciteOrm\Configurations\Enums\Configs\NamingConvention;
use DisciteOrm\Configurations\Enums\Configs\TableUsage;
use DisciteOrm\Configurations\Settings\UsageTable;

class DisciteConfiguration
{
    protected static TableUsage $tableUsage = TableUsage::LOOSE;

    protected static ColumnUsage $columnUsage = ColumnUsage::LOOSE;

    protected static NamingConvention $namingConvention = NamingConvention::Undefined;



    public static function usageTable(?TableUsage $tableUsage = null) : ?TableUsage
    {
        if($tableUsage)
        {
            self::$tableUsage = $tableUsage;
            return null;
        }

        return self::$tableUsage;
    }

    public static function usageColumn(?ColumnUsage $columnUsage = null) : ?ColumnUsage
    {
        if($columnUsage)
        {
            self::$columnUsage = $columnUsage;
            return null;
        }

        return self::$columnUsage;
    }

    public static function namingConvention(?NamingConvention $namingConvention = null) : ?NamingConvention
    {
        if($namingConvention)
        {
            self::$namingConvention = $namingConvention;
            return null;
        }

        return self::$namingConvention;
    }
}

?>