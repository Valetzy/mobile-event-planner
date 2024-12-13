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
    $selected_products = $_POST['selected_products'];
    $organizer_id = $_POST['organizer_id'];
    $client_id = $_POST['client_id'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];

    // Handle file upload for reference_photo
    $reference_photo = $_FILES['reference_photo'];
    $photo_name = time() . '_' . basename($reference_photo['name']);
    $photo_path = '../../uploads/client/' . $photo_name;

    if (move_uploaded_file($reference_photo['tmp_name'], $photo_path)) {
        try {
            // Prepare SQL query to insert form data
            $stmt = $conn->prepare("INSERT INTO client_customized_event 
                (event_package_name, event_type, theme, participants, budget, reference_photo, add_ons, organizer_id, client_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssisissii", $event_package_name, $event_type , $theme, $participants, $budget, $photo_name, $add_ons, $organizer_id ,$client_id);

            // Execute the insertion for the event details
            if ($stmt->execute()) {
                $last_inserted_id = $conn->insert_id;

                // Insert selected products into a separate table (e.g., event_selected_products)
                $stmt_products = $conn->prepare("INSERT INTO client_event_selected_products (event_id, product_id) VALUES (?, ?)");
                foreach ($selected_products as $product_id) {
                    $stmt_products->bind_param("ii", $last_inserted_id, $product_id);
                    $stmt_products->execute();
                }

                // Redirect to client_form.php with the new package ID as a query parameter
                echo "<script>
                        alert('Event added successfully!');
                        window.location.href = '../client_form.php?event_id=$last_inserted_id&event_type=$event_type&organizer_id=$organizer_id&date_start=$date_start&date_end=$date_end';
                      </script>";
            } else {
                echo "<script>alert('Failed to add event!'); window.history.back();</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('Error: " . $e->getMessage() . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Failed to upload reference photo!'); window.history.back();</script>";
    }
}
?>
