<?php
include '../../connection/conn.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $event_package_name = $_POST['event_package_name'];
    $event_type = $_POST['event_type'];
    $theme = $_POST['theme'];
    $participants = $_POST['participants'];
    $budget = $_POST['budget'];
    $add_ons = $_POST['add_ons'];
    $organizer_id = $_POST['organizer_id'];
    $client_id = $_POST['client_id'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $venue = $_POST['venue'];
    $location = $_POST['location'];
    $package_id = $_POST['package_id'];

    try {
        // Prepare SQL query to insert form data
        $stmt = $conn->prepare("INSERT INTO client_customized_event 
            (event_package_name, event_type, theme, participants, budget, add_ons, organizer_id, client_id, supplier_venue, supplier_location, package_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssissiiss", $event_package_name, $event_type, $theme, $participants, $budget, $add_ons, $organizer_id, $client_id, $venue, $location, $package_id);

        // Execute the insertion for the event details
        if ($stmt->execute()) {
            $last_inserted_id = $conn->insert_id;

            // Redirect to client_form.php with the new package ID as a query parameter
            echo "<script>
                    alert('Event added successfully!');
                    window.location.href = '../client_form.php?package_id=$package_id&event_id=$last_inserted_id&event_type=$event_type&organizer_id=$organizer_id&date_start=$date_start&date_end=$date_end';
                  </script>";
        } else {
            echo "<script>alert('Failed to add event!'); window.history.back();</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.history.back();</script>";
    }
}
?>
