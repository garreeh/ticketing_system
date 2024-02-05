<?php
// Start the session
session_start();

// Define table and primary key
$table = 'tickets';
$primaryKey = 'ticket_id';
// Define columns for DataTables
$columns = array(
	array(
		'db' => 'user_id',
		'dt' => 0,
		'field' => 'user_id',
		'formatter' => function ($lab1, $row) {
			$user_id = $row['user_id'];

			// Fetch user_firstname from z_users based on user_id
			$user_fullname = getUserFullname($user_id);

			return $user_fullname;
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
			return $row['ticket_description'];
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
			$edit_button = '<a href="/ticketing_system/controllers/admin_closed_ticket_process.php?ticket_id=' . $ticket_id . '" class="btn btn-primary btn-sm"> <i class="fas fa-pencil-alt"></i> Mark as done</a>';
			return $edit_button;
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
require('../../../assets/datatables/ssp.class_with_where.php');

$where = "admin_id = '$admin_id' AND ticket_status = 'Pending'";

// Fetch and encode data for DataTables
echo json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, $where));

function getUserFullname($user_id)
{

	include '../../../connections/connections.php';
	// Your SQL query to get user_firstname from z_users
	$query = "SELECT user_firstname, user_lastname FROM z_user WHERE user_id = $user_id";

	// Assume $result contains the fetched result
	$result = $conn->query($query);
	$row = $result->fetch_assoc();

	// Close the database connection
	$conn->close();

	return ($row !== null) ? $row['user_firstname'] . ' ' . $row['user_lastname'] : null;

}
?>