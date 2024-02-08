<?php
session_start();
include './../connections/connections.php';

// Check if ticketId is provided and is numeric
if(isset($_GET['ticketId']) && is_numeric($_GET['ticketId'])) {
  // Sanitize the input
  $ticketId = mysqli_real_escape_string($conn, $_GET['ticketId']);

  // Query to fetch ticket details based on ticketId
  $sql = "SELECT ticket_number, ticket_description FROM tickets WHERE ticket_id = $ticketId";

  // Execute the query
  $result = mysqli_query($conn, $sql);

  // Check if query was successful
  if($result) {
      // Fetch ticket details
      $ticket = mysqli_fetch_assoc($result);

      // Close the database connection
      mysqli_close($conn);

      // Output ticket details as HTML
      echo $ticket['ticket_description'];
  } else {
      // Query failed, output error message
      echo "Error: " . mysqli_error($conn);
  }
} else {
  // Invalid or missing ticketId, output error message
  echo "Invalid or missing ticketId parameter";
}

?>
