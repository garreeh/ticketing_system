<?php
include './../../connections/connections.php';
include './../../controllers/user_fetch_tickets_process.php';

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

  <title>Pendragon | Help Desk</title>

  <!-- Custom fonts for this template-->
  <link href="./../../assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div id="clockAndDate" class="h1 mb-0 font-weight-bold text-gray-800"></div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Active Tickets Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        My Total Active Tickets</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $activeTicketsCount; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Urgent Tickets Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        My Urgent Tickets</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $urgent_count; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Priority Tickets Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">My Priority Tickets
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $priority_count; ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
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

  <!-- Bootstrap core JavaScript-->
  <script src="./../../assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="./../../assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="./../../assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="./../../assets/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="./../../assets/admin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="./../../assets/admin/js/demo/chart-area-demo.js"></script>
  <script src="./../../assets/admin/js/demo/chart-pie-demo.js"></script>

</body>

</html>

<!-- Running Clock Script -->
<script>
  function updateClockAndDate() {
    var now = new Date();
    var hours = now.getHours();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12 || 12; // Convert 24-hour time to 12-hour time
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var month = monthNames[now.getMonth()];
    var day = now.getDate();
    var year = now.getFullYear();

    // Format the time (add leading zero if needed)
    var formattedTime = hours + ":" + (minutes < 10 ? "0" : "") + minutes + ":" + (seconds < 10 ? "0" : "") + seconds + " " + ampm;

    // Format the date
    var formattedDate = month + " " + day + ", " + year;

    // Update the clock and date elements
    document.getElementById("clockAndDate").innerText = formattedTime + " | " + formattedDate;

    // Update the clock and date every second
    setTimeout(updateClockAndDate, 1000);
  }

  // Initial call to start the clock and date
  updateClockAndDate();
</script>