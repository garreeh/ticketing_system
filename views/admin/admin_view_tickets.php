<?php
include './../../connections/connections.php';

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['admin_id'])) {
  header("Location: /ticketing_system/admin.php");
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
    <?php include './../../includes/admin_navigation.php'; ?>
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

        </div>
      </div>
    </div>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <?php include './../../includes/admin_topbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">TICKETS ASSIGNED TO YOU</h1>
          </div>
          <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mb-4" data-toggle="modal"
            data-target="#addItemModal"> <i class="fas fa-plus"></i> Issue Ticket</a> -->
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mb-4"><i class="fas fa-file-excel"></i> Export Excel</a>

          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>

                      <tr>
                        <th>Client Fullname</th>
                        <th>Ticket Number</th>
                        <th>Ticket Category</th>
                        <th>Ticket Description</th>
                        <th>Ticket Priority</th>
                        <th>Ticket Status</th>
                        <th>Date Created</th>
                        <th>Operations</th>
                      </tr>

                    </thead>
                    <tbody>
                      <?php

                      if (!isset($_SESSION['admin_id'])) {
                        header("Location: /ticketing_system/admin.php");
                        exit();
                      }

                      $admin_id = $_SESSION['admin_id'];

                      $select_query = "SELECT tickets.*, z_user.user_firstname, z_user.user_lastname 
                      FROM tickets 
                      LEFT JOIN z_user ON tickets.user_id = z_user.user_id
                      WHERE tickets.admin_id = '$admin_id'";
                      $result = mysqli_query($conn, $select_query);

                      while ($row = mysqli_fetch_assoc($result)) {
                        $user_firstname = $row['user_firstname'];
                        $user_lastname = $row['user_lastname'];
                        $ticket_id = $row['ticket_id'];
                        $ticket_number = $row['ticket_number'];
                        $ticket_category = $row['ticket_category'];
                        $ticket_description = $row['ticket_description'];
                        $ticket_priority = $row['ticket_priority'];
                        $ticket_status = $row['ticket_status'];
                        $created_at = $row['created_at'];

                        ?>
                        <tr>

                          <td>
                            <a href="#" data-toggle="modal"
                              data-target="#updateModal_<?php echo $user_firstname . " " . $user_lastname; ?>">
                              <?php echo $user_firstname . " " . $user_lastname; ?>
                            </a>
                          </td>

                          <td> <a href="#" data-toggle="modal" data-target="#updateModal_<?php echo $ticket_number; ?>">
                              <?php echo $ticket_number; ?>
                            </a>
                          </td>

                          <td> <a href="#" data-toggle="modal" data-target="#updateModal_<?php echo $ticket_category; ?>">
                              <?php echo $ticket_category; ?>
                            </a>
                          </td>

                          <td> <a href="#" data-toggle="modal"
                              data-target="#updateModal_<?php echo $ticket_description; ?>">
                              <?php echo $ticket_description; ?>
                            </a>
                          </td>

                          <td> <a href="#" data-toggle="modal" data-target="#updateModal_<?php echo $ticket_priority; ?>">
                              <?php echo $ticket_priority; ?>
                            </a>
                          </td>

                          <td> <a href="#" data-toggle="modal" data-target="#updateModal_<?php echo $ticket_status; ?>">
                              <?php echo $ticket_status; ?>
                            </a>
                          </td>

                          <td> <a href="#" data-toggle="modal" data-target="#updateModal_<?php echo $created_at; ?>">
                              <?php echo $created_at; ?>
                            </a>
                          </td>

                          <td>
                            <a href="#" id="operations" class="btn btn-sm btn-info shadow-sm" data-toggle="modal"
                              data-target="#updateModal_<?php echo $ticket_id; ?>">Mark as done</a>
                            <a href="./../../controllers/admin_delete_tickets_process.php?ticket_id=<?php echo $ticket_id; ?>"
                              id="operations" class="btn btn-sm btn-danger shadow-sm">Delete</a>
                          </td>
                        </tr>
                      <?php } ?>

                    </tbody>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script src="./../../assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="./../../assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./../../assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="./../../assets/admin/js/sb-admin-2.min.js"></script>

</body>

</html>

<script>

  $(document).ready(function () {
    // Show the selected file name in the custom file input
    $("#fileToUpload").change(function () {
      var fileName = $(this).val().split("\\").pop();
      $(this).next(".custom-file-label").html(fileName);
    });
  });

  function incrementQuantity() {
    var quantityInput = document.getElementById('add_product_qty');
    var currentQuantity = parseInt(quantityInput.value) || 0;
    quantityInput.value = currentQuantity + 1;
  }

  function decrementQuantity() {
    var quantityInput = document.getElementById('add_product_qty');
    var currentQuantity = parseInt(quantityInput.value) || 0;
    // Ensure the quantity doesn't go below zero
    quantityInput.value = Math.max(0, currentQuantity - 1);
  }
</script>

<style>
  #add_product_qty,
  #add_product_price {
    /* For Firefox */
    -moz-appearance: textfield;

    /* For other browsers */
    appearance: textfield;

    /* For Webkit browsers like Chrome and Safari */
    -webkit-appearance: none;
    margin: 0;
  }

  #add_product_qty::-webkit-inner-spin-button,
  #add_product_qty::-webkit-outer-spin-button,
  #add_product_price::-webkit-inner-spin-button,
  #add_product_price::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
</style>