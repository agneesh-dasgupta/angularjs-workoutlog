<?php
require 'database.php';
ini_set("session.cookie_httponly", 1);
session_start();
header("Content-Type: application/json");
$username = $_SESSION['user_id'];
$stmt = $mysqli->prepare("select avg(duration) as avg from workouts where user = ?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->bind_param('s', $username);
$stmt->execute();

$result = $stmt->get_result();
 $eventArray = array();
  $index = 0;
    while($row=$result->fetch_assoc()){
        $eventArray[] = array(
            "avg" => $row['avg']
        );
    }
     $stmt->close();
    echo json_encode($eventArray);
    exit;
   
?>