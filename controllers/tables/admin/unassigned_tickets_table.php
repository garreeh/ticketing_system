<?php
// Start the session
session_start();
date_default_timezone_set('Asia/Manila');

// Define table and primary key
$table = 'tickets';
$primaryKey = 'ticket_id';
// Define columns for DataTables
$columns = array(
	array(
		'db' => 'emp_users.emp_firstname',
		'dt' => 0,
		'field' => 'emp_firstname',
		'formatter' => function ($lab1, $row) {
			$userfullname = $row['emp_firstname'] . ' ' . $row['emp_lastname'];
			return $userfullname;
		}
	),

	array(
		'db' => 'ticket_number',
		'dt' => 1,
		'field' => 'ticket_number',
		'formatter' => function ($lab2, $row) {
			return $row['ticket_number'];
		}
	),

	array(
		'db' => 'ticket_category',
		'dt' => 2,
		'field' => 'ticket_category',
		'formatter' => function ($lab3, $row) {
			return $row['ticket_category'];
		}
	),

	array(
    'db' => 'ticket_description',
    'dt' => 3,
    'field' => 'ticket_description',
    'formatter' => function ($lab4, $row) {
			// Generate a unique ID for the modal based on ticket_id
			$modalId = 'ticket_description_modal_' . $row['ticket_id'];

			// Return the button and modal HTML
			return '
			<a href="#" class="view-ticket" data-toggle="modal" data-target="#' . $modalId . '">' . 'View' . '</a>
			
			<!-- Modal -->
			<div class="modal fade" id="' . $modalId . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">View Description</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" id="modal-body-' . $row['ticket_id'] . '">
							<!-- Modal content goes here -->
							<p> Ticket Number: </p>
								<input name="ticket_description" type="text" value="' . $row['ticket_number'] .'" class="form-control" readonly>
							<hr>
							<p> Description: </p>
								<textarea class="form-control" id="ticket_description" name="ticket_description" placeholder="Enter Ticket Description" rows="4" cols="50" readonly required>' . htmlspecialchars($row['ticket_description']) . '</textarea>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>

			';
    }
	),

	array(
    'db' => 'ticket_priority',
    'dt' => 4,
    'field' => 'ticket_priority',
    'formatter' => function ($lab5, $row) {
			$ticket_priority = $row['ticket_priority'];

			// Set color and dimensions based on ticket_priority
			if ($ticket_priority == 'Normal') {
					$color = '#ADD8E6'; // Light Blue
			} elseif ($ticket_priority == 'Priority') {
					$color = '#66FF99'; // Light Green
			} else {
					$color = '#FFCCCB'; // Light Red
			}

			// Set dimensions
			$width = '70px'; // Adjust the value as needed
			$height = '30px'; // Adjust the value as needed

			// Set border-radius
			$border_radius = '10px'; // Adjust the value as needed

			// Return the HTML with the specified styles
			return '<span style="display: inline-block; background-color: ' . $color . '; width: ' . $width . '; height: ' . $height . '; border-radius: ' . $border_radius . '; text-align: center; line-height: ' . $height . ';">' . $ticket_priority . '</span>';
    }
	),


	array(
    'db' => 'ticket_status',
    'dt' => 5,
    'field' => 'ticket_status',
    'formatter' => function ($lab6, $row) {
			$ticket_status = $row['ticket_status'];

			// Set color based on ticket_status
			if ($ticket_status == 'Pending') {
					$color = '#FFFFE0'; // Light Yellow
			} else {
					$color = '#FFCCCB'; // Light Red
			}

			// Set dimensions
			$width = '70px'; // Adjust the value as needed
			$height = '30px'; // Adjust the value as needed

			// Set border-radius
			$border_radius = '10px'; // Adjust the value as needed

			// Return the HTML with the specified styles
			return '<span style="display: inline-block; background-color: ' . $color . '; width: ' . $width . '; height: ' . $height . '; border-radius: ' . $border_radius . '; text-align: center; line-height: ' . $height . ';">' . $ticket_status . '</span>';
    }
	),

	array(
		'db' => 'created_at',
		'dt' => 6,
		'field' => 'created_at',
		'formatter' => function ($lab3, $row) {

			// Set the time zone to Asia/Manila
			$timezone = new DateTimeZone('Asia/Manila');

			// Create DateTime object with the specified time zone
			$created_at = new DateTime($row['created_at'], $timezone);

			// Format the date and time with a divider in 12-hour format
			return $created_at->format('M d, Y | h:i:s A');
		}
	),

	array(
    'db' => 'ticket_id',
    'dt' => 7,
    'field' => 'ticket_id',
		'formatter' => function ($lab4, $row) {
			$ticket_id = $row['ticket_id'];
			$edit_button = '<a href="#" class="btn btn-primary btn-sm assign-to-me-btn" id="assign-ticket-btn-' . $ticket_id . '"> <i class="fas fa-pencil-alt"></i> Assign to me</a>';
	
			$edit_button .= '
							<link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" rel="stylesheet">
							<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
							<script>
											function toastifyTicketAssigned(ticketId, position) {
												var existingToast = document.querySelector(".toastify.toastify-top");
												if (existingToast) {
													existingToast.remove();
												}
												
												var toast = Toastify({
													text: "Ticket '. $row['ticket_number'].' Assigned Successfully!",
													duration: 2000,
													backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
													position: position,
												});
												toast.showToast();
											}
											
											$(document).ready(function() {
															$("#assign-ticket-btn-' . $ticket_id . '").on("click", function(e) {
																			e.preventDefault();
																			var ticketId = ' . $ticket_id . ';
	
																			// Serialize the data attribute containing the ticket ID
																			var data = { ticket_id: ticketId };
	
																			// Send AJAX request to the backend
																			$.ajax({
																							url: "/ticketing_system/controllers/admin_assign_ticket_process.php",
																							type: "POST",
																							data: data,
																							success: function(response) {
																											if (response === "success") {
																												toastifyTicketAssigned(ticketId);
																												window.reloadDataTable();
																											} else {
																												// Show error message using Toastify
																												Toastify({
																																text: "Error assigning ticket. Please try again.",
																																duration: 2000,
																																gravity: "top",
																																position: "right",
																																backgroundColor: "red"
																												}).showToast();
																											}
																							},
																							error: function(xhr, status, error) {
																											// Show error message using Toastify
																											Toastify({
																															text: "Error assigning ticket: " + xhr.responseText,
																															duration: 3000,
																															close: true,
																															gravity: "top",
																															position: "right",
																															backgroundColor: "red"
																											}).showToast();
																							}
																			});
															});
											});
							</script>
			';
	
			return $edit_button;
	}
	


	),

	array(
		'db' => 'emp_users.emp_lastname',
		'dt' => 8,
		'field' => 'emp_lastname',
		'formatter' => function ($lab1, $row) {
			return $row['emp_lastname'];

		}
	),
);

// Database connection details
$sql_details = array(
	'user' => 'root',
	'pass' => '',
	'db' => 'ticket_system',
	'host' => 'localhost',
);

$admin_id = $_SESSION['admin_id'];

// Include the SSP class
require('../../../assets/datatables/ssp.class.php');

$where = "admin_id IS NULL";

$joinQuery = "FROM $table LEFT JOIN emp_users ON $table.emp_id = emp_users.emp_id";

// Fetch and encode data for DataTables with the filter
echo json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $where));

?>