<!DOCTYPE html>
<html>

<head>
	<?php
	session_start();
	include 'connection.php';

	$username = $_SESSION["username"];
	?>
	<style>
		.logout {
			text-decoration: none;
			margin: 90%;
			border: 2px solid black;
			padding: 5px;
			border-radius: 10px;
			color: white;
			background-color: #8f9456;
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
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		table {
			border-collapse: collapse;
			width: 95%;
			margin: 10px;
			font-size: 100%;
		}

		td,
		th {
			border: 1px solid grey;
			text-align: left;
			padding: 8px;
			text-decoration: none;
		}

		th {
			background-color: #8f9456;
			color: white;
			font-weight: lighter;
		}

		.heading {
			margin-left: 5px;
			font-weight: 800;
			text-transform: uppercase;
		}
	</style>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Client's Status</title>
</head>

<body style="background-color: #f6f9d9; font-family: Georgia;">
	<br>
	<?php
	echo "Welcome,  " . $_SESSION["username"];
	?>
	<a href="<?php echo "logout.php" ?>" class="logout" title="Logout">LOGOUT</a>
	<h1 class="heading">Client's Status</h1>



	<?php
	$client_id = $_SESSION["username"];
	$sql = "SELECT * from client where client_id='$client_id'";
	$result = mysqli_query($conn, $sql);
	$policy_id = "";

	while ($row = $result->fetch_assoc()) {
		echo "<label for=\"fname\">CLIENT ID</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"client_id\" placeholder=\"Your id..\" value=\"$row[client_id]\">";
		echo "<label for=\"fname\">NAME</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"name\" placeholder=\"Your Name..\" value=\"$row[name]\">";
		echo "<label for=\"fname\">GENDER</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"sex\" placeholder=\"Your Gender..\" value=\"$row[sex]\">";
		echo "<label for=\"fname\">BIRTH DATE</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"birth_date\" placeholder=\"Your Birth Date..\" value=\"$row[birth_date]\">";
		echo "<label for=\"fname\">PHONE</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"phone\" placeholder=\"Your Phone..\" value=\"$row[phone]\">";
		echo "<label for=\"fname\">ADDRESS</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"address\" placeholder=\"Your Address..\" value=\"$row[address]\">";
		echo "<label for=\"fname\">POLICY ID</label>";
		echo "<input disabled type=\"text\" client_id=\"fname\" name=\"policy_id\" placeholder=\"policy id..\" value=\"$row[policy_id]\">";
		$policy_id = $row["policy_id"];
		$c_id      = $row["client_id"];
		$agent_id  = $row["agent_id"];
	}
	echo "<br>\n";
	echo "<br>\n";
	$sql = "SELECT policy_id,term,health_status,system,payment_method,coverage, age_limit FROM policy where policy_id ='$policy_id'";
	$result = mysqli_query($conn, $sql);

	echo "<table class=\"table\">\n";
	echo "  <tr>\n";
	echo "    <th>POLICY ID</th>\n";
	echo "    <th>TERM</th>\n";
	echo "    <th>TOTAL AMOUNT</th>\n";
	echo "    <th>PER MONTH</th>\n";
	echo "    <th>PAYMENT METHOD</th>\n";
	echo "    <th>COVERAGE</th>\n";
	echo "    <th>AGE LIMIT</th>\n";
	echo "  </tr>";

	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {

			echo "<tr>\n";
			echo "    <td>" . $row["policy_id"] . "</td>\n";
			echo "    <td>" . $row["term"] . "</td>\n";
			echo "    <td>" . $row["health_status"] . "</td>\n";
			echo "    <td>" . $row["system"] . "</td>\n";
			echo "    <td>" . $row["payment_method"] . "</td>\n";
			echo "    <td>" . $row["coverage"] . "</td>\n";
			echo "    <td>" . $row["age_limit"] . "</td>\n";
		}
	}
	?>
	</div>
	<?php

	echo "<br>\n";
	echo '<b>Policy Information</b>';
	//   PRINTS AGEENTS INFO
	$sql = "SELECT agent_id, name ,branch, phone FROM agent where agent_id='$agent_id'";
	$result = mysqli_query($conn, $sql);

	echo "<table class=\"table\">\n";
	echo "  <tr>\n";
	echo "    <th>AGENT ID</th>\n";
	echo "    <th>NAME</th>\n";
	echo "    <th>BRANCH</th>\n";
	echo "    <th>PHONE</th>\n";
	echo "  </tr>";

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {

			echo "<tr>\n";
			echo "    <td>" . $row["agent_id"] . "</td>\n";
			echo "    <td>" . $row["name"] . "</td>\n";
			echo "    <td>" . $row["branch"] . "</td>\n";
			echo "    <td>" . $row["phone"] . "</td>\n";
		}
	}

	echo "<br>\n";
	echo "<br>\n";
	echo '<b>Agent Information</b>';
	// prints nominee infos 
	$sql = "SELECT * FROM nominee where client_id='$c_id'";
	$result = mysqli_query($conn, $sql);

	echo "<table class=\"table\">\n";
	echo "  <tr>\n";
	echo "    <th>NAME</th>\n";
	echo "    <th>GENDER</th>\n";
	echo "    <th>BIRTH DATE</th>\n";
	echo "    <th>RELATIONSHIP</th>\n";
	echo "    <th>PRIORITY</th>\n";
	echo "    <th>PHONE</th>\n";
	echo "  </tr>";

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {

			echo "<tr>\n";
			echo "    <td>" . $row["name"] . "</td>\n";
			echo "    <td>" . $row["sex"] . "</td>\n";
			echo "    <td>" . $row["birth_date"] . "</td>\n";
			echo "    <td>" . $row["relationship"] . "</td>\n";
			echo "    <td>" . $row["priority"] . "</td>\n";
			echo "    <td>" . $row["phone"] . "</td>\n";
			$nominee_id = $row["nominee_id"];
		}
	}
	echo "<br>\n";
	echo "<br>\n";
	echo '<b>Nominees</b>';
	//prints payments 
	$sql = "SELECT * FROM payment where client_id='$c_id'";
	$result = mysqli_query($conn, $sql);

	echo "<table class=\"table\">\n";
	echo "  <tr>\n";
	echo "    <th>RECIPT NO</th>\n";
	echo "    <th>CLIENT ID</th>\n";
	echo "    <th>MONTH</th>\n";
	echo "    <th>AMOUNT</th>\n";
	echo "    <th>DUE</th>\n";
	echo "    <th>FINE</th>\n";
	echo "  </tr>";

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {

			echo "<tr>\n";
			echo "    <td>" . $row["recipt_no"] . "</td>\n";
			echo "    <td>" . $row["client_id"] . "</td>\n";
			echo "    <td>" . $row["month"] . "</td>\n";
			echo "    <td>" . $row["amount"] . "</td>\n";
			echo "    <td>" . $row["due"] . "</td>\n";
			echo "    <td>" . $row["fine"] . "</td>\n";
		}
	}
	echo "<br>\n";
	echo "<br>\n";
	echo '<b>Payments</b>';
	echo "</table>\n";
	echo "\n";
	$conn->close();
	?>
</body>

</html>