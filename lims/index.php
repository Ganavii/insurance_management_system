<?php
session_start();
//if(isset($_SESSION["username"])){
//header("Location: home.php");
//}
?>

<head>
  <style>
    .container {
      width: 450px;
      height: 700px;
      margin: auto;
      margin-top: 4%;
      padding-top: 1px;

    }

    .login-page {
      width: 360px;
      padding: 8% 0 0;
      margin: auto;
    }

    .form {
      padding-top: 30px;
      position: relative;
      z-index: 1;
      background: #FFFFFF;
      max-width: 349px;
      margin: 0 auto 100px;
      padding: 45px;
      text-align: center;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.3), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .form input {
      font-family: "Georgia";
      background: #e5ebb5;
      width: 100%;
      border: 20px;
      margin: 0 0 15px;
      padding: 15px;
      box-sizing: border-box;
      font-size: 14px;

    }

    .form button {
      font-family: "Georgia";
      text-transform: uppercase;
      outline: 0;
      background: #323329;
      width: 100%;
      border: 0;
      padding: 15px;
      color: #FFFFFF;

    }

    .form button:hover,
    .form button:active,
    .form button:focus {
      cursor: pointer;
    }
  </style>
  <title>Login Page</title>
</head>

<body style="background-color: #f6f9d9;">
  <h1 style="text-align:center; font-family: Georgia; font-size: 55px;"> INSURANCE MANAGEMENT SYSYTEM<h1>
      <div class="container">

        <div class="login-page">
          <div class="form">
            <form class="login-form" action="login.php" method="POST">
              <input type="text" name="username" id="" placeholder="username" />
              <input type="password" name="password" id="" placeholder="password" />
              <button>login</button>
            </form>
          </div>
        </div>
      </div>
</body>