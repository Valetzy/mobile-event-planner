<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include '../connection/conn.php';
session_start();

$organizer_id = $_SESSION['id'] ?? null;
if (!$organizer_id) {
    echo json_encode(["error" => "Organizer ID not set in session"]);
    exit;
}

$sql = "SELECT 
            u.full_name,
            u.profile_pic,
            crf.id,
            et.event_type_id,
            crf.date_start AS start,
            crf.date_end AS end,
            et.event_name AS title
        FROM client_request_form AS crf
        LEFT JOIN birthday_client_form AS bcf ON crf.client_form_id = bcf.id
        LEFT JOIN wedding_form AS wf ON crf.client_form_id = wf.id
        LEFT JOIN christening_form AS cf ON crf.client_form_id = cf.id
        INNER JOIN event_types AS et ON crf.event_type = et.event_type_id
        INNER JOIN users AS u ON crf.client_id = u.user_id 
        WHERE crf.status = 'approved' AND crf.organizer_id = '$organizer_id'
        AND (bcf.id IS NOT NULL OR wf.id IS NOT NULL OR cf.id IS NOT NULL)
        ORDER BY crf.date_created ASC";

$result = $conn->query($sql);

if (!$result) {
    echo json_encode(["error" => $conn->error]);
    exit;
}

$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = [
        'id' => $row['id'],
        'title' => $row['title'],
        'start' => $row['start'],
        'end' => $row['end'],
        'extendedProps' => [
            'id' => $row['id'],
            'event_type_id' => $row['event_type_id'], // Ensure this is included
            'full_name' => $row['full_name'],
            'profile_pic' => $row['profile_pic']
        ]
    ];    
}


echo json_encode($events);
$conn->close();
?>