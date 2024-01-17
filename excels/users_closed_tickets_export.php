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

$user_id = $_SESSION['user_id'];
// Fetch records from database and store in an array 
$query = $conn->query("SELECT * 
FROM tickets 
LEFT JOIN admin_user ON tickets.user_id = tickets.user_id
WHERE tickets.user_id = '$user_id'
  AND ticket_status = 'Pending' 
ORDER BY ticket_id ASC");


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