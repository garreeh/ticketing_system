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
			return $row['ticket_description'];
		}
	),

	array(
		'db' => 'ticket_priority',
		'dt' => 3,
		'field' => 'ticket_priority',
		'formatter' => function ($lab5, $row) {
			return $row['ticket_priority'];
		}
	),

	array(
		'db' => 'ticket_status',
		'dt' => 4,
		'field' => 'ticket_status',
		'formatter' => function ($lab6, $row) {
			return $row['ticket_status'];
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

			// Create DateTime objects with the specified time zone
			$created_at = new DateTime($row['created_at'], $timezone);
			$current_time = new DateTime(null, $timezone);

			// Calculate the time difference
			$interval = $current_time->diff($created_at);

			// Format the time difference
			$formatted_time = '';

			if ($interval->y > 0) {
				$formatted_time = $interval->y . ' year' . ($interval->y > 1 ? 's' : '') . ' ago';
			} elseif ($interval->m > 0) {
				$formatted_time = $interval->m . ' month' . ($interval->m > 1 ? 's' : '') . ' ago';
			} elseif ($interval->d > 0) {
				$formatted_time = $interval->d . ' day' . ($interval->d > 1 ? 's' : '') . ' ago';
			} elseif ($interval->h > 0) {
				$formatted_time = $interval->h . ' hour' . ($interval->h > 1 ? 's' : '') . ' ago';
			} elseif ($interval->i > 0) {
				$formatted_time = $interval->i . ' minute' . ($interval->i > 1 ? 's' : '') . ' ago';
			} elseif ($interval->s > 0) {
				$formatted_time = $interval->s . ' second' . ($interval->s > 1 ? 's' : '') . ' ago';
			}

			return $formatted_time;
		}
	),

	array(
		'db' => 'ticket_id',
		'dt' => 7,
		'field' => 'ticket_id',
		'formatter' => function ($lab4, $row) {
			$ticket_id = $row['ticket_id'];
			$edit_button = '<a href="/ticketing_system/controllers/admin_assign_ticket_process.php?ticket_id=' . $ticket_id . '" class="btn btn-primary btn-sm"> <i class="fas fa-pencil-alt"></i> Edit</a>';
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

$user_id = $_SESSION['user_id'];
// Include the SSP class
require('../../../assets/datatables/ssp.class_with_where.php');

$where = "user_id = '$user_id' AND ticket_status = 'Pending'";

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