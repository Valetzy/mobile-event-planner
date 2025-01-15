<?php
require 'connection/conn.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];

    // Determine which table to query based on user type
    if ($user_type == 'organizer' || $user_type == 'client') {
        $query = "SELECT * FROM users WHERE email = ?";
    } elseif ($user_type == 'supplier') {
        $query = "SELECT * FROM supplier WHERE email = ?";
    } else {
        echo "Invalid user type.";
        exit;
    }

    // Prepare the query
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the email exists in the corresponding table
    if ($result->num_rows > 0) {
        // Generate a unique token for password reset
        $token = bin2hex(random_bytes(32));
        date_default_timezone_set('Asia/Manila');  // Set the timezone to Manila
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
        

        // Save the token in the database
        $query = "INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE token = ?, expires_at = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssss", $email, $token, $expires, $token, $expires);
        $stmt->execute();

        // Send the reset link via email
       $mail = require __DIR__ . "/forgot_password/mailer.php";
            $mail->setFrom("mobileeventplanner@gmail.com");
            $mail->addAddress($email);
            $mail->Subject = "Password Reset";
            $mail->Body = <<<END
            <center>
                <h1>Your Account in Mobile Event Planner is Requeating for Password Reset!</h1> <br>
                <a class="btn btn-primary" href="http://localhost/mobile-event-planner/reset_password.php?token=$token&user_type=$user_type">Click Here To Reset Password</a>
            </center>
            END;

            try {
                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
            }

            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Success</title>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </head>
            <body onload="Swal.fire({ icon: \'success\', title: \'Success\', text: \'Email Send.\' }).then(() => { window.location.href = \'index.php\'; })">
            </body>
            </html>';
        
    } else {
        echo "Email not found.";
    }
}
?>
