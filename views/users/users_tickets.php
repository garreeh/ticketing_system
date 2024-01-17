<?php
include './../../connections/connections.php';
include './../../controllers/add_ticket_process.php';


if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user_id'])) {
  header("Location: /ticketing_system/index.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="./../../assets/img/favicon.ico" rel="icon">


  <title>Pendragon | Help Desk</title>

  <link href="./../../assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="./../../assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include './../../includes/user_navigation.php'; ?>
    <!-- End of Sidebar -->

    <!-- MODAL ADD TICKET -->
    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addItemModalLabel">Add Ticket</h5>
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

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <?php include './../../includes/user_topbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Tickets</h1>
          </div>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mb-4" data-toggle="modal"
            data-target="#addItemModal"> <i class="fas fa-plus"></i> Issue Ticket</a>
          <a href="./../../excels/users_tickets_export.php"
            class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mb-4"><i class="fas fa-file-excel"></i>
            Export Excel</a>

          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="tab-pane fade show active" id="aa" role="tabpanel" aria-labelledby="aa-tab">
                <div class="table-responsive">
                  <table class="table custom-table table-hover" name="view_tickets" id="view_tickets">
                    <thead>
                      <tr>
                        <th>Ticket Number</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Assigned to</th>
                        <th>Date Created</th>
                        <th>Manage</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include './../../includes/footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="./../../assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="./../../assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./../../assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="./../../assets/admin/js/sb-admin-2.min.js"></script>

  <!-- Data tables -->
  <link rel="stylesheet" type="text/css" href="./../../assets/datatables/datatables.min.css" />
  <script type="text/javascript" src="./../../assets/datatables/datatables.min.js"></script>

</body>

</html>

<script>
  $(document).ready(function () {
    $('#view_tickets').dataTable({
      "pagingType": "numbers",
      "processing": true,
      "serverSide": true,
      "ajax": "./../../controllers/tables/users/view_tickets_table.php"
    });
  });
</script>