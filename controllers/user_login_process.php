<?php
session_start();
include "../../connection/connect.php";

// if (isset($_POST['username_or_email'], $_POST['password'])) {
//   $usernameOrEmail = $con->real_escape_string($_POST['username_or_email']);
//   $password = $_POST['password'];

//   // Check if the input is a valid email address
//   if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
//     $condition = "`email`='$usernameOrEmail' OR `username`='$usernameOrEmail'";
//   } else {
//     $condition = "`username`='$usernameOrEmail' OR `email`='$usernameOrEmail'";
//   }

//   $query = "SELECT * FROM `client_registration` WHERE $condition";
//   $result = mysqli_query($con, $query);

//   if ($result) {
//     $row = mysqli_fetch_assoc($result);

//     if ($row) {
//       if (password_verify($password, $row['password'])) {
//         // Password is correct, set session variables
//         $_SESSION['client_id'] = $row['client_id'];
//         $_SESSION['username'] = $row['username'];
//         $_SESSION['first_name'] = $row['first_name'];
//         $_SESSION['last_name'] = $row['last_name'];

//         // Return a success message
//         echo json_encode(['success' => true]);
//         exit();
//       } else {
//         // Incorrect password, return an error message
//         echo json_encode(['success' => false, 'message' => 'Incorrect password. Please try again.']);
//         exit();
//       }
//     } else {
//       // User not found, return an error message
//       echo json_encode(['success' => false, 'message' => 'User not found. Please check your username or email.']);
//       exit();
//     }
//   } else {
//     // Error executing query, return an error message
//     echo json_encode(['success' => false, 'message' => 'Error executing query: ' . mysqli_error($con)]);
//     exit();
//   }
// }
?>
