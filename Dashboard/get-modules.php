<? php
	include('db-setup.php');

	$username = $_SESSION['username'];

	//NEED TO ADD IP-ADDRESS FILTER
	$sql = "SELECT `Module-Name`, `Description` FROM Modules WHERE `Username`='$username' ORDER BY `Module-Name`";
	$result = $mysqli->query($sql);
	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($outp != "") {
			$outp .= ",";
		}
		$outp .= '{"Module-Name":"' . $rs["Module-Name"] . '",';
		$outp .= '"Description":"' . $rs["Description"] . '"}'; 
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();

	echo($outp);
?>