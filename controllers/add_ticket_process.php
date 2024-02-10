<?php
session_start();

include './../connections/connections.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /ticketing_system/index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['add_tickets'])) {
    // Get form data
    $ticket_category_id = $conn->real_escape_string($_POST['ticket_category']);
    $ticket_description = $conn->real_escape_string($_POST['ticket_description']);
    $ticket_priority = $conn->real_escape_string($_POST['ticket_priority']);
    $admin_fullname = $conn->real_escape_string($_POST['admin_id']);

    // Generate ticket number
    $ticket_number = str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);

    // Set default status
    $ticket_status = 'Pending';

    // Fetch admin_id from the admin_user table
    $admin_query = "SELECT admin_id FROM admin_user WHERE admin_fullname = '$admin_fullname'";
    $admin_result = mysqli_query($conn, $admin_query);

    // Check if the query was successful
    if ($admin_result) {
        $admin_row = mysqli_fetch_assoc($admin_result);

        // Check if admin_row is not null
        if ($admin_row !== null) {
            $admin_id = $admin_row['admin_id'];
            $admin_fullname_display = $admin_fullname;
        } else {
            // If admin is "Anyone," set admin_id to null and display "Unassigned"
            $admin_id = null;
            $admin_fullname_display = 'Unassigned';
        }
    } else {
        echo "Error fetching admin ID: " . mysqli_error($conn);
        exit();
    }

    // Fetch ticket category name from the ticket_category table
    $category_query = "SELECT ticket_category FROM ticket_category WHERE ticket_category = '$ticket_category_id'";
    $category_result = mysqli_query($conn, $category_query);

    if ($category_result) {
        $category_row = mysqli_fetch_assoc($category_result);
        $ticket_category = $category_row['ticket_category'];

        // Construct SQL query
        $sql = "INSERT INTO `tickets` (user_id, admin_id, ticket_number, ticket_category, ticket_description, ticket_priority, ticket_status)
VALUES ('$user_id', " . ($admin_id !== null ? "'$admin_id'" : 'NULL') . ", '$ticket_number', '$ticket_category', '$ticket_description', '$ticket_priority', '$ticket_status')";

        // Execute SQL query
        if (mysqli_query($conn, $sql)) {
            // Ticket added successfully
            $response = array('success' => true, 'message' => 'Ticket Added successfully!');
            echo json_encode($response);
            exit();
        } else {
            // Error adding ticket
            $response = array('success' => false, 'message' => 'Error Adding Ticket!: ' . mysqli_error($conn));
            echo json_encode($response);
            exit();
        }
    } else {
        // Error fetching ticket category
        $response = array('success' => false, 'message' => 'Error fetching ticket category: ' . mysqli_error($conn));
        echo json_encode($response);
        exit();
    }
}
?>
