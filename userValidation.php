<?php
	//Validates an existing user
	require 'database.php';
	session_start();
    // Use a prepared statement
    $pwd_guess = $_POST['password'];
    $user = $_POST['username'];
	$stmt = $mysqli->prepare("SELECT COUNT(*), username, password FROM users WHERE username=?");

	// Bind the parameter
	$stmt->bind_param('s', $user);
	
	$stmt->execute();

	// Bind the results
	$stmt->bind_result($cnt, $user_id, $pwd_hash);
	$stmt->fetch();

	
	// Compare the submitted password to the actual password hash

	if($cnt == 1 && password_verify($pwd_guess, $pwd_hash)){
		// Login succeeded!
		$_SESSION['user_id'] = $user_id;
		header("Location: game.html");	
	} 
	else{
		// Login failed; redirect back to the login screen
    	header("Location:index.html");
	}
?>