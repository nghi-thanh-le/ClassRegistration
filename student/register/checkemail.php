<?php
	//Connecto to database
	require_once("../../functions/database.php");
	$connection = connection();

	//Remove white space, check for blank, and remove special characters
	if($classid = trim($_POST["classid"]) == ''){
		echo "A blank class ID was found";
		exit();
	}
	else{
		$classid = mysqli_real_escape_string($connection, $classid);
	}

	if($email = trim($_POST["email"]) == ''){
		echo "A blank email was found";
		exit();
	}
	else{
		$email = mysqli_real_escape_string($connection, $email);
	}

	$query = "SELECT student_email FROM student WHERE student_email='$email'";
	$result = mysqli_query($connection, $query);
	if(!$result){
		echo "Select from student failed. " . mysqli_error($connection);
		exit();
	}

	$row = mysqli_fetch_object($result);
	if(isset($row)){
		$db_email = $row->student_email;
		if($db_email != $email){
			header("Location: classregister.php?classid=$classid");
		}
		else{
			header("Location: stuconfirm.php");
		}
	}else{
		header("Location: error.php");
	}
?>