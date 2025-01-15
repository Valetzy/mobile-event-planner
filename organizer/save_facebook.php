<?php
session_start();
require '../connection/conn.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['facebook'])) {
    $facebook = trim($_POST['facebook']);
    $user_id = $_SESSION['id'];

    // Validate Facebook link
    if (!filter_var($facebook, FILTER_VALIDATE_URL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid Facebook link.']);
        exit;
    }

    // Update the supplier's Facebook link in the database
    $sql = "UPDATE users SET facebook = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $facebook, $user_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update the Facebook link.']);
    }

    $stmt->close();
    $conn->close();
    exit;
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
