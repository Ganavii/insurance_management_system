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
    <title>Payments</title>
</head>

<body>
    <?php include 'header.php';
    ?>
    <h1 class="heading">Payment Informations
        <button class="btn" text-align="center">
            <a href="addPayment.php" class="btn">Add Payment</a>
        </button>
    </h1>
    <?php
    $sql = "SELECT recipt_no,client_id,month,amount,due,fine, agent_id FROM payment";
    $result = $conn->query($sql);

    echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>RECIPT NO</th>\n";
    echo "    <th>CLIENT ID</th>\n";
    echo "    <th>MONTH</th>\n";
    echo "    <th>AMOUNT</th>\n";
    echo "    <th>DUE</th>\n";
    echo "    <th>FINE</th>\n";
    echo "    <th>UPDATE</th>\n";
    echo "  </tr>";

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<tr>\n";
            echo "    <td>" . $row["recipt_no"] . "</td>\n";
            echo "    <td>" . $row["client_id"] . "</td>\n";
            echo "    <td>" . $row["month"] . "</td>\n";
            echo "    <td>" . $row["amount"] . "</td>\n";
            echo "    <td>" . $row["due"] . "</td>\n";
            echo "    <td>" . $row["fine"] . "</td>\n";

            if ($row["agent_id"] == $username || "2001" == $username) {
                echo "<td>" . "<a href='editPayment.php?recipt_no=" . $row["recipt_no"] . "'>Edit</a>" . "</td>\n";
            } else {
                echo "<td>" . "<a class=\"dis\" href='editPayment.php?recipt_no=" . $row["recipt_no"] . "'>Edit</a>" . "</td>\n";
            }
        }

        echo "</table>\n";
        echo "\n";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>

</html>