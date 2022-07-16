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
            margin: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            cursor: pointer;
            background-color: #97a607;
        }

        a {
            text-decoration: none;
        }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Nominee</title>
</head>

<body>
    <?php include 'header.php';
    ?>

    <h1 class="heading">Nominee Information
        <button class="btn" textalign="center">
            <a href="addNominee.php" class="btn">Add Nominee</a>
        </button>
    </h1>
    <?php

    include 'connection.php';


    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $nominee_id = $_GET["nominee_id"];
    }

    $sql = "SELECT * from nominee where nominee_id='$nominee_id'";
    $result = $conn->query($sql);

    echo "<div>\n";

    echo '<form action="updateNominee.php" method="post">';

    while ($row = $result->fetch_assoc()) {

        echo "<label for=\"fname\">NOMINEE ID</label>";
        echo "<input type=\"text\" nominee_id=\"fname\" name=\"nominee_id\" placeholder=\"nominee id..\" value=\"$row[nominee_id]\">";
        echo "<label for=\"fname\">CLIENT ID</label>";
        echo "<input type=\"text\" nominee_id=\"fname\" name=\"client_id\" placeholder=\"client id..\" value=\"$row[client_id]\">";
        echo "<label for=\"fname\">NAME</label>";
        echo "<input type=\"text\" nominee_id=\"fname\" name=\"name\" placeholder=\"nominees Name..\" value=\"$row[name]\">";
        echo "<label for=\"fname\">GENDER</label>";
        echo "<input type=\"text\" nominee_id=\"fname\" name=\"sex\" placeholder=\"nominees gender..\" value=\"$row[sex]\">";
        echo "<label for=\"fname\">BIRTH DATE</label>";
        echo "<input type=\"text\" nominee_id=\"fname\" name=\"birth_date\" placeholder=\"nominees Birth Date..\" value=\"$row[birth_date]\">";
        echo "<label for=\"fname\">RELATIONSHIP</label>";
        echo "<input type=\"text\" nominee_id=\"fname\" name=\"relationship\" placeholder=\"Relationship With Client..\" value=\"$row[relationship]\">";
        echo "<label for=\"fname\">PRIORITY</label>";
        echo "<input type=\"text\" nominee_id=\"fname\" name=\"priority\" placeholder=\"Priority..\" value=\"$row[priority]\">";
        echo "<label for=\"fname\">PHONE</label>";
        echo "<input type=\"text\" nominee_id=\"fname\" name=\"phone\" placeholder=\"nominees Phone..\" value=\"$row[phone]\">";
    }
    echo "<input type=\"submit\" value=\"UPDATE\">";
    echo "</form>\n";
    echo "<a href='deleteNominee.php?nominee_id=" . $nominee_id . "'>Delete Nominee</a>";
    echo "</div>\n";
    echo "\n";
    ?>
</body>

</html>