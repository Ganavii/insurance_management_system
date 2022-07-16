<!DOCTYPE html>
<html>

<head>
    <style>
        form {

            margin: 5px;
        }

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
            width: 95%;
            padding: 12px 20px;
            margin: 10px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            font-family: Georgia;
            width: 95%;
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
    <title>Add Client</title>
</head>


<?php include 'header.php';
$uniqueId  = mt_rand(0, 100);
$uniqueId2 = mt_rand(0, 200);
?>

<h1 class="heading">Add Client</h1>

<form action="insertClient.php" method="post" enctype="multipart/form-data">
    Client ID: <input type="text" name="client_id" value="<?php echo "$uniqueId"; ?>" required><br>
    Client Password: <input type="text" name="client_password" required><br>
    Name: <input type="text" name="name" required><br>
    Gender: <input type="text" name="sex" required><br>
    Birth Date: <input type="text" name="birth_date" required><br>
    Phone: <input type="text" name="phone" required><br>
    Address: <input type="text" name="address" required><br>
    Policy ID: <input type="text" name="policy_id" required><br>
    Agent ID: <input type="text" name="agent_id" value="<?php echo $_SESSION["username"]; ?>" required><br>

    <h3 class="heading">Nominee Informations </h3>

    Nominee ID: <input type="text" name="nominee_id" value="<?php echo "$uniqueId2"; ?>" required> <br>
    Name: <input type="text" name="nominee_name" required><br>
    Gender: <input type="text" name="nominee_sex" required><br>
    Birth Date: <input type="text" name="nominee_birth_date" required><br>
    Relationship: <input type="text" name="nominee_relationship" required><br>
    Priority: <input type="text" name="priority" required><br>
    Phone: <input type="text" name="nominee_phone" required><br>
    <input type="submit">

</form>
</body>

</html>