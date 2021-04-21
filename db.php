<?php

include "Medoo.php";
use Medoo\Medoo;

 $database = new Medoo([
	'database_type' => 'mysql',
	'database_name' => 'eczane_api',
	'server' => 'localhost',
	'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
	'collation' => 'utf8mb4_general_ci',
]
); 


$database2 = new Medoo([
	'database_type' => 'sqlite',
	'database_file' => 'database.db'
]
);



?>