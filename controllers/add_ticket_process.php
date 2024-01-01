<?php
session_start();
include '../../connections/connections.php';

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

    // Generate ticket number
    $ticket_number = str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);

    // Set default status
    $ticket_status = 'Pending';

    // Fetch ticket category name from the ticket_category table
    $category_query = "SELECT ticket_category FROM ticket_category WHERE ticket_category = '$ticket_category_id'";
    $category_result = mysqli_query($conn, $category_query);

    if ($category_result) {
        $category_row = mysqli_fetch_assoc($category_result);
        $ticket_category = $category_row['ticket_category'];

        // Construct SQL query
        $sql = "INSERT INTO `tickets` (user_id, ticket_number, ticket_category, ticket_description, ticket_priority, ticket_status)
                VALUES ('$user_id', '$ticket_number', '$ticket_category', '$ticket_description', '$ticket_priority', '$ticket_status')";

        // Execute SQL query
        if (mysqli_query($conn, $sql)) {
            header("Location: /ticketing_system/views/users/users_tickets.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error fetching ticket category: " . mysqli_error($conn);
    }
}


// Fetch all tickets for the specific user
$ticket_for_specific_users = "SELECT * FROM `tickets` WHERE user_id = '$user_id' AND ticket_status = 'Pending'";

$ticket_result_specific_users = $conn->query($ticket_for_specific_users);
// Get the length of the ticket list for Users
$activeTicketsCount = ($ticket_result_specific_users) ? $ticket_result_specific_users->num_rows : 0;


// Fetch all tickets for the admin to view
$ticket_for_admin = "SELECT * FROM `tickets` WHERE ticket_status = 'Pending'";
$ticket_result_admin = $conn->query($ticket_for_admin);
$activeTicketsCountAdmin = ($ticket_result_admin) ? $ticket_result_admin->num_rows : 0;

?>