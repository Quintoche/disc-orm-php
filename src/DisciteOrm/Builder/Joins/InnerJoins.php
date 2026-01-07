<?php

namespace DisciteOrm\Builder\Joins;

trait InnerJoins
{
    public function innerJoin(string $table, string $firstColumn, string $operator, string $secondColumn): static
    {
        $this->queryBase->addJoin('INNER JOIN', $table, $firstColumn, $operator, $secondColumn);
        return $this;
    }   
}

?>