<?php
	session_start();
	//Connect to the ClassRegistration database
	require_once("../functions/database.php");
	$connection = connection();

	// Remove white space, chack for blank, and remove special characters
	if(($title = trim($_POST["class_title"])) == ''){
		$_SESSION["errmsg"] = 1;
		header("Location: classentry.php");
	}
	else{
		$title = mysqli_real_escape_string($connection, $title);
	}

	if(($start = trim($_POST["class_start"])) == ''){
		$_SESSION["errmsg"] = 2;
		header("Location: classentry.php");
	}
	else{
		$start = mysqli_real_escape_string($connection, $start);
	}

	if(($descr = trim($_POST["class_descr"])) == ''){
		$_SESSION["errmsg"] = 3;
		header("Location: classentry.php");
	}
	else{
		$descr = mysqli_real_escape_string($connection, $descr);
	}

	if(($cost = trim($_POST["class_cost"])) == ''){
		$_SESSION["errmsg"] = 4;
		header("Location: classentry.php");
	}
	else{
		$cost = mysqli_real_escape_string($connection, $cost);
	}

	if(($instr = trim($_POST["class_instr"])) == ''){
		$_SESSION["errmsg"] = 5;
		header("Location: classentry.php");
	}
	else{
		$instr = mysqli_real_escape_string($connection, $instr);
	}

	//Add record to the class table
	$query = "INSERT INTO class(class_title, class_start, class_descr, 
		class_cost, class_instr) VALUES ('$title', '$start', '$descr', '$cost', '$instr')";
	$result = mysqli_query($connection, $query);
	if(!$result){
		echo "Insert into class failed. " . mysqli_error($connection);
		exit();
	}
	else{
		header("Location: classlist.php");
	}
?>