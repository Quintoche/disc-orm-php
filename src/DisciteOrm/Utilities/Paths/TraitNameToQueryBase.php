<?php

namespace DisciteOrm\Utilities\Paths;

use DisciteOrm\Configurations\Query\QueryBase;

class TraitNameToQueryBase
{
    private static string $traitPath = '\\DisciteOrm\\Builder\\Query\\';


    public static function render(string $traitName) : QueryBase
    {
        return match ($traitName) {
            self::$traitPath . 'InsertQuery' => QueryBase::INSERT,
            self::$traitPath . 'UpdateQuery' => QueryBase::UPDATE,
            self::$traitPath . 'DeleteQuery' => QueryBase::DELETE,
            self::$traitPath . 'SelectQuery' => QueryBase::SELECT,
            default => throw new \InvalidArgumentException("Unknown trait: $traitName"),
        };
    }
}

?>