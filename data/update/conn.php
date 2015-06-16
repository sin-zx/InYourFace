<?php
require  'medoo/medoo.min.php';
require  'config.php';
$medoo = new medoo(array(
	'database_type' => 'mysql',
	'database_name' => 'inyourface',
	'server' => HOST,
	'username' => USERNAME,
	'password' => PASSWORD,
	'charset' => 'utf8',
));


?>