<?php 
session_start(); 
include "../ReplDB.php";
$db = new ReplDB();

if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['confirmpass'])) {
  if ($_POST['pass'] !== $_POST['confirmpass']) {
    die("Passwords do not match. <br><a href=\"/signup\">Sign Up</a>");
  }
  if(strlen($_POST['user']) > 20) {
    die("Username is too long. <br><a href=\"/signup\">Sign Up</a>");
  }
  if(in_array($_POST['user'], $db->list($_POST['user']))) {
    die("Account already exists. <br><a href=\"/signup\">Sign Up</a>");
  }
  $db->set($_POST['user'], $_POST['pass']);
  $_SESSION['user'] = $_POST['user'];
  echo "Account created successfully.";
} else {
  die("Invalid request. <br><a href=\"/signup\">Sign Up</a>");
}
Header("Location: /");
?>

<!DOCTYPE html>
<html>
  <head>
    <title>DMarqet - Signed Up</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="style.css">
  </head>
  <body style="outline: none;">
  <br>
  <a href="/">Home</a>
  </body>
</html>
