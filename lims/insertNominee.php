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
    <title>Insert Nominee</title>
</head>
<?php include 'header.php';
?>
<h1 class="heading">Insert Nominee
    <button class="btn" textalign="center">
        <a href="addNominee.php" class="btn">Add Nominee</a>
    </button>
</h1>

<?php

include 'connection.php';

$nominee_id      = $_POST["nominee_id"];
$client_id       = $_POST["client_id"];
$name            = $_POST["name"];
$sex             = $_POST["sex"];
$birth_date      = $_POST["birth_date"];
$relationship    = $_POST["relationship"];
$priority        = $_POST["priority"];
$phone           = $_POST["phone"];



$sql = "INSERT INTO nominee " . "VALUES('$nominee_id', '$client_id', '$name', '$sex', '$birth_date', '$relationship', '$priority', '$phone')";

if ($conn->query($sql) === true) {
    echo "New Nominee ADDED";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

</body>

</html>