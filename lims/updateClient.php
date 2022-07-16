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
			border-radius: 5px;
		}
	</style>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Update Client</title>
</head>
<?php include 'header.php';
?>

<h1 class="heading">Update Client
	<button class="btn" text-align="center">
		<a href="addclient.php" class="btn">Add Client</a>
	</button>
</h1>

<?php
$client_id = $client_password = $name = $sex = $birth_date = $phone = $address = $policy_id = $agent_id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$client_id       = $_POST["client_id"];
	$client_password = $_POST["client_password"];
	$name            = $_POST["name"];
	$sex             = $_POST["sex"];
	$birth_date      = $_POST["birth_date"];
	$phone           = $_POST["phone"];
	$address         = $_POST["address"];
	$policy_id       = $_POST["policy_id"];
	$agent_id        = $_POST["agent_id"];

	if (isset($_POST['submit'])) {
		$sql = "UPDATE client set client_id='$client_id' ,client_password='$client_password', name='$name' ,sex='$sex',birth_date='$birth_date',phone='$phone',address='$address',policy_id='$policy_id',agent_id='$agent_id' where client_id='$client_id'";

		if ($conn->query($sql) === true) {
			echo "Client record updated successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {

		$sql = "UPDATE client set client_id='$client_id' ,client_password='$client_password' ,name='$name' ,sex='$sex',birth_date='$birth_date',marital_status='$marital_status',nid='$nid',phone='$phone',address='$address',policy_id='$policy_id',agent_id='$agent_id' where client_id='$client_id'";

		if ($conn->query($sql) === true) {
			echo "Client record updated successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}



?>




</div>


</div>
<!-- /. PAGE WRAPPER  -->



</div>
<!-- /. WRAPPER  -->





</body>

</html>