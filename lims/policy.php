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
    <title>Policy</title>
</head>

<body>
    <?php include 'header.php';
    ?>
    <h1 class="heading">Policy Informations</h1>

    <?php
    include 'connection.php';
    $sql = "SELECT policy_id,term,health_status,system,payment_method,coverage, age_limit FROM policy";
    $result = $conn->query($sql);
    echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>POLICY ID</th>\n";
    echo "    <th>TERM</th>\n";
    echo "    <th>TOTAL AMOUNT</th>\n";
    echo "    <th>PER MONTH</th>\n";
    echo "    <th>PAYMENT METHOD</th>\n";
    echo "    <th>COVERAGE</th>\n";
    echo "    <th>AGE LIMIT</th>\n";
    echo "  </tr>";

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<tr>\n";
            echo "    <td>" . $row["policy_id"] . "</td>\n";
            echo "    <td>" . $row["term"] . "</td>\n";
            echo "    <td>" . $row["health_status"] . "</td>\n";
            echo "    <td>" . $row["system"] . "</td>\n";
            echo "    <td>" . $row["payment_method"] . "</td>\n";
            echo "    <td>" . $row["coverage"] . "</td>\n";
            echo "    <td>" . $row["age_limit"] . "</td>\n";
        }
        echo "</table>\n";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>

</html>