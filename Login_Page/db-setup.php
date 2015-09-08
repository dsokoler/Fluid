<?php
	define('DBHOST', 'localhost');
	define('DBUSER', 'dsokoler');
	define('DBPASS', '');
	define('DBNAME', 'merandex_djsP2P');
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
	//Ensure we have actually connected to the database
	if (mysqli_connect_errno()) {
    	printf("Connect failed: %s\n", mysqli_connect_error());
    	exit();
	}

	//Check if we have actually set the charset
	if (!$mysqli->set_charset("utf8")) {
		printf("Error loading character set utf8: %s\n", $mysqli->error);
		exit();
	}
?>