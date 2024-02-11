<?php
// Start the session
session_start();

// Define table and primary key
$table = 'tickets';
$primaryKey = 'ticket_id';
// Define columns for DataTables
$columns = array(

	array(
		'db' => 'ticket_number',
		'dt' => 0,
		'field' => 'ticket_number',
		'formatter' => function ($lab2, $row) {
			return $row['ticket_number'];
		}
	),

	array(
		'db' => 'ticket_category',
		'dt' => 1,
		'field' => 'ticket_category',
		'formatter' => function ($lab3, $row) {
			return $row['ticket_category'];
		}
	),

	array(
    'db' => 'ticket_description',
    'dt' => 2,
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
    'dt' => 3,
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
    'dt' => 4,
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
    'db' => 'admin_id',
    'dt' => 5,
    'field' => 'admin_id',
    'formatter' => function ($lab6, $row) {
			$admin_id = $row['admin_id'];

			// Fetch admin_fullname from admin_user based on admin_id
			$admin_fullname = getAdminFullname($admin_id);

			// If admin_fullname is NULL or empty, set it to "Anyone"

			return $admin_fullname;
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

	//This is hidden to cal the ticket_id in the ticket_description column
	array(
		'db' => 'ticket_id',
		'dt' => 7,
		'field' => 'ticket_id',
		'formatter' => function ($lab3, $row) {
			return $row['ticket_id'];
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

$emp_id = $_SESSION['emp_id'];
// Include the SSP class
require('../../../assets/datatables/ssp.class_with_where.php');

$where = "emp_id = '$emp_id' AND ticket_status = 'Closed'";

// Fetch and encode data for DataTables
echo json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, $where));

function getAdminFullname($admin_id)
{
	include '../../../connections/connections.php';

	// Your SQL query to get admin_fullname from admin_user
	$query = "SELECT admin_fullname FROM admin_user WHERE admin_id = '$admin_id'";

	// Assume $result contains the fetched result
	$result = $conn->query($query);
	$row = $result->fetch_assoc();

	// Close the database connection
	$conn->close();

	return ($row !== null) ? $row['admin_fullname'] : "Anyone";
}


?>