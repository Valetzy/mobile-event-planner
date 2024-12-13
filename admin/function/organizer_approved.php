<?php
// Include database connection file
include '../../connection/conn.php'; // Ensure this file contains the database connection setup

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']); // Sanitize the input to prevent SQL injection

    // Query to select the user
    $select_query = "SELECT * FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $select_query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the user's email
        $user = mysqli_fetch_assoc($result);
        $email = $user['email']; // Assuming the column name for email is 'email'

        // Update user status
        $update_query = "UPDATE users SET status = 'approved' WHERE user_id = $user_id";
        if (mysqli_query($conn, $update_query)) {
            $mail = require __DIR__ . "/mailer.php";
            $mail->setFrom("mobileeventplanner@gmail.com");
            $mail->addAddress($email);
            $mail->Subject = "Account Approved";
            $mail->Body = <<<END
            <center>
                <h1>Your Account in Mobile Event Planner is Approved!</h1> <br>
                <p>You can now log in to the Mobile Event Planner :)</p>
                <a class="btn btn-primary" href="https://localhost/mobile_event_planner/index.php">Log In to Timeclass</a>
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
            <body onload="Swal.fire({ icon: \'success\', title: \'Success\', text: \'Organizer Approved.\' }).then(() => { window.location.href = \'../organizer_pending.php\'; })">
            </body>
            </html>';
        } else {
            echo "Error updating status: " . mysqli_error($conn);
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid request. No user_id provided.";
}

// Close the database connection
mysqli_close($conn);
?>
