<?php
	session_start();

	//Connect to ClassRegistration database
	require_once("../functions/database.php");
	$connection = connection();

	//get classID rom classupdate.php
	$classID = $_GET["recordID"];

	// Remove white space, check for blank, and remove special characters
	if(($title = trim($_POST["class_title"])) == ''){
		$_SESSION["errmsg"] = 1;
		header("Location: classupdate.php");
	}
	else{
		$title = mysqli_real_escape_string($connection, $title);
	}

	if(($start = trim($_POST["class_start"])) == ''){
		$_SESSION["errmsg"] = 2;
		header("Location: classupdate.php");
	}
	else{
		$start = mysqli_real_escape_string($connection, $start);
	}

	if(($descr = trim($_POST["class_descr"])) == ''){
		$_SESSION["errmsg"] = 3;
		header("Location: classupdate.php");
	}
	else{
		$descr = mysqli_real_escape_string($connection, $descr);
	}

	if(($cost = trim($_POST["class_cost"])) == ''){
		$_SESSION["errmsg"] = 4;
		header("Location: classupdate.php");
	}
	else{
		$cost = mysqli_real_escape_string($connection, $cost);
	}

	if(($instr = trim($_POST["class_instr"])) == ''){
		$_SESSION["errmsg"] = 5;
		header("Location: classupdate.php");
	}
	else{
		$instr = mysqli_real_escape_string($connection, $instr);
	}

	//Update a record on the class table
	$query = "UPDATE class SET class_title='$title', class_start='$start', class_descr='$descr', 
	class_cost='$cost', class_instr='$instr' WHERE class_id='$classID'";
	$result = mysqli_query($connection, $query);
	if(!$result){
		echo "Insert into class failed. " . mysqli_error($connection);
		exit();
	}

	header("Location: ../classlist.php");
?>