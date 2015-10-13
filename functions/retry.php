<?php
	function retry(){
		$retry = $_SESSION["retry"];
		$retry++;
		if($retry > 3){
			// If greater than 3 go to register.
			header("Location: ../register.php");
		}
		else{
			//If less than 3 reset Session Retry and go to Sign in
			$_SESSION["retry"] = $retry;
			header("Location: ../signin.php");
		}
	}
?>