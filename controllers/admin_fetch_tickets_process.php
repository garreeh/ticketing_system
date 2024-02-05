<?php
session_start();
include '../../connections/connections.php';

// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: /ticketing_system/admin.php");
    exit();
}

$admin_id = $_SESSION['admin_id'];

$ticket_for_admin = "SELECT * FROM `tickets` WHERE (admin_id = '$admin_id' OR admin_id IS NULL) AND (ticket_status = 'Pending')";
$ticket_result_admin = $conn->query($ticket_for_admin);

//Fetch all tickets
$activeTicketsCountAdmin = ($ticket_result_admin) ? $ticket_result_admin->num_rows : 0;

// Initialize counters for each priority level
$normal_count = 0;
$urgent_count = 0;
$priority_count = 0;

// Check ticket priorities and count them
if ($ticket_result_admin->num_rows > 0) {
    while ($row = $ticket_result_admin->fetch_assoc()) {
        $ticket_priority = $row['ticket_priority'];
        $ticket_status = $row['ticket_status'];

        if ($ticket_priority == 'Normal') {
            $normal_count++;
            // Do something for tickets with Normal priority
        } elseif ($ticket_priority == 'Priority') {
            $priority_count++;
            // Do something for tickets with Priority priority
        } elseif ($ticket_priority == 'Urgent') {
            $urgent_count++;
            // Do something for tickets with Urgent priority
        }
    }
}
?>
