<?php
    ini_set('display_errors','1');
    ini_set('display_startup_erros','1');
    error_reporting(E_ALL);
    
require_once __DIR__ . '../../vendor/autoload.php';

use DisciteOrm\DisciteOrm;




$disciteORM = new DisciteOrm();

// $col = new Column('id');

//     $col->type(ValueType::INTEGER)
//         ->subType(ValueTypeInteger::Integer)
//         ->nullable(BoolNullable::FALSE);

// $table = new Table('users');

//     $table
//     ->type(Type::STANDARD)
//     ->addColumn($col);


$disciteORM->database('database')->table('users')
    ->select(['id', 'name', 'email'])
    ->where('id', 1)
    ->get();
    // ->create(['name' => 'John Doe', 'email' => 'john@example.com'])
    // ->update(['name' => 'John Doe'])
    // ->delete('id', 1)
    // ->retrieve()
    // ->count()


    
    
    

?>