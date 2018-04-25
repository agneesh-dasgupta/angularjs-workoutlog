<?php
// Content of database.php
//creation of mysqli varibale to be used in all of the queries
$mysqli = new mysqli('localhost', 'newsadmin', 'fakenews', 'news');

if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}
?>