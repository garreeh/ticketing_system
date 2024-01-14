<?php
session_start();
include './../connections/connections.php';

// Check if the ticket_id is provided in the URL
if (isset($_GET['ticket_id'])) {
  $ticket_id = $_GET['ticket_id'];

  $admin_id = $_SESSION['admin_id'];
  // Update the tickets table with the new admin_id
  $updateQuery = "UPDATE tickets SET ticket_status = 'Closed' WHERE ticket_id = $ticket_id";

  if ($conn->query($updateQuery) === TRUE) {
    // header("Location: /ticketing_system/views/admin/admin_unassigned_tickets.php");
    echo 'Okay na ya';
    // You can redirect or do other actions after the assignment
  } else {
    echo "Error updating record: " . $conn->error;
  }

  // Close the database connection
  $conn->close();
} else {
  echo "Ticket ID not provided.";
}
?>