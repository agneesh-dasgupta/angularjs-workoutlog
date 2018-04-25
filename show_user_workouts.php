<?php
//Returns all workouts for a user using a JSON array
require 'database.php';
ini_set("session.cookie_httponly", 1);
session_start();
header("Content-Type: application/json");
$username = $_SESSION['user_id'];
$stmt = $mysqli->prepare("select name, duration from workouts where user=?");
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
            "name" => $row['name'],
            "duration" => $row['duration']
        );
    }
    echo json_encode($eventArray);
    $stmt->close();
	
?>