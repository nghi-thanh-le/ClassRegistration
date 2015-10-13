<?php
	session_start();
	//Check if user has a cookie.
	if(isset($_COOKIE["User"])){
		//If so, set session and go to sign in.
		$_SESSION["name"] = $_COOKIE["User"]["name"];
		$_SESSION["retry"] = 0;
		$_SESSION["time"] = time();
		header("Location: ../signin.php");
	}
	else{
		//If not, go to registration.
		header("Location: ../register.php");
	}
?>