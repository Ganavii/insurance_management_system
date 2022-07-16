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
    <title>Insert Agent</title>
</head>
<?php
include 'connection.php';
include 'header.php';
?>

<h1 class="heading">Insert Agent
    <button class="btn" textalign="center">
        <a href="addAgent.php" class="btn">Add Agent</a>
    </button>
</h1>

<?php
$agent_id       = $_POST["agent_id"];
$agent_password = $_POST["agent_password"];
$name           = $_POST["name"];
$branch         = $_POST["branch"];
$phone          = $_POST["phone"];

$sql = "INSERT INTO agent " . "VALUES('$agent_id','$agent_password','$name', '$branch', '$phone')";

if (mysqli_query($conn, $sql) === true) {
    echo "New Agent ADDED";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

</body>

</html>