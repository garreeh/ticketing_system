<?php
include './connections/connections.php';

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION['emp_id'])) {
	header("Location: /ticketing_system/views/users/users_dashboard.php");
	exit();
} else if (isset($_SESSION['admin_id'])) {
	header("Location: /ticketing_system/views/admin/admin_dashboard.php");
  exit();
}
?>

<style>
	#togglePassword {
		cursor: pointer;
	}

	.custom-form-container {
		border: 1px solid #ced4da;
		border-radius: 8px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		background-color: whitesmoke;
		padding: 20px;
		margin-top: 50px;
	}

	/* Custom style to make the toast red */
	#incorrectPasswordToast,
	#userNotFoundToast {
		position: fixed;
		background-color: #dc3545;
		color: #fff;
	}

	@media (max-width: 576px) {
		#passwordMismatchToast {
			width: 100%;
			right: 0;
			margin: 0;
			transform: none;
			top: 70px;
		}
	}

	/* For Loading Spinner */
	body {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
		margin: 0;
  }

  #content {
    display: none;
  }
</style>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Help Desk - Login</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	<!-- Custom fonts for this template-->
	<link href="./assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="./assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

	<div class="spinner-grow" role="status">
    <span class="sr-only">Loading...</span>
  </div>

	<div class="container" id="content">
		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Help Desk | User Login</h1>
									</div>

									<form class="user" id="loginForm" onsubmit="submitForm(); return false;">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" placeholder="Enter Email | Username"
												name="username_or_email" id="username_or_email" value="" required>
										</div>

										<div class="form-group">
											<div class="input-group">
												<input type="password" class="form-control form-control-user" placeholder="Password"
													name="emp_password" id="emp_password" required>
												<div class="input-group-append">
													<span class="input-group-text" id="togglePassword">
														<i class="fa fa-eye" aria-hidden="true"></i>
													</span>
												</div>
											</div>
										</div>

										<!-- <div class="form-group">
											<div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="customCheck">
												<label class="custom-control-label" for="customCheck">Remember
													Me</label>
											</div>
										</div> -->

										<!-- Visible button for click event -->
										<button type="button" class="btn btn-primary btn-user btn-block"
											onclick="submitForm()">Login</button>
										<hr>
									</form>

									<div class="text-center">
										<a class="small" href="forgot-password.html">Forgot Password? Contact Us</a>
										</br>
										<a class="small" href="/ticketing_system/admin.php">Go to Admin Login</a>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>
	<!-- Bootstrap core JavaScript-->
	<script src="./assets/admin/vendor/jquery/jquery.min.js"></script>
	<script src="./assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="./assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="./assets/admin/js/sb-admin-2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</body>

</html>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		document.getElementById('togglePassword').addEventListener('click', function () {
			var passwordInput = document.getElementById('emp_password');
			var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
			passwordInput.setAttribute('type', type);
			var icon = document.querySelector('#togglePassword i');
			icon.classList.toggle('fa-eye-slash');
		});

	});

	document.getElementById('loginForm').addEventListener('keydown', function (e) {
		if (e.key === 'Enter') {
			submitForm();
		}
	});
	// KABOBOHAN SA TOAST
	function showToast(message) {
		Toastify({
			text: message,
			duration: 3000,
			close: true,
			gravity: 'top',
			position: 'right',
			backgroundColor: 'red',
		}).showToast();
	}

	function submitForm() {
		// Get form data
		var usernameOrEmail = document.getElementById('username_or_email').value;
		var emp_password = document.getElementById('emp_password').value;

		// Create a new FormData object
		var formData = new FormData();
		formData.append('username_or_email', usernameOrEmail);
		formData.append('emp_password', emp_password);

		// Create and configure an XMLHttpRequest object
		var xhr = new XMLHttpRequest();
		xhr.open('POST', './controllers/user_login_process.php', true);

		xhr.onload = function () {
			if (xhr.status === 200) {

				var response = JSON.parse(xhr.responseText);
				console.log(response)
				if (response.success) {
					window.location.href = "/ticketing_system/views/users/users_dashboard.php";
				} else {
					showToast(response.message);
				}
			} else {
				showToast('Error occurred while processing the request.');
			}
		};

		xhr.onerror = function () {
			// Network error, show toast
			showToast('Network error occurred.');
		};

		// Send the FormData object with the POST request
		xhr.send(formData);
	}

	// For Loader Spinner
	document.addEventListener("DOMContentLoaded", function() {
		setTimeout(function() {
			// Hide the spinner
			document.querySelector('.spinner-grow').style.display = 'none';
			// Show the content
			document.getElementById('content').style.display = 'block';
		}, 1000);
	});
</script>