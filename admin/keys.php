<?php 
session_start();
include "../ReplDB.php";
$db = new ReplDB();
if($_SESSION['user'] == "admin") {
  print_r($db->list());
} else {
  die("403 Forbidden <br> <a href=\"/\">Home</a>");
}
?>