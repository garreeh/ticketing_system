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
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addItemModalLabel">Add Ticket Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
  
            <div class="modal-body">
  
              <form id="edit-category-form-' . $row['ticket_category_id'] . '"  method="post" enctype="multipart/form-data">
                <input type="hidden" name="ticket_category_id" value="' . $row['ticket_category_id'] . '">
  
                <div class="form-group">
                  <label for="ticket_category">Ticket Category:</label>
                  <input type="text" class="form-control" id="ticket_category" name="ticket_category"
                    placeholder="Enter Ticket Category" value="'. $row['ticket_category'] .'" required>
                </div>
  
                <!-- Add a hidden input field to submit the form with the button click -->
                <input type="hidden" name="edit_ticket_category" value="1">
  
                <div class="modal-footer">
                  <button id="save-ticket-category-btn-' . $row['ticket_category_id'] . '" type="button" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                
              </form>
            </div>
  
          </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

      <script>
      function toastifyTicketCategoryUpdated(ticketId) {
          var toast = Toastify({
            text: "Ticket Category Updated Successfully!",
            duration: 2000,
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)"
          });
          toast.showToast();
      }
  
      function submitForm(ticketId) {
          var formData = $("#edit-category-form-" + ticketId).serialize(); // Serialize form data
  
          $.ajax({
              type: "POST",
              url: "./../../controllers/admin_edit_category_process.php",
              data: formData,
              success: function(response) {
                  console.log("AJAX Success:", response); // Log the response for debugging
                  var data = JSON.parse(response); // Parse JSON response
  
                  // Show Toastify notification based on response
                  if (data.success) {
                    toastifyTicketCategoryUpdated(ticketId);
                      var ticket = response.ticket;
                      document.getElementById("ticket_category").value = ticket_category;

                      if (data.close_modal) {
                          $("#ticket_category_modal_" + ticketId).modal("hide"); // Close the modal after successful update
                          window.reloadDataTable();
                      }
                  } else {
                      console.error("AJAX Error:", data.message); // Log error message for debugging
                  }
              },
              error: function(xhr, status, error) {
                  console.error("AJAX Error:", error); // Log error message for debugging
              }
          });
      }
  
      // Function to handle form submission and show Toastify notification
      function handleFormSubmission(ticketId) {
          submitForm(ticketId);
      }
  
      // Add event listener to the save button to handle form submission and close the modal
      document.getElementById("save-ticket-category-btn-' . $row['ticket_category_id'] . '").addEventListener("click", function() {
          handleFormSubmission(' . $row['ticket_category_id'] . ');
          $("#ticket_category_modal_' . $row['ticket_category_id'] . '").modal("hide"); // Close the modal after successful update
      });
   </script>
      
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