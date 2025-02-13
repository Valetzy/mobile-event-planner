<?php
// Start the session to access session variables
session_start();

// Include your database connection file
include '../connection/conn.php';

// Check if the supplier_id exists in the session
if (!isset($_SESSION['id'])) {
    die("Supplier ID not found in session.");
}

// Retrieve the supplier_id from the session
$supplier_id = $_SESSION['id'];

// Check if the form is submitted and files are uploaded
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploaded_picture'])) {
    // Get the uploaded files
    $files = $_FILES['uploaded_picture'];

    // Loop through the files array and process each file
    foreach ($files['tmp_name'] as $key => $tmp_name) {
        $file_name = $files['name'][$key];
        $file_tmp = $files['tmp_name'][$key];
        $file_size = $files['size'][$key];
        $file_error = $files['error'][$key];

        // Check if there was an error uploading the file
        if ($file_error === 0) {
            // Set the allowed file types and max size (e.g., 2MB)
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            $max_size = 2 * 1024 * 1024; // 2MB

            // Get the file extension and MIME type
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $file_mime = mime_content_type($file_tmp);

            // Validate file type and size
            if (in_array($file_mime, $allowed_types) && $file_size <= $max_size) {
                // Generate a unique name for the uploaded file
                $new_file_name = uniqid('', true) . '.' . $file_ext;

                // Specify the upload directory (change as needed)
                $upload_dir = '../uploads/';
                $upload_path = $upload_dir . $new_file_name;

                // Move the uploaded file to the target directory
                if (move_uploaded_file($file_tmp, $upload_path)) {
                    // Insert the file information along with the supplier_id into the database
                    $sql = "INSERT INTO supplier_feedback_pics (supplier_id, file_name, file_path) VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("iss", $supplier_id, $file_name, $upload_path);

                    if ($stmt->execute()) {
                        echo "File uploaded and information saved successfully!";
                        header("Location: profile.php");
                    } else {
                        echo "Error saving file information to database.";
                    }
                } else {
                    echo "Error moving the uploaded file.";
                }
            } else {
                echo   "Invalid file type or file is too large.";
            }
        } else {
            echo   "Error uploading file: " . $file_error;
        }
    }
} else {
    echo   "No file uploaded.";
}
?>
