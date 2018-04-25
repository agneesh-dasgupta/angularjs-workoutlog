<?php
//Returns all workouts, except for the logged in user, using a JSON array
require 'database.php';
ini_set("session.cookie_httponly", 1);
session_start();
header("Content-Type: application/json");
$username = $_SESSION['user_id'];
$stmt = $mysqli->prepare("select user, name, duration from workouts where user <>?");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $eventArray = array();
    while($row=$result->fetch_assoc()){
        $eventArray[] = array(
            "name" => htmlentities($row['name']),
            "duration" => htmlentities($row['duration']),
            "user" => htmlentities($row['user'])
        );
    }
    echo json_encode($eventArray);
    $stmt->close();
	
?>