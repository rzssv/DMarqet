<?php
include "../../functions.php";
if(!isset($_SESSION['user'])) {
  die("Invalid request. <br> <a href=\"/\">Home</a>");
}
if($_POST['newuser'] == null || $_POST['pass'] == null) {
  die("Invalid request. <br> <a href=\"/account\">Account</a>");
}
if($db->get($_POST['newuser']) !== null) {
  die("User already exists. <br> <a href=\"/account\">Account</a>");
}
if($db->get($_SESSION["user"]) !== $_POST['pass']) {
  die("Incorrect password. <br> <a href=\"/account\">Account</a>");
}
if($_SESSION['user'] == $db->get("objWinner")) {
  $db->set("objWinner", $_POST['newuser']);
}
if($_SESSION['user'] == $db->get("objSeller")) {
  $db->set("objSeller", $_POST['newuser']);
}
if($db->get("objHighestBidder") !== null) {
  if($_SESSION['user'] == $db->get("objHighestBidder")) {
    $db->set("objHighestBidder", $_POST['newuser']);
  }
}
if($db->get($_SESSION['user']."Inventory") !== null) {
  $db->set($_POST['newuser']."Inventory", $db->get($_SESSION['user']."Inventory"));
  $db->delete($_SESSION['user']."Inventory");
  $db->set($_POST['newuser']."Price", $db->get($_SESSION['user']."Price"));
}
$db->delete($_SESSION["user"]);
$db->set($_POST['newuser'], $_POST['pass']);
$_SESSION['user'] = $_POST['newuser'];
header("Location: /");
?>
<!DOCTYPE html>
<a href="/">Home</a>