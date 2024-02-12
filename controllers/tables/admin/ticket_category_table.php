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

			$modalId = 'ticket_category_modal_' . $ticket_category_id;

      $edit_button = '<a href="#" data-toggle="modal" data-target="#' . $modalId . '" class="btn btn-primary btn-sm view-ticket"><i class="fas fa-pencil-alt"></i> Edit</a>

      <!-- MODAL ADD TICKET -->
      <div class="modal fade" id="' . $modalId . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addItemModalLabel">Add Ticket Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
  
            <div class="modal-body" id="modal-body-' . $ticket_category_id . '">
  
              <form method="post" enctype="multipart/form-data">
  
                <div class="form-group">
                  <label for="ticket_category">Ticket Category:</label>
                  <input type="text" class="form-control" id="ticket_category" name="ticket_category"
                    placeholder="Enter Ticket Category" value="'. $row['ticket_category'] .'" required>
                </div>
  
                <!-- Add a hidden input field to submit the form with the button click -->
                <input type="hidden" name="add_tickets_category" value="1">
  
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
  
          </div>
        </div>
      </div>

      
      ';

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