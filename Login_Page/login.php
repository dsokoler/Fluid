<? php
	session_start();
	include("db-setup.php");

	$username 	= $_POST['username'];
	$password 	= $_POST['password'];

	$sql 		= "SELECT * FROM Users Where `Username`='$username' AND `Password`='$password'";
	$result 	= $mysqli->query($sql);
	$numrows 	= $result->num_rows;

	if ($numrows == 1) {
		while($rows = $mysqli->fetch_assoc($result)) {
			$_SESSION["username"] 	= $row["Username"];
			$_SESSION["email"]		= $row["Email"];
		}
		header("Location: ../Dashboard/index.php");
	}
	else {
		header("Location: index.html");
	}
?>