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
    $ticket_category = $conn->real_escape_string($_POST['ticket_category']);
    $ticket_description = $conn->real_escape_string($_POST['ticket_description']);
    $ticket_priority = $conn->real_escape_string($_POST['ticket_priority']);
  
    // Generate ticket number
    $ticket_number = str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);

    // Set default status
    $ticket_status = 'Pending';

    // Construct SQL query
    $sql = "INSERT INTO `tickets` (user_id, ticket_number, ticket_category, ticket_description, ticket_priority, ticket_status)
  VALUES ('$user_id', '$ticket_number', '$ticket_category', '$ticket_description', '$ticket_priority', '$ticket_status')";

    // Execute SQL query
    if (mysqli_query($conn, $sql)) {
        header("Location: /ticketing_system/views/users/users_tickets.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Fetch all tickets for the specific user
$ticketSql = "SELECT * FROM `tickets` WHERE user_id = '$user_id' AND ticket_status = 'Pending'";
$ticketResult = $conn->query($ticketSql);

// Get the length of the ticket list
$activeTicketsCount = ($ticketResult) ? $ticketResult->num_rows : 0;
?>
