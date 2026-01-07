<?php

namespace DisciteOrm\Utilities\Query;

use DisciteOrm\Configurations\Enums\Configs\ColumnUsage;
use DisciteOrm\DisciteConfiguration;

class CheckUsage
{
    /** Check if column usage is set to strict in configuration.
     *
     * @return bool
     */
    public static function isStrictColumn(): bool
    {
        return (DisciteConfiguration::usageColumn()->value == ColumnUsage::STRICT->value);
    }

}


?>