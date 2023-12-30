<?php
session_start();
include './../connections/connections.php';

if (isset($_POST['username_or_email'], $_POST['admin_password'])) {
  $usernameOrEmail = $conn->real_escape_string($_POST['username_or_email']);
  $admin_password = $_POST['admin_password'];
  $rememberMe = $_POST['remember_me'];

  // Check if the input is a valid email address
  if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
    $condition = "`admin_email`='$usernameOrEmail'";
  } else {
    $condition = "`admin_username`='$usernameOrEmail'";
  }

  $query = "SELECT * FROM `admin_user` WHERE $condition";
  $result = mysqli_query($conn, $query);

  if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row) {
      // Directly compare the input password with the value in the database
      if ($admin_password == $row["admin_confirm_password"]) {
        // Password is correct, set session variables
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['admin_fullname'] = $row['admin_fullname'];
        $_SESSION['admin_email'] = $row['admin_email'];
        $_SESSION['admin_username'] = $row['admin_username'];
        // Return a success message
        echo json_encode(['success' => true]);

        // Set cookie if "Remember Me" is checked
        if ($rememberMe == "1") {
          // Generate a random token
          $token = bin2hex(random_bytes(32));

          // Hash the token before storing it in the database
          $hashedToken = password_hash($token, PASSWORD_DEFAULT);

          // Update the token in the database for the user
          $updateQuery = "UPDATE `admin_user` SET `remember_me`='$hashedToken' WHERE `admin_id`={$row['admin_id']}";
          $updateResult = mysqli_query($conn, $updateQuery);

          if (!$updateResult) {
            // Error updating token in the database, return an error message
            echo json_encode(['success' => false, 'message' => 'Error updating remember token: ' . mysqli_error($conn)]);
            exit();
          }

          // Set the cookie
          setcookie('remember_me', $token, time() + (86400 * 30), "/"); // 30 days expiration
        }
        exit();
      } else {
        // Incorrect username/email or password, return a generic error message
        echo json_encode(['success' => false, 'message' => 'Incorrect password. Please try again.']);
        exit();
      }
    } else {
      // User not found, return a generic error message
      echo json_encode(['success' => false, 'message' => 'Incorrect username/email. Please try again.']);
      exit();
    }
  } else {
    // Error executing query, return an error message
    echo json_encode(['success' => false, 'message' => 'Error executing query: ' . mysqli_error($conn)]);
    exit();
  }
}
?>