<?php

namespace DisciteOrm\Logs;

use DisciteOrm\Configurations\Contracts\TableAbstract;
use DisciteOrm\Configurations\Enums\Tables\Type;

final class LogTable extends TableAbstract
{
    protected Type $type = Type::LOGS;
}

?>