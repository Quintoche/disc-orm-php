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

$record = $disciteORM->database()->table('users')
    ->select('*')
    // ->where('id', '1')
    // ->where('email', 'john@example.com')
    // ->and()
    // ->create(['name' => 'John Doe', 'email' => 'john@example.com'])
    // ->create(['email' => 'john@example.cosm','name' => 'John Doe2', 'address'=>'123 Street'])
    // ->update(['name' => 'John Doe'])
    ->where('name', 'John Doe');


var_dump($record->next());
var_dump($record->next());

$start = microtime(true);

    
$disciteORM->database()->storeAll();
$end = microtime(true);
$duration = ($end - $start) * 1000;

echo '<br/><br/><br/><b>TIME LOAD TABLES AND KEYS</b>';
    echo '<pre>Execution time: '. number_format($duration, 3, '.', ' ') .' ms</pre>';
echo '<pre>',var_dump($disciteORM->database()->getColumns()),'</pre>';

    // ->delete('id', 1)
    // ->retrieve()
    // ->count()


    
    
    

?>