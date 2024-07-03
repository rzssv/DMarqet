<?php
include "../../functions.php";
if(!isset($_SESSION['user'])) {
  die("Invalid request. <br> <a href=\"/\">Home</a>");
}
if($_POST['pass'] == null || $_POST['newpass'] == null || $_POST['confirmnewpass'] == null) {
  die("Invalid request. <br> <a href=\"/account\">Account</a>");
}
if($db->get($_SESSION["user"]) !== $_POST['pass']) {
  die("Incorrect password. <br> <a href=\"/account\">Account</a>");
}
if($_POST['newpass'] !== $_POST['confirmnewpass']) {
  die("Passwords do not match. <br> <a href=\"/account\">Account</a>");
}
$db->set($_SESSION["user"], $_POST['newpass']);
header("Location: /");
?>
<!DOCTYPE html>
<a href="/">Home</a>