<?php
include './../../connections/connections.php';


if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['emp_id'])) {
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
            <h1 class="h3 mb-0 text-gray-800">My Closed Tickets</h1>
          </div>
          <a href="./../../excels/users_closed_tickets_export.php"
            class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mb-4"><i class="fas fa-file-excel"></i>
            Export Excel</a>

          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="tab-pane fade show active" id="aa" role="tabpanel" aria-labelledby="aa-tab">
                <div class="table-responsive">
                  <table class="table custom-table table-hover" name="closed_tickets_user" id="closed_tickets_user">
                    <thead>
                      <tr>
                        <th>Ticket Number</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Closed by</th>
                        <th>Date Created</th>
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
  $('#sidebarToggle').click(function () {
    $('#closed_tickets_user').css('width', '100%');
    // console.log(table) //This is for testing only
  });
  
  $(document).ready(function () {
    $('#closed_tickets_user').dataTable({
      "pagingType": "numbers",
      "processing": true,
      "serverSide": true,
      "ajax": "./../../controllers/tables/users/closed_ticket_table.php",
      "order": [[6, 'desc']], // Set the initial order to descending for the first column (index 0)

    });
  });
</script>