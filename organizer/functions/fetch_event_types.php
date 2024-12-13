<?php
// Database connection
require '../../connection/conn.php'; // Adjust to your database connection file

// Fetch event types
$query = "SELECT event_type_id, event_name FROM event_types"; // Assuming the table has columns 'id' and 'name'
$result = mysqli_query($conn, $query);

$event_types = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $event_types[] = $row;
    }
}

// Return as JSON
header('Content-Type: application/json');
echo json_encode($event_types);
?>
