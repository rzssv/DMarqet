<?php
session_start();
include "ReplDB.php";
$db = new ReplDB();
$explodeDate = explode(" ", date("H i"));
if(($explodeDate[1] + 10) > 59) {
  $date = implode("", array_map(function ($n) {
    return sprintf("%02d", $n);
  }, array($explodeDate[0] + 1, $explodeDate[1] - 10)));
} elseif($explodeDate[0] = 23 && ($explodeDate[1] + 10) > 59) {
  $date = implode("", array_map(function ($n) {
    return sprintf("%02d", $n);
  }, array($explodeDate[0] - 23, $explodeDate[1] - 10)));
} else {
  $date = date("Hi") + 10;
}
$db->set("objFakeDateRemoval", (date("Hi") + 10));
if(isset($_POST['submit']) && isset($_SESSION['user'])) {
  if(isset($_POST['objname']) && isset($_POST['price']) &&       isset($_POST['desc'])) {
    if($db->get("objName") !== null) {
      die("Another object is already being sold. Wait for the next listing. <br>");
    } else {
      $db->set("objName", $_POST['objname']); 
      $db->set("objPrice", $_POST['price']);
      $db->set("objDesc", $_POST['desc']);
      $db->set("objSeller", $_SESSION['user']);
      $db->set("objDateRemoval", $date);
      echo "Object put up for sale. <br>";
    }
  } else {
    die("Invalid request. <br> <a href=\"/sell\">Sell</a>");
  }
  if(isset($_FILES['image'])) {
    $dir = "uploads/";
    $file = $dir . basename($_FILES['image']['name']);
    $uploadOk = 1;
    $filetype = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    if($_FILES['image']['size'] > 5000000) {
      $uploadOk = 0;
      die("File is too large. <br> <a href=\"/sell\">Sell</a>");
    }

    if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg" && $filetype != "gif") {
      $uploadOk = 0;
      die("Filetype is not supported. <br> <a href=\"/sell\">Sell</a>");
    }
  } else {
    die("Invalid request. <br> <a href=\"/sell\">Sell</a>");
  }
} else {
  die("Invalid request. <br> <a href=\"/sell\">Sell</a>");
}
?>
<?php 
if($uploadOk == 1) {
  move_uploaded_file($_FILES['image']['tmp_name'], $file); 
  $db->set("objImage", $file);
  echo "Image uploaded succesfully.";
}
?>
<!DOCTYPE html>
<a href="/">Home</a>