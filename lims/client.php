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
    <title>Clients</title>

</head>

<body>
    <?php include 'header.php';
    ?>
    <h1 class="heading">Clients Information
        <button class="btn" textalign="center">
            <a href="addClient.php" class="btn">Add Client</a>
        </button>
    </h1>

    <?php
    $sql = "SELECT client_id,name,birth_date,phone,address,agent_id FROM client";
    $result = $conn->query($sql);

    echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>CLIENT ID</th>\n";
    echo "    <th>NAME</th>\n";
    echo "    <th>Birth Date</th>\n";
    echo "    <th>PHONE</th>\n";
    echo "    <th>ADDRESS</th>\n";
    echo "    <th>STATUS</th>\n";
    echo "    <th>UPDATE</th>\n";
    echo "  </tr>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>\n";
            echo "    <td>" . $row["client_id"] . "</td>\n";
            echo "    <td>" . $row["name"] . "</td>\n";
            echo "    <td>" . $row["birth_date"] . "</td>\n";
            echo "    <td>" . $row["phone"] . "</td>\n";
            echo "    <td>" . $row["address"] . "</td>\n";
            echo "    <td>" . "<a href='clientStatus.php?client_id=" . $row["client_id"] . "'>Client Status</a>" . "</td>\n";
            if ($row["agent_id"] == $username || "2001" == $username) {
                echo "<td>" . "<a href='editClient.php?client_id=" . $row["client_id"] . "'>Edit</a>" . "</td>\n";
            } else {
                echo "<td>" . "<a class=\"dis\" href='editClient.php?client_id=" . $row["client_id"] . "'>Edit</a>" . "</td>\n";
            }
        }
    }
    ?>
</body>

</html>