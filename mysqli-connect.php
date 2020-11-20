<?php
//define constant variables
define('DB_NAME', 'register_db');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_HOST','localhost');

try{
	$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	mysqli_set_charset($connection,'utf8');
}catch(Exception $ex){
	print("An Exception occured. Message: " . $ex->getMessage());
}catch(Error $e){
	print("The system is busy try later");
}