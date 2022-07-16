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
    <title>Delete Payment</title>
</head>
<?php include 'header.php';
?>

<h1 class="heading">Payment Status
    <button class="btn" text-align="center">
        <a href="addPayment.php" class="btn">Add Payment</a>
    </button>
</h1>

<?php
include 'connection.php';
$recipt_no  = $_GET["recipt_no"];
// sql to delete a record
$sql = "DELETE FROM payment WHERE recipt_no='$recipt_no'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>
</body>

</html>