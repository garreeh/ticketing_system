<?php
session_start();
include '../../connections/connections.php';

// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
  header("Location: /ticketing_system/admin.php");
  exit();
}

if (isset($_POST['add_tickets_category'])) {

  $ticket_category = $conn->real_escape_string($_POST['ticket_category']);

  $sql = "INSERT INTO `ticket_category` (ticket_category)
  VALUES ('$ticket_category')";

  if (mysqli_query($conn, $sql)) {
    header("Location: /ticketing_system/views/admin/admin_ticket_category.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>