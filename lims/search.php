<!DOCTYPE html>

<html>

<head>
    <style>
        .heading {
            font-weight: 800;
            text-transform: uppercase;
        }

        .search {
            border: 1px solid grey;
            width: 100%;
            height: 50px;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border-radius: 4px;
        }

        .searchBar {
            width: 95%;
            padding: 12px 20px;
            margin: 10px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .searchBtn {
            border: 1px solid grey;
            width: 100%;
            height: 50px;
            box-sizing: border-box;
            border-radius: 4px;
            color: white;
            background-color: #323329;
            cursor: pointer;
            font-family: geo;
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
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search</title>
</head>

<body>
    <?php include 'header.php';
    ?>
    <h1 class="heading">Search Results</h1>
    <div class="searchBar">
        <form action="search.php" method="post">
            <input type="text" name="key" class="search"><br>
            <br>
            <input class="searchBtn" type="submit" value="SEARCH">
            </br>
        </form>
    </div>


    <?php
    $key = $_POST["key"];

    //SEARCHES IN CLIENTS

    $sql = "SELECT * FROM client WHERE client_id LIKE '%" . $key .  "%' OR name LIKE '%" . $key . "%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<br>";
        echo "<br>";
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

        while ($row = $result->fetch_assoc()) {

            echo "<tr>\n";
            echo "    <td>" . $row["client_id"] . "</td>\n";
            echo "    <td>" . $row["name"] . "</td>\n";
            echo "    <td>" . $row["birth_date"] . "</td>\n";
            echo "    <td>" . $row["phone"] . "</td>\n";
            echo "    <td>" . $row["address"] . "</td>\n";
            echo "    <td>" . "<a href='clientStatus.php?client_id=" . $row["client_id"] . "'>Client Status</a>" . "</td>\n";
            if ($row["agent_id"] == $username) {
                echo "<td>" . "<a href='editClient.php?client_id=" . $row["client_id"] . "'>Edit</a>" . "</td>\n";
            } else {
                echo "<td>" . "<a class=\"dis\" href='editClient.php?client_id=" . $row["client_id"] . "'>Edit</a>" . "</td>\n";
            }
        }
    } else {
        echo "Nothing found in Clients Table";
    }


    //   SEARCHES IN NOMINEE
    $sql = "SELECT * FROM nominee WHERE nominee_id LIKE '%" . $key . "%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class=\"table\">\n";
        echo "<br>";
        echo "  <tr>\n";
        echo "    <th>NOMINEE ID</th>\n";
        echo "    <th>CLIENT ID</th>\n";
        echo "    <th>NAME</th>\n";
        echo "    <th>SEX</th>\n";
        echo "    <th>Birth Date</th>\n";
        echo "    <th>PHONE</th>\n";;
        echo "    <th>STATUS</th>\n";
        echo "  </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>\n";
            echo "    <td>" . $row["nominee_id"] . "</td>\n";
            echo "    <td>" . $row["client_id"] . "</td>\n";
            echo "    <td>" . $row["name"] . "</td>\n";
            echo "    <td>" . $row["sex"] . "</td>\n";
            echo "    <td>" . $row["birth_date"] . "</td>\n";
            echo "    <td>" . $row["phone"] . "</td>\n";
            echo "    <td>" . "<a href='clientStatus.php?client_id=" . $row["client_id"] . "'>Client Status</a>" . "</td>\n";
            echo "    </td>";
        }
        echo "</table>\n";
        echo "\n";
    } else {
        echo "<br>";
        echo "<br>";
        echo "Nothing Found in Nominee Table";
    }

    $conn->close();
    ?>

</body>

</html>