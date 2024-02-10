<?php
session_start();
include './../connections/connections.php';

// Check if the ticket_id is provided in the POST data
if (isset($_POST['ticket_id'])) {
  $ticket_id = $_POST['ticket_id'];
  $admin_id = $_SESSION['admin_id'];

  // Update the tickets table with the new admin_id
  $updateQuery = "UPDATE tickets SET admin_id = $admin_id WHERE ticket_id = $ticket_id";

  if ($conn->query($updateQuery) === TRUE) {
    // You can send a success response back to the frontend
    echo "success";
  } else {
    // You can send an error response back to the frontend
    http_response_code(500);
    echo "Error updating record: " . $conn->error;
  }

  // Close the database connection
  $conn->close();
} else {
  // You can send an error response back to the frontend
  http_response_code(400);
  echo "Ticket ID not provided.";
}
?>
