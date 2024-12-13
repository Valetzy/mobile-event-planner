<?php
// request.php

// Include your database connection file
include '../../connection/conn.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the POST request
    $request = isset($_POST['request']) ? $_POST['request'] : null;
    $organizer_id = isset($_POST['organizer_id']) ? $_POST['organizer_id'] : null;
    $supplier_id = isset($_POST['supplier_id']) ? $_POST['supplier_id'] : null;

    // Ensure required data is present
    if ($organizer_id && $supplier_id) {
        // Check if a record already exists
        $checkSql = "SELECT * FROM organizer_request WHERE organizer_id = ? AND supplier_id = ?";
        
        if ($checkStmt = $conn->prepare($checkSql)) {
            $checkStmt->bind_param("ii", $organizer_id, $supplier_id);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();

            if ($checkResult && $checkResult->num_rows > 0) {
                // Record exists, update the status to 'request'
                $updateSql = "UPDATE organizer_request SET status = 'request' WHERE organizer_id = ? AND supplier_id = ?";
                
                if ($updateStmt = $conn->prepare($updateSql)) {
                    $updateStmt->bind_param("ii", $organizer_id, $supplier_id);
                    
                    if ($updateStmt->execute()) {
                        // Redirect back to the previous page after success
                        header("Location: {$_SERVER['HTTP_REFERER']}");
                        exit;
                    } else {
                        echo "Error: " . $updateStmt->error;
                    }
                    $updateStmt->close();
                } else {
                    echo "Error preparing the update statement: " . $conn->error;
                }
            } else {
                // Record does not exist, insert a new record
                $insertSql = "INSERT INTO organizer_request (status, organizer_id, supplier_id) VALUES (?, ?, ?)";
                
                if ($insertStmt = $conn->prepare($insertSql)) {
                    $insertStmt->bind_param("sii", $request, $organizer_id, $supplier_id);
                    
                    if ($insertStmt->execute()) {
                        // Redirect back to the previous page after success
                        header("Location: {$_SERVER['HTTP_REFERER']}");
                        exit;
                    } else {
                        echo "Error: " . $insertStmt->error;
                    }
                    $insertStmt->close();
                } else {
                    echo "Error preparing the insert statement: " . $conn->error;
                }
            }
            $checkStmt->close();
        } else {
            echo "Error preparing the check statement: " . $conn->error;
        }
    } else {
        echo "Required data is missing.";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
