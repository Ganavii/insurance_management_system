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
    <title>Insert Payment</title>
</head>
<?php include 'header.php';
?>

<h1 class="heading">Insert Payment
    <button class="btn" textalign="center">
        <a href="addPayment.php" class="btn">Add Payment</a>
    </button>
</h1>

<?php
include 'connection.php';
$recipt_no      = $_POST["recipt_no"];
$client_id      = $_POST["client_id"];
$month          = $_POST["month"];
$amount         = $_POST["amount"];
$fine           = $_POST["fine"];
$due            = $_POST["due"];
$agent_id       = $_POST["agent_id"];
$sql = "INSERT INTO payment " . "VALUES('$recipt_no', '$client_id', '$month', '$amount', '$fine', '$due','$agent_id')";

if ($conn->query($sql) === true) {
    echo "New Payment ADDED";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

</body>

</html>