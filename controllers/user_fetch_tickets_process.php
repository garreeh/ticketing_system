<?php
  session_start();
  include '../../connections/connections.php';

  // Check if user is logged in
  if (!isset($_SESSION['user_id'])) {
    header("Location: /ticketing_system/admin.php");
    exit();
  }

  $user_id = $_SESSION['user_id'];
  $admin_id = 'admin_id';


  $ticket_for_user = "SELECT * FROM `tickets` WHERE user_id = '$user_id'";
  $ticket_result_user = $conn->query($ticket_for_user);

  //Fetch all tickets
  $activeTicketsCount = ($ticket_result_user) ? $ticket_result_user->num_rows : 0;

  // Initialize counters for each priority level
  $normal_count = 0;
  $urgent_count = 0;
  $priority_count = 0;

  // Check ticket priorities and count them
  if ($ticket_result_user->num_rows > 0) {
    while ($row = $ticket_result_user->fetch_assoc()) {
      $ticket_priority = $row['ticket_priority'];
      $ticket_status = $row['ticket_status'];

      if ($ticket_priority == 'Normal') {
          $normal_count++;
      } elseif ($ticket_priority == 'Priority') {
          $priority_count++;
      } elseif ($ticket_priority == 'Urgent') {
          $urgent_count++;
      }
    }
  }
?>
