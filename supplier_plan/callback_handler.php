<?php
require 'connection/conn.php'; // Include your database connection file

// Capture the POST data from PayMongo
$payload = file_get_contents('php://input');
$data = json_decode($payload, true);

// Verify if the payment status exists
$status = $data['data']['attributes']['status'] ?? null;
$description = $data['data']['attributes']['remarks'] ?? 'No Description';
$amount = $data['data']['attributes']['amount'] ?? 0;

if ($status === 'succeeded') {
    // Determine the plan type based on the amount
    $plan_type = ($amount == 29900) ? 'monthly' : 'yearly';

    // Save the purchase details into the `user_plan` table without a `user_id`
    $query = "INSERT INTO user_plan (plan_type, amount, description, status) 
              VALUES ('$plan_type', '$amount', '$description', 'pending')";

    if (mysqli_query($conn, $query)) {
        $user_plan_id = mysqli_insert_id($conn); // Get the ID of the newly inserted record

        // Redirect to the registration page with the `user_plan_id`
        header("Location: ../organizer_signin.php?user_plan_id=$user_plan_id");
        exit;
    } else {
        echo "Error saving purchase: " . mysqli_error($conn);
    }
} elseif ($status === 'failed') {
    header("Location: fail.php");
    exit;
} else {
    echo "Unknown payment status.";
    exit;
}
?>
