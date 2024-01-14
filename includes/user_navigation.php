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
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
</head>

<body id="page-top">
	<!-- Sidebar -->
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center"
			href="/ticketing_system/views/admin/admin_dashboard.php">
			<div class="sidebar-brand-icon rotate-n-15">
				<i class="fas fa-laugh-wink"></i>
			</div>
			<div class="sidebar-brand-text mx-3">Pendragon <sup>Ticketing</sup></div>
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider my-0">

		<!-- Nav Item - Dashboard -->
		<li class="nav-item">
			<a class="nav-link" href="/ticketing_system/views/users/users_dashboard.php">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Tickets
		</div>

		<li class="nav-item">
			<a class="nav-link" href="/ticketing_system/views/users/users_tickets.php">
				<i class="fas fa-fw fa-clipboard-list"></i>
				<span>My Tickets</span></a>
			<a class="nav-link" href="/ticketing_system/views/users/users_closed_tickets.php">
				<i class="fas fa-fw fa-clipboard-list"></i>
				<span>Closed Tickets</span></a>
		</li>
		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Account Settings
		</div>
		<!-- Nav Item - Charts -->
		<li class="nav-item">
			<a class="nav-link" href="charts.html">
				<i class="fas fa-fw fa-cogs"></i>
				<span>Settings</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<li class="nav-item">
			<a class="nav-link" href="/ticketing_system/controllers/logout_process.php">
				<i class="fas fa-fw fa-sign-out-alt"></i>
				<span>Logout</span></a>
		</li>

		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>
	</ul>
	<!-- End of Sidebar -->
</body>

</html>