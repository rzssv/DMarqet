<?php
include "../functions.php";
if(!isset($_SESSION['user'])) {
  header('Location: /login');
}
$objName = $db->get("objName");
$objPrice = $db->get("objPrice");
$objDesc = $db->get("objDesc");
$objSeller = $db->get("objSeller");
$objImage = $db->get("objImage");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DMarqet - Buy</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="site">
      <div class="header">
        <h1>Buy</h1>
        <hr class="title-line">
      </div>
      <div class="topnav">
        <a class="active" href="\">Home</a>
        <a class="active" href="\sell">Sell</a>
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
      <div class="main" style="flex-direction: row;justify-content: flex-end;">
        <div class="image-wrap">
          <?php if($objImage !== null) {
            echo "<img alt=\"Object Image\" class=\"item-image\" src=\"".$objImage."\">";
          } else {
            echo "<p>No object image.</p>";
          }
          ?>
          
        </div>
        <div class="sidebar-border"></div>
        <div class="sidebar">
          <?php if($objName !== null) {
            echo "<h2>".$objName."</h2>";
            echo "<h2>Starting Price: ".$objPrice."</h2><div class=\"br\" style=\"border:none;\"></div>";
            if($db->get("objHighestBid") !== null) {
              echo "<h2>Highest Bid: ".$db->get("objHighestBid")." from ".$db->get("objHighestBidder")."</h2><div class=\"br\"></div>";
            } else {
              echo "<h2>Highest Bid: None</h2><div class=\"br\"></div>";
            }
            echo "<p>Description: ".$db->get("objDesc")."</p>";
            if(date("Hi") > $db->get("objDateRemoval")) {
              echo "<p>Time Remaining: ".($db->get("objFakeDateRemoval") - date("Hi"))." minute(s)</p>";
            } elseif(explode(" ", date("H i"))[0] = 00) {
            echo "<p>Time remaining: ".($db->get("objDateRemoval") - date("Hi"))." minute(s)</p>";  
            }  
            else {
              echo "<p>Time Remaining: ".($db->get("objFakeDateRemoval") - date("Hi"))." minutes</p>";
            }
            echo "<p>Sold By: ".$db->get("objSeller")."</p><div class=\"br\"></div>";
          } else {
            echo "<h2>No object for auction.</h2>";
            if($db->get("objWinner") !== null) {
              echo "<h2>Last winner: ".$db->get("objWinner")."</h2><div class=\"br\"></div>";
            } else {
              echo "<h2>Last winner: None</h2><div class=\"br\"></div>";
            }
          }
          ?>
          <form action="buy/bid.php" method="post">
            <input name="bid" type="number" placeholder="Bid Amount" min="0" <?php if($objName !== null) {echo "required";} else {echo "disabled";} ?>>
            <button type="submit" name="submit" class="buy-submit" <?php if($objName !== null) {echo "required";} else {echo "disabled";} ?>>Bid</button>
          </form>
        </div>
      </div>
</body> 