<?php
include './../../connections/connections.php';

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user_id'])) {
  header("Location: /ticketing_system/index.php");
  exit();
}
?>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Search -->
  <h1 class="h3 mb-0 text-gray-800">
    <?php echo $_SESSION['user_firstname'] . ' ' . $_SESSION['user_lastname']; ?>
  </h1>
</nav>