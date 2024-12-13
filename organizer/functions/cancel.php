<?php
// request.php

// Include your database connection file
include '../../connection/conn.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the POST request
    $request = isset($_POST['cancel']) ? $_POST['cancel'] : null;
    $organizer_id = isset($_POST['organizer_id']) ? $_POST['organizer_id'] : null;
    $supplier_id = isset($_POST['supplier_id']) ? $_POST['supplier_id'] : null;

    // Ensure required data is present
    if ($request && $organizer_id && $supplier_id) {
        // Prepare the SQL statement for update
        $sql = "UPDATE organizer_request SET status = ? WHERE organizer_id = ? AND supplier_id = ?";

        // Prepare and execute the statement
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sii", $request, $organizer_id, $supplier_id);

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
        echo "Required data is missing.";
    }
}
?>


    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
