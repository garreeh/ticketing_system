<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
?>

<div class="modal fade" id="addTicketModal" tabindex="-1" role="dialog" aria-labelledby="addTicketModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTicketModalLabel">Add Ticket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="ticket_category">Ticket Category:</label>
            <select class="form-control" id="ticketCategory" name="ticket_category" required>
              <?php
                $sql = "SELECT * FROM ticket_category";
                $result = $conn->query($sql);
                while ($row = $result->fetch_array()) {
                  echo "<option value=\"" . htmlspecialchars($row['ticket_category']) . "\"> " . htmlspecialchars($row['ticket_category']) . "</option>";
                }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="ticket_description">Ticket Description:</label>
            <textarea class="form-control" id="ticketDescription" name="ticket_description"
              placeholder="Enter Ticket Description" rows="4" cols="50" required></textarea>
          </div>

          <div class="form-group">
            <label for="ticket_priority">Ticket Priority:</label>
            <select class="form-control" id="ticketPriority" name="ticket_priority" required>
              <option value="Normal">Normal</option>
              <option value="Priority">Priority</option>
              <option value="Urgent">Urgent</option>
            </select>
          </div>

          <select class="form-control" id="adminID" name="admin_id" required>
            <option value="null">Anyone</option>
            <?php
              $sql = "SELECT * FROM admin_user";
              $result = $conn->query($sql);

              while ($row = $result->fetch_array()) {
                echo "<option value=\"" . htmlspecialchars($row['admin_fullname']) . "\"> " . htmlspecialchars($row['admin_fullname']) . "</option>";
              }
            ?>
          </select>

          <!-- Add a hidden input field to submit the form with the button click -->
          <input type="hidden" name="add_tickets" value="1">

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add</button> <!-- Change button type to submit -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Toastify JS -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
  $(document).ready(function() {
    $('#addTicketModal form').submit(function(event) {
      event.preventDefault(); // Prevent default form submission
      
      // Store a reference to $(this)
      var $form = $(this);
      
      // Serialize form data
      var formData = $form.serialize();

      // Send AJAX request
      $.ajax({
        type: 'POST',
        url: '/ticketing_system/controllers/add_ticket_process.php',
        data: formData,
        success: function(response) {
          // Handle success response
          console.log(response); // Log the response for debugging
          response = JSON.parse(response);
          if (response.success) {
            Toastify({
              text: response.message,
              duration: 3000,
              backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)"
            }).showToast();
            
            // Optionally, reset the form
            $form.trigger('reset');
            
            // Optionally, close the modal
            $('#addTicketModal').modal('hide');
            
            // Optionally, reload the DataTable or update it with the new data
            // Example: $('#dataTable').DataTable().ajax.reload();
          } else {
            Toastify({
              text: response.message,
              duration: 3000,
              backgroundColor: "linear-gradient(to right, #ff6a00, #ee0979)"
            }).showToast();
          }
        },
        error: function(xhr, status, error) {
          // Handle error response
          console.error(xhr.responseText);
          Toastify({
            text: "Error occurred while adding ticket. Please try again later.",
            duration: 3000,
            backgroundColor: "linear-gradient(to right, #ff6a00, #ee0979)"
          }).showToast();
        }
      });
    });
  });
</script>

