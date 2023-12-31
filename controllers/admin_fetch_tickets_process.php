<?php
session_start();
include '../../connections/connections.php';

// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: /ticketing_system/admin.php");
    exit();
}

$admin_id = $_SESSION['admin_id'];

// Fetch all tickets for the admin to view
$ticket_for_admin = "SELECT * FROM `tickets` WHERE ticket_status = 'Pending'";
$ticket_result_admin = $conn->query($ticket_for_admin);
$activeTicketsCountAdmin = ($ticket_result_admin) ? $ticket_result_admin->num_rows : 0;

?>
