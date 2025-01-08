<?php
session_start();
include '../connection/conn.php';

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $response = [];

    // Query to get user_plan_id from users table
    $user_query = "SELECT user_plan_id FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($user_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_row = $result->fetch_assoc();
        $user_plan_id = $user_row['user_plan_id'];

        // Query to get plan_type and status from user_plan table
        $plan_query = "SELECT plan_type, status FROM user_plan WHERE id = ?";
        $stmt = $conn->prepare($plan_query);
        $stmt->bind_param("i", $user_plan_id);
        $stmt->execute();
        $plan_result = $stmt->get_result();

        if ($plan_result->num_rows > 0) {
            $plan_row = $plan_result->fetch_assoc();
            $response = [
                'plan_type' => $plan_row['plan_type'],
                'status' => $plan_row['status']
            ];
        } else {
            $response = ['error' => 'No plan found for the given user.'];
        }
    } else {
        $response = ['error' => 'No user found with the given session ID.'];
    }

    $stmt->close();
} else {
    $response = ['error' => 'No user session found. Please log in.'];
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);
?>
