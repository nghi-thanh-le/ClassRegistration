<?php
	// Connect to the ClassRegistration database
	require_once("../functions/database.php");
	$connection = connection();

	$classid = $_GET["recordID"];

	$query = "DELETE FROM class WHERE class_id='$classid'";
	$result = mysqli_query($connection, $query);
	if(!$result){
		echo "Cannot delete row in table. " . mysqli_error($connection);
		exit();
	}

	header("Location: classlist.php");
?>