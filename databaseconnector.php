<?php
    include 'medoo.min.php';
	// Or initialize via independent configuration
$database = new medoo([
	'database_type' => 'mysql',
	'database_name' => 'unisearch',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
]);
?>