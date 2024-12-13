<?php
// Include database connection
include_once '../connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form inputs
    $user_type = $_POST['user_type'];
    $business_name = filter_input(INPUT_POST, 'business_name', FILTER_SANITIZE_STRING);
    $supplier_types = $_POST['supplier_types'];
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate passwords
    if ($password !== $confirm_password) {
        die('Passwords do not match.');
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // File upload handling
    $uploads_dir = '../uploads/suppliers'; // Define your upload directory
    $business_picture = $_FILES['business_picture'];
    $business_permit = $_FILES['business_permit'];
    $dti_permit = $_FILES['dti_permit'];
    $bir_permit = $_FILES['bir_permit'];

    // Validate and move uploaded files
    $file_names = [$business_picture, $business_permit, $dti_permit, $bir_permit];
    foreach ($file_names as $file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            die('File upload error. Error code: ' . $file['error']);
        }
        $file_tmp_name = $file['tmp_name'];
        $file_name = basename($file['name']);
        $destination = "$uploads_dir/$file_name";

        if (!move_uploaded_file($file_tmp_name, $destination)) {
            die('Failed to move uploaded file.');
        }
    }

    // Insert supplier data into the database
    $stmt = $conn->prepare("INSERT INTO supplier (user_type, business_name, supplier_type, address, contact, email, password, business_pic, business_permit, dti_permit, bir_permit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die('Prepare statement failed: ' . $conn->error);
    }

    $stmt->bind_param("ssssissssss", $user_type, $business_name, $supplier_types, $address, $contact, $email, $hashed_password, $business_picture['name'], $business_permit['name'], $dti_permit['name'], $bir_permit['name']);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! Wait 3-5 business days for account approval. Thank You!'); window.location.href = '../index.php';</script>";
        // Optionally redirect to a success page or send a success response
    } else {
        die('Execution failed: ' . $stmt->error);
    }

    $stmt->close();
} else {
    die('Invalid request method.');
}

$conn->close();
?>