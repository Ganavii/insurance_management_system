<!DOCTYPE html>

<html>

<head>
    <style>
        input[type=text],
        select {
            width: 100%;
            padding: 10px 13px;
            margin: 3px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .btn {
            background-color: #4CAF50;
            float: right;
            color: white;
            text-decoration: none;
        }


        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

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
    <title>Edit Agent</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>

    <h1 class="heading">Agents Information
        <button class="btn" textalign="center">
            <a href="addclient.php" class="btn">Add Agent</a>
        </button>
    </h1>

    <?php
    include 'connection.php';
    $id = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $agent_id = $_GET["agent_id"];
    }
    $sql = "SELECT agent_id, agent_password, name, branch, phone from agent where agent_id='$agent_id'";
    $result = $conn->query($sql);
    echo "<div>\n";
    echo '<form action="updateAgent.php" method="post">';
    echo "<label for=\"fname\">AGENT ID</label>";
    echo "<input type=\"text\" value=\"$agent_id\"name=\"agent_id\"/>" . "</br>";
    while ($row = $result->fetch_assoc()) {
        echo "<label for=\"fname\">PASSWORD</label>";
        echo "<input type=\"text\" agent_id=\"fname\" name=\"agent_password\" placeholder=\"password..\" value=\"$row[agent_password]\">";
        echo "<label for=\"fname\">NAME</label>";
        echo "<input type=\"text\" agent_id=\"fname\" name=\"name\" placeholder=\"Your Name..\" value=\"$row[name]\">";
        echo "<label for=\"fname\">BRANCH</label>";
        echo "<input type=\"text\" agent_id=\"fname\" name=\"branch\" placeholder=\"Your Branch..\" value=\"$row[branch]\">";
        echo "<label for=\"fname\">PHONE</label>";
        echo "<input type=\"text\" agent_id=\"fname\" name=\"phone\" placeholder=\"Your Phone..\" value=\"$row[phone]\">";
    }
    echo "<input type=\"submit\" value=\"UPDATE\">";
    echo "</form>\n";
    echo "<a href='deleteAgent.php?agent_id=" . $agent_id . "'>Delete Agent</a>";
    echo "</div>\n";
    echo "\n";
    ?>
</body>

</html>