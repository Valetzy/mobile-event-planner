<?php
require_once '../../connection/conn.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Validate and retrieve form data
        $event_id = $_POST['event_id'] ?? null;
        $contact_name = $_POST['contact_name'] ?? null;
        $relationship = $_POST['relationship'] ?? null;
        $contact_number = $_POST['contact_number'] ?? null;
        $email = $_POST['email'] ?? null;
        $address = $_POST['address'] ?? null;
        $celebrant_name = $_POST['celebrant_name'] ?? null;
        $dob = $_POST['dob'] ?? null;
        $age = $_POST['age'] ?? null;
        $gender = $_POST['gender'] ?? null;
        $start_time = $_POST['start_time'] ?? null;
        $end_time = $_POST['end_time'] ?? null;

        $event_type = $_POST['event_type'] ?? null;
        $organizer_id = $_POST['organizer_id'] ?? null;
        $date_start = $_POST['date_start'] ?? null;
        $date_end = $_POST['date_end'] ?? null;
        $client_id = $_POST['client_id'] ?? null;
        $package_id = $_POST['package_id'] ?? null;
        
        // Ensure all required fields are present
        if (!$event_id || !$contact_name || !$relationship || !$contact_number || !$email || !$address || 
            !$celebrant_name || !$dob || !$age || !$gender || !$start_time || !$end_time ||
            !$event_type || !$organizer_id || !$date_start || !$date_end || !$client_id) {
            throw new Exception("Please complete all required fields.");
        }

        // Ensure dates are in the correct format
        $dob = date('Y-m-d', strtotime($dob));
        $date_start = date('Y-m-d', strtotime($date_start));
        $date_end = date('Y-m-d', strtotime($date_end));

        // Begin a transaction
        $conn->begin_transaction();

        // Insert into `birthday_client_form` table
        $stmt = $conn->prepare("
            INSERT INTO birthday_client_form 
            (event_id, contact_name, relationship, contact_number, email, address, celebrant_name, dob, age, gender, start_time, end_time, package_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param(
            'issssssssssss', // 12 placeholders for 12 parameters
            $event_id,
            $contact_name,
            $relationship,
            $contact_number,
            $email,
            $address,
            $celebrant_name,
            $dob,
            $age,
            $gender,
            $start_time,
            $end_time,
            $package_id
        );
        $stmt->execute();

        // Get the inserted `birthday_client_form` ID
        $birthday_client_id = $conn->insert_id;

        // Insert into `client_request_form` table
        $stmt2 = $conn->prepare("
            INSERT INTO client_request_form (client_form_id, client_id, organizer_id, date_start, date_end, event_type) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt2->bind_param('isssss', $birthday_client_id, $client_id, $organizer_id, $date_start, $date_end, $event_type);
        $stmt2->execute();

        // Commit the transaction
        $conn->commit();

        // Redirect or display success message
        echo '<script>alert("Form submitted successfully!"); window.location.href = "../request_pending.php";</script>';
    } catch (Exception $e) {
        // Rollback the transaction in case of error
        $conn->rollback();
        echo '<script>alert("Error: ' . $e->getMessage() . '"); window.history.back();</script>';
    }
} else {
    // If accessed directly
    echo '<script>alert("Invalid request."); window.history.back();</script>';
}
?>
