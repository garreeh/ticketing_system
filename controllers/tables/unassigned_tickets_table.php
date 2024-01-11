<?php
// Start the session
session_start();

// Define table and primary key
$table = 'tickets';
$primaryKey = 'ticket_id';
$fullname = 'z_user.user_firstname' && 'z_user.user_lastname';
// Define columns for DataTables
$columns = array(
	array(
		'db' => $fullname,
		'dt' => 0,
		'field' => 'user_firstname',
		'formatter' => function ($lab1, $row) {
			return $row['user_firstname'];
		}
	),

	array(
		'db' => 'ticket_number',
		'dt' => 1,
		'field' => 'ticket_number',
		'formatter' => function ($lab1, $row) {
			return $row['ticket_number'];
		}
	),

	array(
		'db' => 'ticket_category',
		'dt' => 2,
		'field' => 'ticket_category',
		'formatter' => function ($lab1, $row) {
			return $row['ticket_category'];
		}
	),

	array(
		'db' => 'ticket_description',
		'dt' => 3,
		'field' => 'ticket_description',
		'formatter' => function ($lab1, $row) {
			return $row['ticket_description'];
		}
	),

	array(
		'db' => 'ticket_priority',
		'dt' => 4,
		'field' => 'ticket_priority',
		'formatter' => function ($lab1, $row) {
			return $row['ticket_priority'];
		}
	),

	array(
		'db' => 'ticket_status',
		'dt' => 5,
		'field' => 'ticket_status',
		'formatter' => function ($lab1, $row) {
			return $row['ticket_status'];
		}
	),

	array(
		'db' => 'created_at',
		'dt' => 6,
		'field' => 'created_at',
		'formatter' => function ($lab1, $row) {
			return $row['created_at'];
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
require('../../assets/datatables/ssp.class_with_join.php');

// LEFT JOIN query
$joinQuery = "FROM `$table`
LEFT JOIN z_user ON tickets.user_id = z_user.user_id WHERE admin_id = '$admin_id'";

// Fetch and encode data for DataTables
echo json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery));
?>