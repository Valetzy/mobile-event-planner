<?php
// Include the database connection file
include '../../connection/conn.php';

// Initialize a variable to store the alert message
$alert_message = '';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the input to prevent SQL injection

    // Query to select the record
    $select_query = "SELECT * FROM client_request_form WHERE id = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If record exists, update its status to "canceled"
        $update_query = "UPDATE client_request_form SET status = 'rejected' WHERE id = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param('i', $id);

        if ($update_stmt->execute()) {
            $alert_message = "Canceled successfully.";
        } else {
            $alert_message = "Error updating status: " . $conn->error;
        }
    } else {
        $alert_message = "No record found with the given ID.";
    }
} else {
    $alert_message = "No ID provided.";
}

// Close the database connection
$conn->close();

// Use JavaScript to display an alert and redirect back
echo "<script>
    alert('" . addslashes($alert_message) . "');
    window.location.href = '../denied_request.php';
</script>";
?>
