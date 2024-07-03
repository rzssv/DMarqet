<?php
session_start();
include "../ReplDB.php";
$db = new ReplDB();

if(isset($_POST['user']) && isset($_POST['pass'])) {
   if($_POST['pass'] == $db->get($_POST['user'])) {
      $_SESSION['user'] = $_POST['user'];
      header("Location: /");
      echo "Logged in successfully. <br>";  
   } else {
      die("Incorrect username or password.<br> <a href=\"/login\">Log In</a>");
   }
} else {
   die("Invalid request.<br><a href=\"/login\">Log In</a>");   
}
?>
<!DOCTYPE html>
<html>
   <head>
      <title>DMarqet - Logged In</title>
      <link rel="icon" type="image/x-icon" href="images/favicon.ico">
   </head>
   <a href="/">Home</a>
</html>