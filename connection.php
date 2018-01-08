<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db 	= "travel";
	$dbport = ":8889";
	
	$conn = new mysqli ($dbhost,$dbuser,$dbpass,$db, $dbport);
	
	if($conn->connect_error){
		echo "Connection was failed";
	}
	
	else{
		
		echo "Connection made";
		
	}
?>