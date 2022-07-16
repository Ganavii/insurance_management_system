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
    <title>Nominees</title>
</head>

<body>
    <?php include 'header.php';
    ?>

    <h1 class="heading">Nominees Informations
        <button class="btn" textalign="center">
            <a href="addNominee.php" class="btn">Add Nominee</a>
        </button>
    </h1>
    <?php
    include 'connection.php';

    $sql = "SELECT * FROM nominee";
    $result = $conn->query($sql);

    echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>NOMINEE ID</th>\n";
    echo "    <th>CLIENT ID</th>\n";
    echo "    <th>NAME</th>\n";
    echo "    <th>GENDER</th>\n";
    echo "    <th>Birth Date</th>\n";
    echo "    <th>RELATIONSHIP</th>\n";;
    echo "    <th>PRIORITY</th>\n";
    echo "    <th>PHONE</th>\n";;
    echo "    <th>STATUS</th>\n";
    echo "  </tr>";

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<tr>\n";
            echo "    <td>" . $row["nominee_id"] . "</td>\n";
            echo "    <td>" . $row["client_id"] . "</td>\n";
            echo "    <td>" . $row["name"] . "</td>\n";
            echo "    <td>" . $row["sex"] . "</td>\n";
            echo "    <td>" . $row["birth_date"] . "</td>\n";
            echo "    <td>" . $row["relationship"] . "</td>\n";
            echo "    <td>" . $row["priority"] . "</td>\n";
            echo "    <td>" . $row["phone"] . "</td>\n";
            echo "    <td>" . "<a href='clientStatus.php?client_id=" . $row["client_id"] . "'>Client Status</a>" . "</td>\n";
        }

        echo "</table>\n";

        echo "\n";
        echo "</body>\n";
        echo "</html>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</body>

</html>