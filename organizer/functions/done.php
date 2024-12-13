<?php
// Include the database connection file
include '../../connection/conn.php';

// Initialize a variable to store the alert message
$alert_message = '';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handling the ID and event status update
    if (isset($_POST['id'])) {
        $id = intval($_POST['id']); // Sanitize the input to prevent SQL injection

        // Query to select the record
        $select_query = "SELECT * FROM client_request_form WHERE id = ?";
        $stmt = $conn->prepare($select_query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // If record exists, update its status to "done"
            $update_query = "UPDATE client_request_form SET status = 'done' WHERE id = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param('i', $id);

            if ($update_stmt->execute()) {
                // Insert into organizer_done_event table
                session_start();
                $organizer_id = $_SESSION['id'] ?? null; // Replace with your session variable name
                if ($organizer_id) {
                    $insert_query = "INSERT INTO organizer_done_event (event_id, organizer_id) VALUES (?, ?)";
                    $insert_stmt = $conn->prepare($insert_query);
                    $insert_stmt->bind_param('is', $id, $organizer_id);

                    if ($insert_stmt->execute()) {
                        // After inserting the event, get the organizer_done_event ID for photo linkage
                        $organizer_done_event_id = $conn->insert_id;

                        // Handling picture upload
                        if (isset($_FILES['pictures'])) {
                            $upload_dir = 'uploads/'; // Define upload directory
                            if (!file_exists($upload_dir)) {
                                mkdir($upload_dir, 0777, true); // Create directory if it doesn't exist
                            }

                            $uploaded_files = [];
                            foreach ($_FILES['pictures']['tmp_name'] as $key => $tmp_name) {
                                $file_name = $_FILES['pictures']['name'][$key];
                                $file_tmp = $_FILES['pictures']['tmp_name'][$key];

                                if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
                                    // Insert each uploaded file's info into events_photos table
                                    $photo_query = "INSERT INTO events_photos (file_name, file_path, event_id) VALUES (?, ?, ?)";
                                    $photo_stmt = $conn->prepare($photo_query);
                                    $file_path = $upload_dir . $file_name;
                                    $photo_stmt->bind_param('ssi', $file_name, $file_path, $id);
                                    if ($photo_stmt->execute()) {
                                        $photo_id = $conn->insert_id; // Get the ID of the uploaded photo
                                        // Insert the photo ID into organizer_done_event table
                                        $update_done_event_query = "UPDATE organizer_done_event SET events_photos_id = ? WHERE id = ?";
                                        $update_done_event_stmt = $conn->prepare($update_done_event_query);
                                        $update_done_event_stmt->bind_param('ii', $photo_id, $organizer_done_event_id);
                                        if ($update_done_event_stmt->execute()) {
                                            $uploaded_files[] = $file_name;
                                        } else {
                                            $alert_message .= " Error linking photo $file_name to the event.<br>";
                                        }
                                    } else {
                                        $alert_message .= " Failed to insert photo $file_name into events_photos.<br>";
                                    }
                                } else {
                                    $alert_message .= " Failed to upload file $file_name.<br>";
                                }
                            }

                            if (!empty($uploaded_files)) {
                                $alert_message .= " Files uploaded successfully: " . implode(", ", $uploaded_files);
                            }
                        } else {
                            $alert_message .= " No files uploaded.";
                        }
                    } else {
                        $alert_message = "Error inserting into organizer_done_event: " . $conn->error;
                    }
                } else {
                    $alert_message = "Organizer ID not found in session.";
                }
            } else {
                $alert_message = "Error updating status: " . $conn->error;
            }
        } else {
            $alert_message = "No record found with the given ID.";
        }
    } else {
        $alert_message = "No ID provided.";
    }
}

// Close the database connection
$conn->close();

// Use JavaScript to display an alert and redirect back
echo "<script>
    alert('" . addslashes($alert_message) . "');
    window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
</script>";
?>
