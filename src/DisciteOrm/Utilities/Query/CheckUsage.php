<?php

namespace DisciteOrm\Utilities\Query;

use DisciteOrm\Configurations\Contracts\ColumnAbstract;
use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Configurations\Enums\Columns\BoolNullable;
use DisciteOrm\Configurations\Enums\Columns\BoolSecured;
use DisciteOrm\Configurations\Enums\Columns\BoolUpdatable;
use DisciteOrm\Configurations\Enums\Configs\ColumnUsage;
use DisciteOrm\DisciteConfiguration;

class CheckUsage
{
    public static function isStrictColumn(): bool
    {
        return (DisciteConfiguration::usageColumn()->value == ColumnUsage::STRICT->value);
    }

}


?>