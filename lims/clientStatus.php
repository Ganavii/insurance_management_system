<!DOCTYPE html>
<html>

<head>
	<style>
		input[type=text],
		select {
			font-family: Georgia;
			width: 100%;
			padding: 8px 12px;
			margin: 1px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 2px;
			box-sizing: border-box;

		}

		input[type=submit]:hover {
			background-color: #45a049;
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

		.dis {
			pointer-events: none;
			cursor: default;
			color: black;
		}

		a {
			text-decoration: none;
		}
	</style>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Client's Status</title>
</head>

<?php include 'header.php';
$username = $_SESSION["username"];
?>
<h1 class="heading">Client's Status</h1>
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

	$client_id = $_GET["client_id"];
}
//   PRINTS CLIENT's info
$sql = "SELECT * from client where client_id='$client_id'";
$result = mysqli_query($conn, $sql);
$policy_id = "";
$agent_id = "";

?>

<?php
while ($row = $result->fetch_assoc()) {
	echo "<label for=\"fname\">CLIENT ID</label>";
	echo "<input disabled type=\"text\" client_id=\"fname\" name=\"client_id\" placeholder=\"clients id..\" value=\"$row[client_id]\">";
	echo "<label for=\"fname\">CLIENT PASSWORD</label>";
	echo "<input disabled type=\"text\" client_id=\"fname\" name=\"client_password\" placeholder=\"client password..\" value=\"$row[client_password]\">";
	echo "<label for=\"fname\">NAME</label>";
	echo "<input disabled type=\"text\" client_id=\"fname\" name=\"name\" placeholder=\"clients Name..\" value=\"$row[name]\">";
	echo "<label for=\"fname\">GENDER</label>";
	echo "<input disabled type=\"text\" client_id=\"fname\" name=\"sex\" placeholder=\"clients gender..\" value=\"$row[sex]\">";
	echo "<label for=\"fname\">BIRTH DATE</label>";
	echo "<input disabled type=\"text\" client_id=\"fname\" name=\"birth_date\" placeholder=\"clients Birth Date..\" value=\"$row[birth_date]\">";
	echo "<label for=\"fname\">PHONE</label>";
	echo "<input disabled type=\"text\" client_id=\"fname\" name=\"phone\" placeholder=\"clients Phone..\" value=\"$row[phone]\">";
	echo "<label for=\"fname\">ADDRESS</label>";
	echo "<input disabled type=\"text\" client_id=\"fname\" name=\"address\" placeholder=\"clients Address..\" value=\"$row[address]\">";
	echo "<label for=\"fname\">POLICY ID</label>";
	echo "<input disabled type=\"text\" client_id=\"fname\" name=\"policy_id\" placeholder=\"policy id..\" value=\"$row[policy_id]\">";
	$policy_id = $row["policy_id"];
	$c_id      = $row["client_id"];
	$a_id  = $row["agent_id"];
	$agent_id = $row["agent_id"];

	if ($agent_id == $username || "2001" == $username) {
		echo "<td>" . "<a href='editClient.php?client_id=" . $c_id . "'>Edit Client</a>\n" . "</td>\n";
	}
}
echo "<br>\n";

echo "<br>\n";

// PRINTS policy info

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
echo "  </tr>\n";


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
		echo "  </tr>";
	}
}


echo '</div>';


echo "<br>\n";
echo "<br>\n";
echo '<b>POLICY</b>';	            //   PRINTS AGEENTS INFO
$sql = "SELECT * FROM agent where agent_id='$a_id'";
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
		echo "  </tr>";
	}
}

echo "</br>\n";
echo "</br>\n";
echo '<b>AGENT</b>';
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
echo "    <th>UPDATE</th>\n";


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


		if ($agent_id == $username || "2001" == $username) {
			echo "<td>" . "<a href='editNominee.php?nominee_id=" . $row["nominee_id"] . "'>Edit</a>" . "</td>\n";
		} else {
			echo "<td>" . "<a class=\"dis\" href='editNominee.php?nominee_id=" . $row["nominee_id"] . "'>Edit</a>" . "</td>\n";
		}

		echo "  </tr>";
	}
}

echo "</br>\n";
echo "</br>\n";
echo '<b>NOMINEE</b>';
echo '&nbsp';
echo '&nbsp';
echo '&nbsp';

if ($agent_id == $username || "2001" == $username) {
	echo "<a href='addNominee.php?client_id=" . $c_id . "'>Add Nominee</a>";
}


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
echo "    <th>UPDATE</th>\n";
echo "  </tr>";
echo "<br>\n";

echo '<b>PAYMENTS</b>';
echo '&nbsp';
echo '&nbsp';
echo '&nbsp';
if ($agent_id == $username || "2001" == $username) {
	echo "<a href='addPayment.php?client_id=" . $c_id . "'>Add Payment</a>";
}




if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {

		echo "<tr>\n";
		echo "    <td>" . $row["recipt_no"] . "</td>\n";
		echo "    <td>" . $row["client_id"] . "</td>\n";
		echo "    <td>" . $row["month"] . "</td>\n";
		echo "    <td>" . $row["amount"] . "</td>\n";
		echo "    <td>" . $row["due"] . "</td>\n";
		echo "    <td>" . $row["fine"] . "</td>\n";

		if ($row["agent_id"] == $username || "2001" == $username) {
			echo "<td>" . "<a href='editPayment.php?recipt_no=" . $row["recipt_no"] . "'>Edit</a>" . "</td>\n";
		} else {
			echo "<td>" . "<a class=\"dis\" href='editPayment.php?recipt_no=" . $row["recipt_no"] . "'>Edit</a>" . "</td>\n";
		}
		echo "  </tr>";
	}
}

echo "</table>\n";

if ($agent_id == $username || "2001" == $username) {
	echo "<td>" . "<a href='deleteClient.php?client_id=" . $client_id . "'>Delete Client</a>" . "</td>\n";
}
echo "\n";
?>


</body>

</html>