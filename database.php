<?php
// Content of database.php
//creation of mysqli varibale to be used in all of the queries
$mysqli = new mysqli('localhost', 'dannyAguirre', 'dA482521440', 'snake');

if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}
?>