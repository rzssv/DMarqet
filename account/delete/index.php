<?php
include "../../functions.php";
if(!isset($_SESSION['user'])) {
  header("Location: /login");
}
$db->delete($_SESSION['user']);
unset($_SESSION['user']);
header("Location: /login");
echo "Account deleted. <br> <a href=\"/\">Home</a>";
?>