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
    <title>Delete Nominee</title>
</head>
<?php include 'header.php';
?>
<h1 class="heading">Nominee Status
    <button class="btn" text-align="center">
        <a href="addNominee.php" class="btn">Add Nominee</a>
    </button>
</h1>
<?php
include 'connection.php';
$nominee_id  = $_GET["nominee_id"];
// sql to delete a record
$sql = "DELETE FROM nominee WHERE nominee_id='$nominee_id'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>
</body>

</html>