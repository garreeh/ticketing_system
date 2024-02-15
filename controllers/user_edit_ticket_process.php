<?php
// Include the database connection file
include './../connections/connections.php';

// Initialize response array
$response = array();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_tickets'])) {
	// Retrieve form data
	$ticket_id = $_POST['ticket_id'];
	$ticket_category = $_POST['ticket_category'];
	$ticket_description = $_POST['ticket_description'];
	$ticket_priority = $_POST['ticket_priority'];
	$admin_fullname = $_POST['admin_id'];

	// Check if admin_fullname is 'null'
	if ($admin_fullname === 'null') {
		// Set admin_id to NULL
		$admin_id = null;
	} else {
		// Get admin_id based on admin_fullname
		$sql_admin_id = "SELECT admin_id FROM admin_user WHERE admin_fullname = '$admin_fullname'";
		$result_admin_id = $conn->query($sql_admin_id);

		if ($result_admin_id->num_rows > 0) {
			$row_admin_id = $result_admin_id->fetch_assoc();
			$admin_id = $row_admin_id['admin_id'];
		} else {
			// Admin ID not found for the selected admin_fullname
			$response['success'] = false;
			$response['message'] = "Admin ID not found for the selected admin_fullname!";
			echo json_encode($response);
			exit(); // Terminate script execution
		}
	}

    // Update the ticket in the database
    $sql = "UPDATE tickets 
            SET 
							ticket_category = '$ticket_category',
							ticket_description = '$ticket_description',
							ticket_priority = '$ticket_priority',
							admin_id = " . ($admin_id !== null ? "'$admin_id'" : "NULL") . "
            WHERE ticket_id = $ticket_id";

    if ($conn->query($sql) === TRUE) {
			// Fetch the updated ticket information
			$sql_fetch_ticket = "SELECT * FROM tickets WHERE ticket_id = $ticket_id";
			$result_fetch_ticket = $conn->query($sql_fetch_ticket);
			$updated_ticket = $result_fetch_ticket->fetch_assoc();

			// Ticket update successful
			$response['success'] = true;
			$response['message'] = "Ticket updated successfully!";
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
