<?php 
include "../functions.php";
if(!isset($_SESSION['user'])) {
  header("Location: /login");
} 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DMarqet - Account</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="site">
      <div class="header">
        <h1>Account</h1>
        <hr class="title-line">
      </div>
      <div class="topnav">
        <a class="active" href="\">Home</a>
        <a class="active" href="\sell">Sell</a>
        <a class="active" href="\buy">Buy</a>
        <div class="account">
          <?php if(isset($_SESSION['user'])) {
            echo "<p style=\"margin: 0; font-size: 17px; margin-right: 16px;\">".$_SESSION['user']."</p>";
          } else {
            echo "<a href=\"/login\" class=\"active\" style=\"padding: 0;margin-right:16px;\">Login</a>";
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
      <div class="main" style="flex-direction: column;justify-content: flex-start;">
        <h2 style="font-family: Roboto Slab;">Welcome, <?php echo $_SESSION['user']; ?>.</h2>
        <div style="width: 50vw;" class="br"></div>
        <?php
        if($db->get($_SESSION['user']."Inventory") !== null) {
          echo "<p>You have bought an item named \"".$db->get($_SESSION['user']."Inventory")."\" for $".$db->get($_SESSION['user']."Price").".</p>";
        } else {
          echo "<p>You have not bought anything.</p>";
        }
        ?>
        <div class="br" style="width: 50vw;"></div>
        <form action="account/changeuser" method="post" style="margin: 2vh 0;text-align:center;">
          <input class="form-input" name="newuser" type="text" placeholder="New Username" required>
          <input class="form-input" name="pass" type="password" placeholder="Password">
          <br>
          <button style="margin-top: 1vh;" class="form-submit" name="submit" type="submit">Change Username</button>
        </form>
        <div class="br" style="width: 50vw;"></div>
        <form style="margin: 2vh 0;text-align:center;" action="account/changepass" method="post">
          <input class="form-input" name="pass" type="password" placeholder="Old Password" required>
          <input class="form-input" name="newpass" type="password" placeholder="New Password" required>
          <input class="form-input" name="confirmnewpass" type="password" placeholder="Confirm Password" required>
          <br>
          <button type="submit" style="margin-top: 1vh;" class="form-submit">Change Password</button>
        </form>
        <div class="br" style="width: 50vw;"></div>
        <form action="/account/delete" method="post">
          <button onclick="return confirm('Are you sure you want to delete your account? Your account will not be recoverable.');" class="delete-account">Delete Account</button>
        </form>
      </div>
  </body>