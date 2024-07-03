<?php
session_start();
include "ReplDB.php";
$db = new ReplDB();
$prefix = "../";
if($db->get("objName") !== null) {
  if($db->get("objDateRemoval") <= date("Hi")) {
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
}
?>