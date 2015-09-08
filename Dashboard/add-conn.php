<?php session_start();

	include("db-setup.php");
	
	$username 	= mysqli_real_escape_string($mysqli, $_SESSION["username"]);
	$connName 	= mysqli_real_escape_string($mysqli, $_POST["connection"]);
	$ipAddress 	= mysqli_real_escape_string($mysqli, $_POST["ipAddress"]);
	$ipType 	= 0;

	$sql = "INSERT INTO Connections (`Username`, `Conn-Name`, `IP-Address`, `IP-Type`) VALUES ('$username', '$connName', '$ipAddress', $ipType)";

	$mysqli->query($sql) or die($mysqli->error);
	header("Refresh:0; url=http://192.168.79.128/HTML/Dashboard/index.php");
?>