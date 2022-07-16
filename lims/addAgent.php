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
    <title>Add Agent</title>
</head>
<?php include 'header.php';
?>

<h1 class="heading">Add Agent</h1>
<form action="insertagent.php" method="post">
    Agent ID: <input type="text" name="agent_id" required><br>
    Agent Password: <input type="text" name="agent_password" required><br>
    Name: <input type="text" name="name" required><br>
    Branch: <input type="text" name="branch" required><br>
    Phone: <input type="text" name="phone" required><br>

    <input type="submit">
</form>
</body>

</html>