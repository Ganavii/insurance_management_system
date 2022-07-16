<!DOCTYPE html>

<html>

<head>
	<style>
		.heading {
			font-weight: 800;
			text-transform: uppercase;
		}

		.btn {
			background-color: #8f9456;
			color: white;
			float: right;
			text-decoration: none;
			margin-right: 5%;
			font-family: Georgia;
		}

		input[type=text],
		select {
			font-family: Georgia;
			width: 95%;
			padding: 12px 20px;
			margin: 10px;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type=submit] {
			font-family: Georgia;
			width: 95%;
			background-color: #8f9456;
			color: black;
			padding: 14px 20px;
			margin: 10px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type=submit]:hover {
			cursor: pointer;
			background-color: #97a607;
		}

		a {
			text-decoration: none;
		}
	</style>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Edit Client</title>
</head>

<body>
	<?php include 'header.php';
	?>

	<h1 class="heading">Clients Information
		<button class="btn" textalign="center">
			<a href="addclient.php" class="btn">Add Client</a>
		</button>
	</h1>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET") {

		$client_id = $_GET["client_id"];
	}
	//checking if agent is authorized to edit or not  
	$temp_id = "";
	$master_id = "2001";
	$sql = "SELECT agent_id from client where client_id='$client_id'";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		$temp_id = $row['agent_id'];
	}

	if ($_SESSION["username"] == ($temp_id || $master_id)) {
		$sql = "SELECT * from client where client_id='$client_id'";
		$result = $conn->query($sql);
		echo "<div>\n";
		while ($row = $result->fetch_assoc()) {
	?>

			<form action="updateClient.php" method="post" enctype="multipart/form-data">
				<?php
				echo "<label for=\"fname\">CLIENT ID</label>";
				echo "<input type=\"text\" client_id=\"fname\" name=\"client_id\" placeholder=\"clients id..\" value=\"$row[client_id]\">";
				echo "<label for=\"fname\">CLIENT PASSWORD</label>";
				echo "<input type=\"text\" client_id=\"fname\" name=\"client_password\" placeholder=\"clients password..\" value=\"$row[client_password]\">";
				echo "<label for=\"fname\">NAME</label>";
				echo "<input type=\"text\" client_id=\"fname\" name=\"name\" placeholder=\"clients name..\" value=\"$row[name]\">";
				echo "<label for=\"fname\">GENDER</label>";
				echo "<input type=\"text\" client_id=\"fname\" name=\"sex\" placeholder=\"clients gender..\" value=\"$row[sex]\">";
				echo "<label for=\"fname\">BIRTH DATE</label>";
				echo "<input type=\"text\" client_id=\"fname\" name=\"birth_date\" placeholder=\"clients Birth Date..\" value=\"$row[birth_date]\">";
				echo "<label for=\"fname\">PHONE</label>";
				echo "<input type=\"text\" client_id=\"fname\" name=\"phone\" placeholder=\"clients Phone..\" value=\"$row[phone]\">";
				echo "<label for=\"fname\">ADDRESS</label>";
				echo "<input type=\"text\" client_id=\"fname\" name=\"address\" placeholder=\"clients Address..\" value=\"$row[address]\">";
				echo "<label for=\"fname\">POLICY ID</label>";
				echo "<input type=\"text\" client_id=\"fname\" name=\"policy_id\" placeholder=\"policy id..\" value=\"$row[policy_id]\">";
				echo "<label for=\"fname\">AGENT ID</label>";
				echo "<input type=\"text\" client_id=\"fname\" name=\"agent_id\" placeholder=\"agent id..\" value=\"$row[agent_id]\">";
				?>
				<input type="submit" value="UPDATE" name="submit">
			</form>
	<?php
			echo "<a href='deleteClient.php?client_id=" . $client_id . "'>Delete Client</a>";
			echo "</div>\n";
			echo "\n";
		}
	} else {
		echo "you are not authorized to edit this client";
	}
	?>
</body>

</html>