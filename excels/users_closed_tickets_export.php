<?php
// Load the database configuration file 
include './../connections/connections.php';

// Include XLSX generator library 
include './../assets/PHPExcel/PHPExcel.php';

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
// Excel file name for download 
$fileName = "Closed Tickets " . date('F d, Y') . ".xlsx";

// Define column names 
$excelData[] = array('Ticket Number', 'Ticket Category', 'Ticket Description', 'Ticket Priority', 'Ticket Status', 'Closed by', 'Date Created');

$emp_id = $_SESSION['emp_id'];
// Fetch records from database and store in an array 
$query = $conn->query("SELECT tickets.*, emp_users.*, admin_user.admin_fullname 
                       FROM tickets 
                       LEFT JOIN emp_users ON tickets.emp_id = emp_users.emp_id 
                       LEFT JOIN admin_user ON tickets.admin_id = admin_user.admin_id 
                       WHERE tickets.emp_id = $emp_id AND ticket_status = 'Closed' 
                       ORDER BY ticket_status ASC");

if ($query->num_rows > 0) {
	while ($row = $query->fetch_assoc()) {
		$lineData = array($row['ticket_number'], $row['ticket_category'], $row['ticket_description'], $row['ticket_priority'], $row['ticket_status'], $row['admin_fullname'], $row['created_at']);
		$excelData[] = $lineData;
	}
}

// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray($excelData);
$xlsx->downloadAs($fileName);

exit;

?>