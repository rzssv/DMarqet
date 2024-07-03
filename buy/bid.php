<?php
session_start();
include "../ReplDB.php";
$db = new ReplDB();
if(isset($_POST['submit']) && isset($_POST['bid']) && isset($_SESSION['user'])) {
  if($_POST['bid'] <= $db->get("objHighestBid")) {
    die("Bid must be higher than the current highest bid. <br> <a href=\"/buy\">Buy</a>");
  }
  if($db->get("objSeller") == $_SESSION['user']) {
    die("You cannot bid on your own item. <br> <a href=\"/buy\">Buy</a>");
  }  
  if($db->get("objHighestBidder") == $_SESSION['user']) {
    die("You are already the highest bidder. <br> <a href=\"/buy\">Buy</a>");
  }
  if($_POST['bid'] < $db->get("objPrice")) {
    die("Bid must be higher than the starting price. <br> <a href=\"/buy\">Buy</a>");
  }
  $db->set("objHighestBidder", $_SESSION['user']);
  $db->set("objHighestBid", $_POST['bid']);
  header("Location: /buy");
}
?>
<!DOCTYPE html>
<a href="/buy">Buy</a>