<?php
require_once '../../connection/conn.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input data
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $baby_name = mysqli_real_escape_string($conn, $_POST['baby_name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $baptism_date = mysqli_real_escape_string($conn, $_POST['baptism_date']);
    $baptism_time = mysqli_real_escape_string($conn, $_POST['baptism_time']);
    $reception_date = mysqli_real_escape_string($conn, $_POST['reception_date']);
    $reception_time = mysqli_real_escape_string($conn, $_POST['reception_time']);
    // Removed reception_name and reception_location sanitization
    $event_id = mysqli_real_escape_string($conn, $_POST['event_id']);
    $event_type = mysqli_real_escape_string($conn, $_POST['event_type']);
    $organizer_id = mysqli_real_escape_string($conn, $_POST['organizer_id']);
    $date_start = mysqli_real_escape_string($conn, $_POST['date_start']);
    $date_end = mysqli_real_escape_string($conn, $_POST['date_end']);
    $client_id = mysqli_real_escape_string($conn, $_POST['client_id']);

    // Insert into christening_form table
    $insert_query = "
        INSERT INTO christening_form (
            full_name, relationship, contact_number, email, address,
            baby_name, dob, gender, baptism_date, baptism_time,
            reception_date, reception_time, event_id
        ) VALUES (
            '$full_name', '$relationship', '$contact_number', '$email', '$address',
            '$baby_name', '$dob', '$gender', '$baptism_date', '$baptism_time',
            '$reception_date', '$reception_time', '$event_id'
        )
    ";

    if (mysqli_query($conn, $insert_query)) {
        // Get the newly inserted ID
        $new_id = mysqli_insert_id($conn);

        // Insert into client_form_id table
        $client_form_query = "
            INSERT INTO client_request_form (client_form_id, client_id, organizer_id, date_start, date_end, event_type)
            VALUES ('$new_id', '$client_id', '$organizer_id', '$date_start', '$date_end', '$event_type')
        ";

        if (mysqli_query($conn, $client_form_query)) {
            // Redirect or show success message
            echo "<script>
                alert('Form submitted successfully!');
                window.location.href = '../request_pending.php';
            </script>";
        } else {
            // Handle errors for client_form_id insertion
            echo "<script>
                alert('Error inserting client form details: " . mysqli_error($conn) . "');
                window.history.back();
            </script>";
        }
    } else {
        // Handle errors for christening_form insertion
        echo "<script>
            alert('Error inserting form data: " . mysqli_error($conn) . "');
            window.history.back();
        </script>";
    }
} else {
    echo "<script>
        alert('Invalid request method.');
        window.history.back();
    </script>";
}
?>
