<?php
	session_start();

	//Connect to the ClassRegistration database
	require_once("../functions/database.php");
	$connection = connection();

	//Remove white space, check for blank and remove special characters
	$name = trim($_POST["user_name"]);
	$email = trim($_POST["user_email"]);
	$passwd = trim($_POST["user_passwd"]);

	if($name == ""){
		$_SESSION["errmsg"] = 1;
		header("Location: ../register.php");
		exit();
	}
	else{
		$user_name = mysqli_real_escape_string($connection, $name);
	}

	if($email == ""){
		$_SESSION["errmsg"] = 2;
		header("Location: ../register.php");
		exit();
	}
	else{
		$user_email = mysqli_real_escape_string($connection, $email);
	}

	if($passwd == ""){
		$_SESSION["errmsg"] = 3;
		header("Location: ../register.php");
		exit();
	}
	else{
		$user_passwd = mysqli_real_escape_string($connection, $passwd);
	}

	//Set cookie, expire in 180 days
	$date = time();
	$expire = time() + (60 * 60 * 24 * 180);
	setcookie("User[name]", $user_name, $expire, "/");
	setcookie("User[date]", $date, $expire, "/");

	//Encrypt the password.
	$encryptpasswd = sha1($user_passwd);

	//See if match in the administrator table
	$query = "SELECT admin_email, admin_password, admin_name 
	FROM administrator
	WHERE admin_email = '$user_email' AND admin_password = '$encryptpasswd'";
	$result = mysqli_query($connection, $query);
	if(!$result){
		echo "SELECT from administrator failt. " . mysqli_error($connection);
		exit();
	}

	//Determine if the user ID and passwrod are on administrator table.
	$admin_row = mysqli_fetch_object($result);
	$db_admin_email = $admin_row->admin_email;
	$db_admin_password = $admin_row->admin_password;
	$db_admin_name = $admin_row->admin_name;

	//If not, register as student
	if($db_admin_email != $user_email || $db_admin_password != $user_passwd){
		// Register as student
		// Add record to the administrator table
		$query = "INSERT INTO student(student_email, student_password, student_name) 
		VALUES ('$user_email', '$encryptpasswd', '$user_name')";
		$result = mysqli_query($connection, $query);
		if(!$result){
			echo ("Insert to student failed.") . mysqli_error();
			exit();
		}
		//Return to userAuthen.php
		header("Location: userAuthen.php");
	}
	else{
		//If on file, get name, reset the session, and enter site.
		$_SESSION["name"] = $db_admin_name;
		$_SESSION["retry"] = "admit";
		$_SESSION["time"] = time();
		header("Location: ./Maintenance/systementry.php");
	}
?>