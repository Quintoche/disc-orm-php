<?php

namespace DisciteOrm\Builder\Query;

use DisciteOrm\Configurations\Enums\Query\QueryType;

trait InsertQuery
{
    /**
     * Insert records into the database.
     *
     * @param array<string|ColumnAbstract, mixed> $data The data to insert.
     * 
     * @return \DisciteOrm\Core\QueryBuilder The query builder instance.
     */
    public function insert(array $data): static
    {
        
        $this->type(QueryType::INSERT);

        $datas = [];
        foreach($data as $column => $value)
        {
            $datas[$column] = $value;
        }
        $this->data[] = $datas;

        if($this->columns !== [])
        {
            foreach(array_keys($data) as $column)
            {
                if(!in_array($column, $this->columns, true))  
                {
                    foreach($this->data as $dataIndex => $dataRow)
                    {
                        if(array_key_exists($column, $dataRow)) continue;
                        $this->data[$dataIndex][$column] = null;
                    }
                }
            }
        }

        foreach(array_keys($data) as $column)
        {
            if(in_array($column, $this->columns, true)) continue;
            $this->columns[] = $column;
        }

        return $this;
    }

    /**
     * Create records in the database.
     *
     * @param array<string|ColumnAbstract, mixed> $data The data to create.
     * 
     * @return \DisciteOrm\Core\QueryBuilder The query builder instance.
     */
    public function create(array $data): static
    {
        $this->type(QueryType::INSERT);

        $datas = [];
        foreach($data as $column => $value)
        {
            $datas[$column] = $value;
        }
        $this->data[] = $datas;

        if($this->columns !== [])
        {
            foreach(array_keys($data) as $column)
            {
                if(!in_array($column, $this->columns, true))  
                {
                    foreach($this->data as $dataIndex => $dataRow)
                    {
                        if(array_key_exists($column, $dataRow)) continue;
                        $this->data[$dataIndex][$column] = null;
                    }
                }
            }
        }

        foreach(array_keys($data) as $column)
        {
            if(in_array($column, $this->columns, true)) continue;
            $this->columns[] = $column;
        }

        return $this;
    }
}

?>