<?php
include "../functions.php";
if(!isset($_SESSION['user'])) {
  header('Location: /login');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DMarqet - Sell</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script>
      function getFile() {
        document.getElementById("upfile").click();
      }
    </script>
  </head>
  <body>
    <div class="site">
      <div class="header">
        <h1>Sell</h1>
        <hr class="title-line">
      </div>
      <div class="topnav">
        <a class="active" href="\">Home</a>
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
      <div class="main" style="flex-flow:row nowrap;justify-content:center;align-items:flex-start;">
        <form action="submit.php" method="post" enctype="multipart/form-data">
          <input id="upfile" name="image" type="file" accept="image/*">
          <input class="sell-input" style="align-self: flex-start;" name="objname" type="text" placeholder="Object Name" required>
          <input class="sell-input" name="price" style="float:right;" type="number" placeholder="Price (CAD)" min="0" required>
          <hr class="hr">
          
          <textarea class="sell-input" name="desc" placeholder="Description" style="width: 86vw;height:30vh; vertical-align: top;" required></textarea>
          <br>
          <div style="text-align: center; margin: auto;">
            <div style="align-self:stretch;" class="file-upload" onclick="getFile()">Upload Image (Must be jpg, jpeg, png, or gif, and under 5MB)</div>
            <br>
            <button name="submit" type="submit" class="sell-button">Put for sale</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>