<?php
	function connection(){
		$connect = mysqli_connect("localhost", "root", "", "classregistration");
		if(!$connect){
			echo "Cannot connect to MySQL. " . mysqli_connect_error();
			exit();
		}
		return $connect;
	}