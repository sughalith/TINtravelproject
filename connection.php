<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db 	= "travel";
	
	$conn = new mysqli ($dbhost,$dbuser,$dbpass,$db);
	
	if($conn->connect_error){
		echo "Connection was failed";
	}
	
	else{
		
		echo "Connection made";
		
	}
?>