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
    <title>Insert Client</title>
</head>

<?php
include 'header.php';
include 'connection.php';
?>

<h1 class="heading">Insert Client
    <button class="btn" textalign="center">
        <a href="addclient.php" class="btn">Add Client</a>
    </button>
</h1>

<?php
$client_id       = $_POST["client_id"];
$client_password = $_POST["client_password"];
$name            = $_POST["name"];
$sex             = $_POST["sex"];
$birth_date      = $_POST["birth_date"];
$phone           = $_POST["phone"];
$address         = $_POST["address"];
$policy_id       = $_POST["policy_id"];
$agent_id        = $_POST["agent_id"];



$nominee_id              = $_POST["nominee_id"];
$nominee_name            = $_POST["nominee_name"];
$nominee_sex             = $_POST["nominee_sex"];
$nominee_birth_date      = $_POST["nominee_birth_date"];
$nominee_relationship    = $_POST["nominee_relationship"];
$priority                = $_POST["priority"];
$nominee_phone           = $_POST["nominee_phone"];

$sql = "INSERT INTO client " . "VALUES('$client_id', '$client_password', '$name', '$sex', '$birth_date',  '$phone', '$address', '$policy_id', '$agent_id')";
if (mysqli_query($conn, $sql) === true) {
    echo "New Client ADDED";
    echo '</br>';
    echo '</br>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo '</br>';
    echo '</br>';
}

$sql = "INSERT INTO nominee " . "VALUES('$nominee_id', '$client_id', '$nominee_name', '$nominee_sex', '$nominee_birth_date', '$nominee_relationship','$priority', '$nominee_phone')";
if (mysqli_query($conn, $sql) === true) {
    echo "New Nominee ADDED";
    echo '</br>';
    echo '</br>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo '</br>';
    echo '</br>';
}
?>
</body>

</html>