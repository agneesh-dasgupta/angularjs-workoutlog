<?php
		
require 'database.php';
ini_set("session.cookie_httponly", 1);
session_start();
$data = json_decode(file_get_contents("php://input"));
$username = $_SESSION['user_id'];
$name = $data->newname;
$newhours = $data->newhours;

$stmt = $mysqli->prepare("insert into workouts (name, duration, user) values (?, ?, ?)");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('sis', $name, $newhours, $username);

$stmt->execute();

$stmt->close();

?>