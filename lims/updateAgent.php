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
    <title>Update Agent</title>
</head>

<?php include 'header.php';
?>
<h1 class="heading">Update Agent
    <button class="btn" text-align="center">
        <a href="addAgent.php" class="btn">Add Agent</a>
    </button>
</h1>

<?php
include 'connection.php';

$agent_id = $agent_password = $name = $branch = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $agent_id        = $_POST["agent_id"];
    $agent_password  = $_POST["agent_password"];
    $name            = $_POST["name"];
    $branch          = $_POST["branch"];
    $phone           = $_POST["phone"];
}

$sql = "UPDATE agent set name='$name' ,agent_password='$agent_password' ,branch='$branch' ,phone='$phone' where agent_id='$agent_id'";

if ($conn->query($sql) === true) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
</body>

</html>