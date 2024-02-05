<?php
// Start the session
session_start();

// Define table and primary key
$table = 'ticket_category';
$primaryKey = 'ticket_category_id';
// Define columns for DataTables
$columns = array(

  array(
    'db' => 'ticket_category_id',
    'dt' => 0,
    'field' => 'ticket_category_id',
    'formatter' => function ($lab1, $row) {
      return $row['ticket_category_id'];
    }
  ),

  array(
    'db' => 'ticket_category',
    'dt' => 1,
    'field' => 'ticket_category',
    'formatter' => function ($lab2, $row) {
      return $row['ticket_category'];
    }
  ),

  array(
    'db' => 'created_at',
    'dt' => 2,
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
    'db' => 'ticket_category_id',
    'dt' => 3,
    'field' => 'ticket_category_id',
    'formatter' => function ($lab4, $row) {
      $ticket_category_id = $row['ticket_category_id'];
      $edit_button = '<a href="edit_ticket_category.php?ticket_category_id=' . $ticket_category_id . '" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>';

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

$where = "ticket_category_id > '0'";

// Fetch and encode data for DataTables
echo json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, $where));
?>