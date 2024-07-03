<?php
session_start();
include "../ReplDB.php";
$db = new ReplDB();
$prefix = "../";

if($_SESSION['user'] !== "admin") {
  die("403 Forbidden <br> <a href=\"/\">Home</a>");
} else {
  if($db->get("objImage") !== null) {
    unlink($prefix .$db->get("objImage"));
  }
  $db->delete("objPrice");
  $db->delete("objDesc");
  $db->delete("objSeller");
  $db->delete("objImage");
  $db->delete("objDateRemoval");
  $db->delete("objFakeDateRemoval");
  $db->set("objWinner", $db->get("objHighestBidder"));
  $db->set($db->get("objHighestBidder")."Inventory", $db->get("objName"));
  $db->set($db->get("objHighestBidder")."Price", $db->get("objHighestBid"));
  $db->delete("objName");
  $db->delete("objHighestBidder");
  $db->delete("objHighestBid");
}
?>
<!DOCTYPE html>
<a href="/">Home</a>