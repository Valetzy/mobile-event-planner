<?php
session_start();
require_once '../connection/conn.php'; // Adjust the path to match your structure

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize inputs
    $user_id = $_POST['user_id'] ?? null;
    $full_name = trim($_POST['full_name'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $contact = trim($_POST['contact'] ?? '');
    $email = trim($_POST['email'] ?? '');

    // Validate inputs
    if (!$user_id || empty($full_name) || empty($address) || empty($contact) || empty($email)) {
        echo json_encode(["success" => false, "message" => "All fields are required!"]);
        exit;
    }

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "Invalid email format!"]);
        exit;
    }

    // Prepare SQL statement
    $sql = "UPDATE users SET full_name = ?, address = ?, contact = ?, email = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ssssi", $full_name, $address, $contact, $email, $user_id);
        
        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Profile updated successfully!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Database update failed."]);
        }
        
        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Database error."]);
    }
    
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>
