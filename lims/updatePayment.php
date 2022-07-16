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
    <title>Update Payment</title>
</head>
<?php include 'header.php';
?>
<h1 class="heading">Update Payment
    <button class="btn" text-align="center">
        <a href="addPayment.php" class="btn">Add Payment</a>
    </button>
</h1>


<?php
include 'connection.php';
$recipt_no = $client_id = $month = $amount = $due = $fine = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $recipt_no       = $_POST["recipt_no"];
    $client_id       = $_POST["client_id"];
    $month           = $_POST["month"];
    $amount          = $_POST["amount"];
    $due             = $_POST["due"];
    $fine            = $_POST["fine"];
    $agent_id        = $_POST["agent_id"];
}
$sql = "UPDATE payment set recipt_no='$recipt_no' ,client_id='$client_id' ,month='$month',amount='$amount',due='$due',fine='$fine', agent_id='$agent_id' where recipt_no='$recipt_no'";

if ($conn->query($sql) === true) {
    echo "New record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
</body>

</html>