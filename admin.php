<?php
include './connections/connections.php';

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION['admin_id'])) {
	header("Location: /ticketing_system/views/admin/admin_dashboard.php");
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

	<title>Admin - Login</title>

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

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Help Desk | Admin Login</h1>
									</div>

									<form class="user" id="loginForm" onsubmit="submitForm(); return false;">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" placeholder="Enter Email | Username"
												name="username_or_email" id="username_or_email" value="" required>
										</div>

										<div class="form-group">
											<div class="input-group">
												<input type="password" class="form-control form-control-user" placeholder="Password"
													name="admin_password" id="admin_password" required>
												<div class="input-group-append">
													<span class="input-group-text" id="togglePassword">
														<i class="fa fa-eye" aria-hidden="true"></i>
													</span>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="customCheck"
													onchange="toggleRememberMe()">
												<label class="custom-control-label" for="customCheck">Remember Me</label>
											</div>

											<input type="hidden" id="remember_me" name="remember_me" value="0">
										</div>

										<button type="button" class="btn btn-primary btn-user btn-block"
											onclick="submitForm()">Login</button>
										<hr>
									</form>

									<div class="text-center">
										<a class="small" href="./views/admin/admin_forgot_password.php">Forgot Password?</a>
										</br>
										<a class="small" href="/ticketing_system/index.php">Go to User Login</a>
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
			var passwordInput = document.getElementById('admin_password');
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

	function toggleRememberMe() {
		var rememberMeCheckbox = document.getElementById('customCheck');
		var rememberMeInput = document.getElementById('remember_me');

		// Check if rememberMeInput is not null
		if (rememberMeInput !== null) {
			rememberMeInput.value = rememberMeCheckbox.checked ? "1" : "0";
		}

		console.log(rememberMeInput);
	}


	function submitForm() {
		// Get form data
		var usernameOrEmail = document.getElementById('username_or_email').value;
		var admin_password = document.getElementById('admin_password').value;
		var rememberMe = document.getElementById('remember_me').value;

		// Create a new FormData object
		var formData = new FormData();
		formData.append('username_or_email', usernameOrEmail);
		formData.append('admin_password', admin_password);
		formData.append('remember_me', rememberMe);
		// Create and configure an XMLHttpRequest object
		var xhr = new XMLHttpRequest();
		xhr.open('POST', './controllers/admin_login_process.php', true);

		xhr.onload = function () {

			if (xhr.status === 200) {
				var response = JSON.parse(xhr.responseText);
				console.log(response)
				if (response.success) {
					window.location.href = "/ticketing_system/views/admin/admin_dashboard.php";
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

</script>

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
			/* Adjust as needed */
		}
	}
</style>