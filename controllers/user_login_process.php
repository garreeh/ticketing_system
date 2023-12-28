<?php
session_start();
include './../connections/connections.php';

if (isset($_POST['username_or_email'], $_POST['user_password'])) {
    $usernameOrEmail = $conn->real_escape_string($_POST['username_or_email']);
    $user_password = $_POST['user_password'];

    // Check if the input is a valid email address
    if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
        $condition = "`user_email`='$usernameOrEmail'";
    } else {
        $condition = "`user_name`='$usernameOrEmail'";
    }

    $query = "SELECT * FROM `z_user` WHERE $condition";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            // Directly compare the input password with the value in the database
            if ($user_password == $row["user_decode_pass"]) {
                // Password is correct, set session variables
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_email'] = $row['user_email'];
                $_SESSION['user_name'] = $row['user_name'];
                // Return a success message
                echo json_encode(['success' => true]);
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
