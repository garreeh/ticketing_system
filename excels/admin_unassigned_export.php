<?php
// Load the database configuration file 
include './../connections/connections.php';

// Include XLSX generator library 
include './../assets/PHPExcel/PHPExcel.php';

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
// Excel file name for download 
$fileName = "Unassigned Tickets " . date('F d, Y') . ".xlsx";

// Define column names 
$excelData[] = array('Client Fullname', 'Ticket Number', 'Category', 'Description', 'Priority', 'Status', 'Date Created');

$admin_id = $_SESSION['admin_id'];
// Fetch records from database and store in an array 
$query = $conn->query("SELECT *
FROM tickets
LEFT JOIN z_user ON tickets.user_id = z_user.user_id
WHERE tickets.admin_id IS NULL
ORDER BY ticket_id ASC");

if ($query->num_rows > 0) {
	while ($row = $query->fetch_assoc()) {
		$userfullname = $row['user_firstname'] . ' ' . $row['user_lastname'];
		$lineData = array($userfullname, $row['ticket_number'], $row['ticket_category'], $row['ticket_description'], $row['ticket_priority'], $row['ticket_status'], $row['created_at']);
		$excelData[] = $lineData;
	}
}

// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray($excelData);
$xlsx->downloadAs($fileName);

exit;

?>