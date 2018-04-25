
<?php
//Calculates average workout and returns it 
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

$stmt->bind_result($avg);
 $eventArray = array();
  $index = 0;
    while($stmt->fetch()){
	echo $avg;
}
     $stmt->close();
    exit;
   
?>