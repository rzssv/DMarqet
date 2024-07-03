<?php
include "functions.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DMarqet</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>body {overflow-x: hidden;}</style>
  </head>
  <body>
    <div class="site">
      <div class="header">
        <h1>DMarqet</h1>
        <hr class="title-line">
      </div>
      <div class="topnav">
      <a class="active" href="\sell">Sell</a>
      <a class="active" href="\buy">Buy</a>
        <div class="account">
          <?php if(isset($_SESSION['user'])) {
            echo "<p style=\"margin: 0; font-size: 17px; margin-right: 16px;\">".$_SESSION['user']."</p>";
          } else {
            echo "<a href=\"/login\" class=\"active\" style=\"padding: 0; margin-right:16px;\">Login</a>";
          }
          ?>
          <?php if(isset($_SESSION['user'])) {
            echo "<a href=\"\account\" class=\"active\" style=\"padding:0;margin: 0;margin-right:16px; font-size: 17px;\">Account</a>";
          }
          ?>
          <?php if(isset($_SESSION['user'])) {
           echo "<a href=\"/logout\" class=\"active\" style=\"padding: 0;\">Logout</a>";
          } else {
            echo "<a href=\"/signup\" class=\"active\" style=\"padding:0;\">Sign Up</a>";
          }
          ?>
        </div>
      </div>
      <div class="main">
        <div class="main-buttons">
          <form action="\buy" method="post">
            <button type="submit" class="real-main-buttons">Buy</button>
          </form>
          <form action="\sell" method="post">
            <button style="margin-left: 15px; float: right;" type="submit" class="real-main-buttons">Sell</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>