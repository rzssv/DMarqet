<?php
include "../functions.php";
if($_SESSION['user'] !== "admin") {
  die("403 Forbidden <br> <a href=\"/\">Home</a>");
}
if($db->get("objHighestBidder") !== null) {
  $db->delete("objHighestBidder");
  $db->delete("objHighestBid");
}
?>
<!DOCTYPE html>
<a href="/">Home</a>