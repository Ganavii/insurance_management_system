<style>
    .nav {
        padding: 1%;
        width: 80%;
        margin: 0 auto;
    }

    .welcome {
        font-weight: bold;
        font-family: Georgia;
        font-size: 20px;
    }

    .menu {
        text-align: center;
        border-bottom: 1px solid black;
    }

    .menu ul {
        list-style-type: none;
    }

    .menu ul li {
        display: inline;
        padding: 1%;
    }

    .menu ul li a {
        text-decoration: none;
        font-weight: bold;
        color: #323329;
    }

    .menu ul li a:hover {
        color: #97a607;
    }
</style>


<?php
session_start();
include 'connection.php';
$username = $_SESSION["username"];

$sql = "SELECT agent_id FROM agent WHERE agent_id = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
} else {
    header("Location: clientHome.php");
}

?>
<div class="welcome">
    <?php
    if (!isset($_SESSION["username"])) {
        header("Location: index.php");
    } else {
        echo "Welcome,  " . $_SESSION["username"];
    }
    ?>
    <br />

</div>

<body style="background-color: #f6f9d9; font-family: Georgia;">

    <div class="menu">
        <br>
        <div class="nav">
            <ul>
                <li>
                    <a href="home.php" class="header">HOME</a>
                </li>
                <li>
                    <a href="client.php">CLIENTS</a>
                </li>
                <li>
                    <a href="agent.php">AGENTS</a>
                </li>
                <li>
                    <a href="policy.php">POLICY</a>
                </li>
                <li>
                    <a href="nominee.php"></i>NOMINEE</a>
                </li>
                <li>
                    <a href="payment.php">PAYMENTS</a>

                </li>
                <li>
                    <a href="<?php echo "logout.php" ?>" class="logout" title="Logout">LOGOUT</a>
                </li>
            </ul>

        </div>
    </div>
    <br>