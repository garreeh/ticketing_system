<?php
session_start();
include './../connections/connections.php';

// Check if the ticket_id is provided in the POST data
if (isset($_POST['ticket_id'])) {
    $ticket_id = $_POST['ticket_id'];

    $admin_id = $_SESSION['admin_id'];
    // Update the tickets table with the new ticket status
    $updateQuery = "UPDATE tickets SET ticket_status = 'Closed' WHERE ticket_id = $ticket_id";

    if ($conn->query($updateQuery) === TRUE) {
      // Output JSON response to indicate success
      echo "success";
    } else {
      // Output JSON response to indicate error
      echo "Error closing record: " . $conn->error;

    }

    // Close the database connection
    $conn->close();
} else {
    // Output JSON response if ticket ID is not provided
    echo json_encode(array("status" => "error", "message" => "Ticket ID not provided."));
}
?>
