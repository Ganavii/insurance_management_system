<!DOCTYPE html>
<html>

<head>
    <style>
        .heading {
            margin-left: 5px;
            font-weight: 800;
            text-transform: uppercase;
        }

        input[type=submit]:hover {
            cursor: pointer;
            background-color: #97a607;
        }

        input[type=text],
        select {
            font-family: Georgia;
            width: 97%;
            padding: 12px 20px;
            margin: 10px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            font-family: Georgia;
            width: 97%;
            background-color: #8f9456;
            color: black;
            padding: 14px 20px;
            margin: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Payment</title>
</head>
<?php include 'header.php';
$uniqueId = mt_rand();
if (isset($_GET["client_id"])) {
    $client_id = $_GET["client_id"];
} else {
    $client_id = "";
}
?>

<h1 class="heading">Add Payment</h1>
<form action="insertPayment.php" method="post">

    Recipt No: <input type="text" name="recipt_no" value="<?php echo "$uniqueId"; ?>" required><br>
    Client Id: <input type="text" name="client_id" value="<?php echo "$client_id"; ?>" required><br>
    Month: <input type="text" name="month" required><br>
    Amount: <input type="text" name="amount" required><br>
    Due: <input type="text" name="due" required><br>
    Fine: <input type="text" name="fine" required><br>
    Agent Id: <input type="text" name="agent_id" value="<?php echo $_SESSION["username"]; ?>" required><br>

    <input type="submit">
</form>
</body>

</html>