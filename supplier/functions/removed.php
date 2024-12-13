<?php
// request.php

// Include your database connection file
include '../../connection/conn.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the POST request
    $orga_id = isset($_POST['orga_id']) ? $_POST['orga_id'] : null;

    // Ensure required data is present
    if ($orga_id) {
        // Prepare the SQL statement for update
        $sql = "UPDATE organizer_request SET status = ' ' WHERE orga_request_id = ?";

        // Prepare and execute the statement
        if ($stmt = $conn->prepare($sql)) {
            // Bind both variables to match the placeholders in the query
            $stmt->bind_param("i", $orga_id);

            if ($stmt->execute()) {
                // Redirect back to the previous page after success
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit; // Ensure no further code is executed after redirection
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $conn->error;
        }
    } else {
        echo "<script>alert('Required data is missing.'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";
    }
}

// Close the database connection
$conn->close();
?>
