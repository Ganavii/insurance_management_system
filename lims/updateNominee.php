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
    <title>Update Nominee</title>
</head>

<?php include 'header.php';
?>
<!-- /. NAV SIDE  -->
<h1 class="heading">Update Nominee
    <button class="btn" text-align="center">
        <a href="addNominee.php" class="btn">Add Nominee</a>
    </button>
</h1>
<?php
include 'connection.php';
$nominee_id = $client_id = $name = $sex = $birth_date = $marital_status = $phone = $address = $other = $priority = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nominee_id      = $_POST["nominee_id"];
    $client_id       = $_POST["client_id"];
    $name            = $_POST["name"];
    $sex             = $_POST["sex"];
    $birth_date      = $_POST["birth_date"];
    $relationship    = $_POST["relationship"];
    $priority        = $_POST["priority"];
    $phone           = $_POST["phone"];
}
$sql = "UPDATE nominee set nominee_id='$nominee_id',client_id='$client_id', name='$name', sex='$sex', birth_date='$birth_date',relationship='$relationship', priority='$priority', phone='$phone' where nominee_id='$nominee_id'";

if ($conn->query($sql) === true) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
</body>

</html>