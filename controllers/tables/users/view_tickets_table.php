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
											<h5 class="modal-title" id="exampleModalLabel">Ticket Description</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
											</button>
									</div>
									<div class="modal-body">
											<!-- Modal content goes here -->
											<p>' . $row['ticket_description'] .'</p>
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
    'db' => 'admin_user.admin_fullname',
    'dt' => 5,
    'field' => 'admin_fullname',
    'formatter' => function ($lab6, $row) {
        if (empty($row['admin_fullname'])) {
            return "Anyone";
        } else {
            return $row['admin_fullname'];
        }
    }
	),


	array(
		'db' => 'tickets.created_at',
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
			include './../../../connections/connections.php';

			$modalId = 'ticket_edit_modal_' . $row['ticket_id'];

			// Start the HTML string
			$html = '<a href="#" class="view-ticket btn btn-primary btn-sm" data-toggle="modal" data-target="#' . $modalId . '"><i class="fas fa-pencil-alt"></i> Edit</a>';

			$html .= '<div class="modal fade" id="'. $modalId . '" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="' . $modalId . '">Edit Ticket</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
											</div>
											<div class="modal-body">
												<form action="process_form.php" method="post" enctype="multipart/form-data">
													<div class="form-group">
														<label for="ticket_category">Ticket Category:</label>
														<select class="form-control" id="ticket_category" name="ticket_category" required>';

														// Append the options using PHP loop
														$sql = "SELECT * FROM ticket_category";
														$result = $conn->query($sql);
														$current_category = "ticket_category"; // Assuming you have the current category stored somewhere
														
														while ($category = $result->fetch_array()) {
																$category_name = htmlspecialchars($category['ticket_category']);
																$selected = ($category_name == $current_category) ? 'selected' : '';
																$html .= '<option value="' . $category_name . '" ' . $selected . '> ' . $category_name . '</option>';
														}

			// Continue with the HTML string
			$html .= '</select>
								</div>
								<div class="form-group">
									<label for="ticket_description">Ticket Description:</label>
									<textarea class="form-control" id="ticket_description" name="ticket_description" placeholder="Enter Ticket Description" rows="4" cols="50" required>' . htmlspecialchars($row['ticket_description']) . '</textarea>
								</div>
								<div class="form-group">
									<label for="ticket_priority">Ticket Priority:</label>
									<select class="form-control" id="ticket_priority" name="ticket_priority" required>
										<option value="Normal"' . (($row['ticket_priority'] === 'Normal') ? ' selected' : '') . '>Normal</option>
										<option value="Priority"' . (($row['ticket_priority'] === 'Priority') ? ' selected' : '') . '>Priority</option>
										<option value="Urgent"' . (($row['ticket_priority'] === 'Urgent') ? ' selected' : '') . '>Urgent</option>
									</select>
								</div>
								<select class="form-control" id="admin_id" name="admin_id" required>
												<option value="null">Anyone</option>';

			// Append options for admin_id
			$sql_admin = "SELECT * FROM admin_user";
			$result_admin = $conn->query($sql_admin);
			while ($admin = $result_admin->fetch_array()) {
					$html .= '<option value="' . htmlspecialchars($admin['admin_fullname']) . '"> ' . htmlspecialchars($admin['admin_fullname']) . '</option>';
			}
		
			// Complete the HTML string
			$html .= '</select>
								<!-- Add a hidden input field to submit the form with the button click -->
								<input type="hidden" name="add_tickets" value="1">
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

			// Return the HTML string
			return $html;

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
require('../../../assets/datatables/ssp.class.php');


$where = "user_id = $user_id AND ticket_status = 'Pending'";

$joinQuery = "FROM $table LEFT JOIN admin_user ON $table.admin_id = admin_user.admin_id";

// Fetch and encode data for DataTables with the filter
echo json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $where));

// function getAdminFullname($admin_id)
// {
//     include '../../../connections/connections.php';

//     // Your SQL query to get admin_fullname from admin_user
//     $query = "SELECT admin_fullname FROM admin_user WHERE admin_id = '$admin_id'";

//     // Assume $result contains the fetched result
//     $result = $conn->query($query);
//     $row = $result->fetch_assoc();

//     // Close the database connection
//     $conn->close();

//     return ($row !== null) ? $row['admin_fullname'] : "Anyone";
// }

?>