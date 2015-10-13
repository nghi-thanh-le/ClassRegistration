<?php
	session_start();
	//Check to see if session retry is "admit."
	if (isset($_SESSION["retry"])&& $_SESSION["retry"] == "admit") {
		//If so, continue.
		$name = $_SESSION["name"];
	}
	else {
		switch($title){
      	case "Class Entry":
      	case "Class Update":
      	case "Class Delete":
      	case "Class Register":
      	case "Class Confirm":
        $string = "../../";
        break;
      	case "Class List":
      	case "System Entry":	
        $string = "../";
        break;
    	}
    	$destination = $string . "validation/userAuthen.php";
		header( "Location: $destination");
	}

?>
