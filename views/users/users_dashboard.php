<?php
include './../../connections/connections.php';

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user_id'])) {
  header("Location: /ticketing_system/index.php");
  exit();
}
?>

USERS KA LANG IHO