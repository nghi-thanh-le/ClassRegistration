<?php
	session_start();
	require("../functions/retry.php");
	//Connect to the ClassRegistration database
	require_once("../functions/database.php");
	$connection = connection();

	//Remove white space, check for blank and remove special characters
	$email = trim($_POST["user_email"]);
	$password = trim($_POST["user_password"]);

	if($email == ""){
		$_SESSION["errmsg"] = 1;
		retry();
		exit();
	}
	else{
		$user_email = mysqli_real_escape_string($connection, $email);
	}

	if($password == ""){
		$_SESSION["errmsg"] = 2;
		retry();
		exit();
	}
	else{
		$user_password = mysqli_real_escape_string($connection, $password);
	}

	//Encrrypt the password.
	$encryptpassword = sha1($user_password);
	
	//See if match in the administrator table
	$query = "SELECT admin_email, admin_password, admin_name 
	FROM administrator 
	WHERE admin_email = '$user_email' AND admin_password = '$encryptpassword'";
	$result = mysqli_query($connection, $query);
	if(!$result){
		echo "Select from administrator failed. " . mysqli_error($connection);
		exit();
	}
	
	// Verify if it's in table
	$admin_row = mysqli_fetch_object($result);
	if(isset($admin_row)){
		$db_admin_email = $admin_row->admin_email;
		$db_admin_password = $admin_row->admin_password;
		$db_admin_name = $admin_row->admin_name;

		if($db_admin_email != $user_email || $db_admin_password != $encryptpassword){
			retry();
		}else{
			//If on file, get name, reset the session, and enter site.
			$_SESSION["name"] = $db_admin_name;
			$_SESSION["retry"] = "admit";
			$_SESSION["time"] = time();
			header("Location: ../Maintenance/systementry.php");
		}
	}
	else{
		$query = "SELECT student_email, student_password, student_name 
		FROM student 
		WHERE student_email = '$user_email' AND student_password = '$encryptpassword'";
		$result = mysqli_query($connection, $query);
		if(!$result){
			echo "Select from student failed. " . mysqli_error($connection);
			exit();
		}

		$student_row = mysqli_fetch_object($result);
		if(isset($student_row)){
			$db_student_email = $student_row->student_email;
			$db_student_password = $student_row->student_password;
			$db_student_name = $student_row->student_name;
			
			if($db_student_email != $user_email || $db_student_password != $encryptpassword){
				retry();
			}
			else{
				$_SESSION["name"] = $db_student_name;
				$_SESSION["retry"] = "admit";
				$_SESSION["time"] = time();
				header("Location: ../student/classes.php");
			}
		}	
		else{
			header("Location: ../signin.php");
		}
	}
?>