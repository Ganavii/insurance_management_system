<!DOCTYPE html>
<html>

<head>
	<style>
		.col-4 {
			background-color: #323329;
			border-radius: 20%;
			color: white;
			width: 20%;
			margin: 3%;
			padding: 3%;
			text-align: center;
			float: left;
		}

		.heading {
			font-weight: 800;
			text-transform: uppercase;
		}

		.searchBar {
			width: 95%;
			padding: 12px 20px;
			margin: 10px;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;

		}

		.search {
			border: 1px solid grey;
			width: 100%;
			height: 50px;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border-radius: 4px;
		}

		.searchBtn {
			border: 1px solid grey;
			width: 100%;
			height: 50px;
			box-sizing: border-box;
			border-radius: 4px;
			color: white;
			background-color: #323329;
			cursor: pointer;
		}
	</style>



	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Home</title>
</head>



<?php include 'header.php';
?>

<h1 class="heading">Home Page</h1>
<div class="searchBar">
	<form action="search.php" method="post">
		<input type="text" name="key" class="search"><br>
		<br>
		<input class="searchBtn" type="submit" value="SEARCH">
		</br>
	</form>
</div>

<br>
<br>

<div class="col-4">
	<h2>
		<?php
		$sql = "SELECT count(*) AS c FROM client";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			echo $row["c"];
			echo "<br>";
			echo "<br>";
			echo "Total clients ";
		}
		?>
	</h2>
</div>
<div class="col-4">
	<h2>
		<?php
		$sql = "SELECT count(*) AS c FROM payment";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			echo $row["c"];
			echo "<br>";
			echo "<br>";
			echo "Payment Records ";
		}
		?>
	</h2>
</div>

<div class="col-4">
	<h2>
		<?php
		$sql = "SELECT count(*) AS c FROM agent";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			echo $row["c"];
			echo "<br>";
			echo "<br>";
			echo "Total agents ";
		}
		?>

	</h2>
</div>

</body>

</html>