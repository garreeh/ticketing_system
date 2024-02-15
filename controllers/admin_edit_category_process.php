<?php
// Include the database connection file
include './../connections/connections.php';
// Initialize response array
$response = array();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_ticket_category'])) {
  // Retrieve form data
  $ticket_category_id = $_POST['ticket_category_id'];
  $ticket_category = $_POST['ticket_category'];

  // Update the ticket in the database
  $sql = "UPDATE ticket_category
          SET 
              ticket_category = '$ticket_category'
          WHERE ticket_category_id = $ticket_category_id";

  if ($conn->query($sql) === TRUE) {
    // Fetch the updated ticket information
    $sql_fetch_ticket = "SELECT * FROM ticket_category WHERE ticket_category_id = $ticket_category_id";
    $result_fetch_ticket = $conn->query($sql_fetch_ticket);
    $updated_ticket = $result_fetch_ticket->fetch_assoc();

    // Ticket update successful
    $response['success'] = true;
    $response['message'] = "Ticket Category Updated successfully!";
    $response['ticket'] = $updated_ticket;

    // Add a new key-value pair to indicate whether the modal should be closed
    $response['close_modal'] = true;
      
  } else {
    // Ticket update failed
    $response['success'] = false;
    $response['message'] = "Error updating record: " . $conn->error;
  }

    // Close the database connection
    $conn->close();

    // Return the response as JSON
    echo json_encode($response);
  } else {
    // If the form is not submitted or invalid request method, return error response
    $response['success'] = false;
    $response['message'] = "Invalid request!";
    echo json_encode($response);
  }
?>
