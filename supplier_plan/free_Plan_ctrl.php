<?php
// registration_functions/register_user.php

// Include the database connection file
include_once '../connection/conn.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $plan_type = 'free';
    $free = 0.00;
    $description = 'free plan';
    $status = 'active';

    // Set the current timestamp
    $created_at = date('Y-m-d H:i:s');
    // Calculate the expiry date (1 month from the creation date)
    $expire_at = date('Y-m-d H:i:s', strtotime('+1 month', strtotime($created_at)));

    // Check if the user already has an active plan
    $check_sql = "SELECT id FROM user_plan WHERE email = ? AND status = 'active'";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param('s', $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        // If an active plan already exists, redirect or show a message
        header("Location: free_plan.php?error=UserAlreadyExists");
        exit;
    }

    // SQL query to insert into user_plan table
    $sql = "INSERT INTO user_plan (email, plan_type, amount, description, status, created_at, expire_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param('ssdssss', $email, $plan_type, $free, $description, $status, $created_at, $expire_at);

    // Execute the statement
    if ($stmt->execute()) {
        // Get the ID of the inserted user_plan
        $user_plan_id = $stmt->insert_id;

        // Redirect to the specified location with the necessary parameters
        header("Location: ../supplier_signin.php?email=$email&firstname=$firstname&middlename=$middlename&lastname=$lastname&user_plan_id=$user_plan_id");
        exit; // Ensure no further script execution after the redirect
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statements and connection
    $check_stmt->close();
    $stmt->close();
    $conn->close();
}
?>
