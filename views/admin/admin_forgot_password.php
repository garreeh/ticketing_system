<?php
include './../../connections/connections.php';

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (!isset($_SESSION['admin_id'])) {
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

	<title>Ticket | Settings</title>

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
		<?php include './../../includes/admin_navigation.php'; ?>
		<!-- End of Sidebar -->

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
						<h1 class="h3 mb-0 text-gray-800">Settings</h1>
					</div>

					<!-- Content Row -->
					<div class="row">

						<!-- Active Tickets Card -->
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-xl-9 col-md-12">
									<div class="card border-left-primary shadow h-100 py-2">
										<div class="card-body">
											<form action="change_password.php" method="post">
												<div class="form-group">
													<label for="currentPassword">Current Password</label>
													<input type="password" class="form-control" id="currentPassword" name="currentPassword"
														required>
												</div>
												<div class="form-group">
													<label for="newPassword">New Password</label>
													<input type="password" class="form-control" id="newPassword" name="newPassword" required>
												</div>
												<div class="form-group">
													<label for="confirmPassword">Confirm New Password</label>
													<input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
														required>
												</div>
												<button type="submit" class="btn btn-primary">Change Password</button>
											</form>
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