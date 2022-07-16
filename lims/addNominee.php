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
            width: 100%;
            padding: 12px 20px;
            margin: 10px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            font-family: Georgia;
            width: 100%;
            background-color: #8f9456;
            color: black;
            padding: 14px 20px;
            margin: 8px 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Nominee</title>
</head>
<?php
include 'header.php';
$uniqueId2 = mt_rand(0, 200);

if (isset($_GET["client_id"])) {
    $client_id = $_GET["client_id"];
} else {
    $client_id = "";
}
?>
<h1 class="heading">Add Nominee</h1>
<form action="insertNominee.php" method="post">

    Nominee ID: <input type="text" name="nominee_id" value="<?php echo "$uniqueId2"; ?>" required><br>
    Client ID: <input type="text" name="client_id" value="<?php echo "$client_id"; ?>" required><br>
    Name: <input type="text" name="name" required><br>
    GENDER: <input type="text" name="sex" required><br>
    Birth Date: <input type="text" name="birth_date" required><br>
    Relationship: <input type="text" name="relationship" required><br>
    Priority: <input type="text" name="priority" required><br>
    Phone: <input type="text" name="phone" required><br>

    <input type="submit">
</form>

</body>

</html>