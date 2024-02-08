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
            <select class="form-control" id="ticket_category" name="ticket_category" required>
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
            <textarea class="form-control" id="ticket_description" name="ticket_description"
              placeholder="Enter Ticket Description" rows="4" cols="50" required></textarea>
          </div>

          <div class="form-group">
            <label for="ticket_priority">Ticket Priority:</label>
            <select class="form-control" id="ticket_priority" name="ticket_priority" required>
              <option value="Normal">Normal</option>
              <option value="Priority">Priority</option>
              <option value="Urgent">Urgent</option>
            </select>
          </div>

          <select class="form-control" id="admin_id" name="admin_id" required>
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
            <button type="submit" class="btn btn-primary">Add</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>