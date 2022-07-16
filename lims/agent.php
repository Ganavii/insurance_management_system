<!DOCTYPE html>

<html>

<head>
    <style>
        .heading {
            font-weight: 800;
            text-transform: uppercase;
        }

        .dis {
            pointer-events: none;
            color: black;
        }

        table {

            border-collapse: collapse;
            width: 95%;
            margin: 10px;
            font-size: 100%;
        }

        td,
        th {
            border: 1px solid grey;
            text-align: left;
            padding: 8px;
            text-decoration: none;
        }

        th {
            background-color: #8f9456;
            color: white;
            font-weight: lighter;
        }

        a {
            text-decoration: none;
        }

        .btn {
            background-color: #8f9456;
            color: white;
            float: right;
            text-decoration: none;
            margin-right: 5%;
            font-family: Georgia;
        }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agents</title>
</head>

<body>
    <?php include 'header.php';
    include 'connection.php';
    ?>
    <h1 class="heading">Agents Information
        <?php
        if ($_SESSION["username"] == "2001") {
            echo '<button class="btn" align="center">';
            echo '<a href="addAgent.php" class="btn">Add Agent</a>';
            echo '</button>';
        }
        ?>
    </h1>
    <?php
    $sql = "SELECT agent_id,agent_password,name,branch,phone FROM agent";
    $result = mysqli_query($conn, $sql);

    echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>AGENT ID</th>\n";
    echo "    <th>NAME</th>\n";
    echo "    <th>BRANCH</th>\n";
    echo "    <th>PHONE</th>\n";
    if ($_SESSION["username"] == "2001") {
        echo "    <th>PASSWORD</th>\n";
        echo "    <th>UPDATE</th>\n";
    }
    echo "  </tr>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>\n";
            echo "    <td>" . $row["agent_id"] . "</td>\n";
            echo "    <td>" . $row["name"] . "</td>\n";
            echo "    <td>" . $row["branch"] . "</td>\n";
            echo "    <td>" . $row["phone"] . "</td>\n";
            if ($_SESSION["username"] == "2001") {
                echo "    <td>" . $row["agent_password"] . "</td>\n";
                echo "    <td>" . "<a href='editAgent.php?agent_id=" . $row["agent_id"] . "'>Edit</a>" . "</td>\n";
            }
        }
        echo "</table>\n";
        echo "\n";
    }
    $conn->close();
    ?>
</body>

</html>