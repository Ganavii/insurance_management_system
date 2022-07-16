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
            width: 97%;
            padding: 12px 20px;
            margin: 10px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            font-family: Georgia;
            width: 97%;
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
    <title>Edit Payment</title>
</head>

<body>
    <?php include 'header.php';
    ?>

    <h1 class="heading">Payment Information
        <button class="btn" textalign="center">
            <a href="addPayment.php" class="btn">Add Payment</a>
        </button>
    </h1>

    <?php

    include 'connection.php';


    $id = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $recipt_no = $_GET["recipt_no"];
    }


    $sql = "SELECT recipt_no, client_id, month, amount, due, fine, agent_id from payment where recipt_no='$recipt_no'";
    $result = $conn->query($sql);

    echo "<div>\n";

    echo '<form action="updatePayment.php" method="post">';

    while ($row = $result->fetch_assoc()) {
        echo "<label for=\"fname\">RECIPT NO</label>";
        echo "<input type=\"text\" recipt_no=\"fname\" name=\"recipt_no\" placeholder=\"Your recpit no..\" value=\"$row[recipt_no]\">";
        echo "<label for=\"fname\">CLIENT ID</label>";
        echo "<input type=\"text\" recipt_no=\"fname\" name=\"client_id\" placeholder=\"Client Id..\" value=\"$row[client_id]\">";
        echo "<label for=\"fname\">MONTH</label>";
        echo "<input type=\"text\" recipt_no=\"fname\" name=\"month\" placeholder=\"Month..\" value=\"$row[month]\">";
        echo "<label for=\"fname\">AMOUNT</label>";
        echo "<input type=\"text\" recipt_no=\"fname\" name=\"amount\" placeholder=\"Amount..\" value=\"$row[amount]\">";
        echo "<label for=\"fname\">   DUE   </label>";
        echo "<input type=\"text\" recipt_no=\"fname\" name=\"due\" placeholder=\"Your Due..\" value=\"$row[due]\">";
        echo "<label for=\"fname\">FINE   </label>";
        echo "<input type=\"text\" recipt_no=\"fname\" name=\"fine\" placeholder=\"Fine..\" value=\"$row[fine]\">";
        echo "<label for=\"fname\">AGENT ID</label>";
        echo "<input type=\"text\" recipt_no=\"fname\" name=\"agent_id\" placeholder=\"Agent Id..\" value=\"$row[agent_id]\">";
    }

    echo "<input type=\"submit\" value=\"UPDATE\">";
    echo "</form>\n";
    echo "<a href='deletePayment.php?recipt_no=" . $recipt_no . "'>Delete Payment</a>";



    echo "</div>\n";
    echo "\n";


    ?>



    </div>
    <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->




</body>

</html>