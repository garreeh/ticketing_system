<?php
session_start();
include './../connections/connections.php';

if (isset($_POST['username_or_email'], $_POST['emp_password'])) {
	$usernameOrEmail = $conn->real_escape_string($_POST['username_or_email']);
	$emp_password = $conn->real_escape_string($_POST['emp_password']);

	// Select the user with the given username or email and matching password
	$query = "SELECT * FROM `emp_users` WHERE (`emp_username`='$usernameOrEmail' OR `emp_email`='$usernameOrEmail') AND `emp_password`='$emp_password'";
	$result = mysqli_query($conn, $query);

	if ($result) {
		$row = mysqli_fetch_assoc($result);

		if ($row) {
			// Username/email and password combination exists in the database
			// Set session variables
			$_SESSION['emp_id'] = $row['emp_id'];
			$_SESSION['emp_email'] = $row['emp_email'];
			$_SESSION['emp_username'] = $row['emp_username'];
			$_SESSION['emp_firstname'] = $row['emp_firstname'];
			$_SESSION['emp_lastname'] = $row['emp_lastname'];

			// Return a success message
			echo json_encode(['success' => true]);
			exit();
		} else {
			// Combination of username/email and password not found in the database
			echo json_encode(['success' => false, 'message' => 'Invalid username/email or password. Please try again.']);
			exit();
		}
    } else {
			// Error executing query
			echo json_encode(['success' => false, 'message' => 'Error executing query: ' . mysqli_error($conn)]);
			exit();
    }
	}

?>
