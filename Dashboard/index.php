<?php session_start();
	include('db-setup.php');

	//Set various session variables, will initially be set by login script
	$_SESSION["username"] 	= "dsokoler";
	$_SESSION["email"] 		= "daniel.sokoler@gmail.com";
?>
<!DOCTYPE html> 
<html lang="en-US">
	<head>
		<title>Dashboard</title>

		<meta charset="UTF-8">
		<meta name="author" 		content="Daniel Sokoler">
		<meta name="description" 	content="A Peer to Peer communications platform">
		<meta name="keywords" 		content="P2P, Peer to Peer, Peer, Communication">

		<link rel="stylesheet" type="text/css" href="dashboard.css">
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>
	<body>
		<!-- Basic JQuery Library -->
		<script type="text/javascript" src="jquery.js"></script>

		<!-- Basic Angular Library -->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular.min.js"></script>

		<!-- Bootstrap Javascript (Based on JQuery) -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
		<!-- JQuery UI Library for Dialog Boxes -->
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		<!-- Makes selecting div's change style -->
		<script type="text/javascript" src="div_click.js"></script>
		
		<!-- Allows the search bar to filter connections by input -->
		<script type="text/javascript" src="search-filter.js"></script>
		
		<!-- Allows the addition of connections through a dialog box -->
		<script type="text/javascript" src="button-add-connection.js"></script>
		
		<!-- The .validate JQuery plugin -->
		<script type="text/javascript" src="../jquery-validation-1.14.0/src/core.js"></script>
		<script type="text/javascript" src="../jquery-validation-1.14.0/src/additional/ipv4.js"></script>
		<script type="text/javascript" src="../jquery-validation-1.14.0/src/additional/ipv6.js"></script>

		<div class="page-header">
			<div class="row">
				<div class="col-md-2 logo even">
					<div class="col-md-6"></div>
					<div class="col-md-6">Fluid</div>
				</div>
				<div class="col-md-8 title">

				</div>
				<div class="col-md-2 user-info">
					<div class="col-md-6 user-options">

					</div>
					<!-- Will need to be obtained by server when login succeeds -->
					<div class="col-md-6 username">
						<div data-toggle="dropdown" class="dropdown-toggle" id="user-menu">
							<?php
								echo $_SESSION['username'];
							?>
							<span class="caret"></span>
						</div>
						<ul class="dropdown-menu" role="user-menu" aria-labelledby="user-menu">
							<li><a href='#'>Profile Information</a></li>
							<li><a href='#'>Change Password</a></li>
							<li class="divider" role="separator"></li>
							<li><a href='#'>Log Out</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2 conn-menu">
			<div class="row header odd">
				<div class="col-md-9">Connections</div>
				<div class="col-md-3 button-wrapper">
					<!-- Jquery dialog box open when button pressed? -->
					<button type="button" value="+" class="button center-block"></button>
					<div class="hidden" id="dialog" title="Add Connection">
						<form action="add-conn.php" method="post">
							<label for="connection">Connection Name: </label>
							<input type="text" id="connection" name="connection" autocomplete="off">
							<br>
							<label for="ipAddress">IP Address: </label>
							<input type="text" id="ipAddress" name="ipAddress" autocomplete="off">
							<br>
							<input id="btn-submit" name="btn-submit" type="submit" value="Add Connection"/>
						</form>
					</div>
				</div>
				<input class="searchform col-md-8 col-md-offset-2" type="text">
			</div>

			<!-- Need to be able to edit and delete connections -->
			<div class="item-container">
				<?php
					$html_string = '<div class="row item %s"id="item-%d">
										<div class="col-md-6 conn-name">%s</div>
										<div class="col-md-6 conn-ip">%s</div>
									</div>';
					$username = $_SESSION['username'];
					$sql = "SELECT `Conn-Name`, `IP-Address` FROM Connections WHERE `Username`='$username' ORDER BY `Conn-Name`";
					
					$result = $mysqli->query($sql);
					if ($result === false) {
						echo sprintf($html_string, "even", $number_of_results, "No", "Results");
					}
					else if ($result->num_rows > 0) {
						$result->data_seek(0);

						//0 = Even, 1 = Odd
						$even_or_odd = 0;
						$number_of_results = 1;
						while($row = $result->fetch_assoc()) {
							if ($even_or_odd == 0) {
					        	echo sprintf($html_string, "even", $number_of_results, $row['Conn-Name'], $row['IP-Address']);
					        	$even_or_odd = 1;
							}
							else {
								echo sprintf($html_string, "odd", $number_of_results, $row['Conn-Name'], $row['IP-Address']);
								$even_or_odd = 0;
							}
							$number_of_results++;
					    }
					}
				?>
			</div>
			<div class="row footer">
				
			</div>
		</div>
		<!-- This entire section needs to be refreshed using Ajax -->
		<div class="col-md-10 main-exterior">
			
		</div>

		<?php
			$mysqli->close();
		?>
	</body>
</html>