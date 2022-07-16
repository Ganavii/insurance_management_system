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
    <title>Delete Client</title>
</head>

<?php include 'header.php';
?>

<h1 class="heading">Client Status
    <button class="btn" textalign="center">
        <a href="addclient.php" class="btn">Add Client</a>
    </button>
</h1>


<?php
$client_id  = $_GET["client_id"];
// sql to delete client
$sql = "DELETE FROM client WHERE client_id='$client_id'";

if ($conn->query($sql) === TRUE) {
    echo "Client deleted successfully";
    echo '</br>';
} else {
    echo "Error deleting Client: " . $conn->error;
    echo '</br>';
}

// sql to delete nominees
$sql = "DELETE FROM nominee WHERE client_id='$client_id'";

if ($conn->query($sql) === TRUE) {
    echo "Nominees deleted successfully";
    echo '</br>';
} else {
    echo "Error deleting Nominees: " . $conn->error;
    echo '</br>';
}

// sql to delete payments
$sql = "DELETE FROM payment WHERE client_id='$client_id'";

if ($conn->query($sql) === TRUE) {
    echo "Payments deleted successfully";
    echo '</br>';
} else {
    echo "Error deleting Payments: " . $conn->error;
    echo '</br>';
}
$conn->close();
?>
</body>

</html>