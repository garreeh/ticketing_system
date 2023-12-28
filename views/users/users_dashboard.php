<?php
include './../../connection/connect.php';

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['client_id'])) {
  header("Location: /blut_medical/index.php");
  exit();
}
?>

USERS KA LANG IHO