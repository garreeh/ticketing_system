<?php
session_start();
include './../connections/connections.php';

// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: /ticketing_system/admin.php");
    exit();
}

$admin_id = $_SESSION['admin_id'];

$ticket_id = $conn->real_escape_string($_GET['ticket_id']);
$sqldelete = "DELETE FROM tickets WHERE ticket_id= $ticket_id";

if ($conn->query($sqldelete) === TRUE) {
  header("Location: /ticketing_system/views/admin/admin_view_tickets.php");
  exit(); 
} else {
  echo "Error deleting record: " . $conn->error;
}
?>
