<?php

include '../../connection/connect.php';
session_start();

// Check if the user is an admin
if (isset($_SESSION['admin_id'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: /ticketing_system/admin.php");
    exit();
}

// Check if the user is a regular user
if (isset($_SESSION['user_id'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: /ticketing_system/index.php");
    exit();
}

header("Location: /ticketing_system/index.php");
exit();
?>
