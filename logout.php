<?php
	//Destroys session and logs user out
	session_destroy();
	header("Location:index.html");
?>