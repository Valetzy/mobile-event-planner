<?php
// registration_functions/register_user.php

// Include the database connection file
include_once '../connection/conn.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form data
    $user_type = $_POST['user_type'];
    $name = trim($_POST['name']);
    $birthday = $_POST['birthday'];
    $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
    $gender = $_POST['gender'];
    $civil_status = $_POST['civil_status'];
    $address = trim($_POST['address']);
    $contact = trim($_POST['contact']);
    $username = trim($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $terms = isset($_POST['terms']);

    // Validate required fields
    if (empty($name) || empty($birthday) || empty($age) || empty($gender) || empty($civil_status) || empty($address) || empty($contact) || empty($username) || empty($email) || empty($password) || empty($confirm_password)) {

        echo "<script>alert('Please fill in all required fields'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";
        exit;
    }

    // Validate password match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";
        exit;
    }

    // Check for duplicate email
    $check_email_sql = "SELECT * FROM users WHERE email = ?";
    $check_stmt = $conn->prepare($check_email_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('An account with this email already exists.'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";

        exit;
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // File upload directories
    $upload_dir = '../uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }
    
    // Handle profile picture upload
    $profile_picture_path = $upload_dir . basename($_FILES['profile']['name']);
    if (!move_uploaded_file($_FILES['profile']['tmp_name'], $profile_picture_path)) {

        echo "<script>alert('Error uploading profile picture.'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";

        exit;
    }

    // Handle valid ID upload
    $valid_id_path = $upload_dir . basename($_FILES['valid_id']['name']);
    if (!move_uploaded_file($_FILES['valid_id']['tmp_name'], $valid_id_path)) {

        echo "<script>alert('Error uploading valid ID.'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";

        exit;
    }

    // Insert data into the database
    $sql = "INSERT INTO users (user_type, full_name, birthday, age, gender, civil_status, address, contact, username, email, password, profile_pic, valid_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param(
            "sssisssisssss", 
            $user_type, 
            $name, 
            $birthday, 
            $age, 
            $gender, 
            $civil_status, 
            $address, 
            $contact, 
            $username, 
            $email, 
            $hashed_password, 
            $profile_picture_path, 
            $valid_id_path
        );

        if ($stmt->execute()) {
        echo "<script>alert('Registration successful! Wait 24 business Hours for account approval. Thank You!'); window.location.href = '../index.php';</script>";

        } else {
            echo "Error during registration.";
        }
    } else {
        echo "Database error.";
    }

    $stmt->close();
    $conn->close();
}
?>
