<?php
require 'connection/conn.php';

$token = $_GET['token'];
$user_type = $_GET['user_type'];
$query = "SELECT * FROM password_resets WHERE token = ? AND expires_at > NOW()";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Invalid or expired token.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if password length is between 8 and 16 characters
    if (strlen($password) < 8 || strlen($password) > 16) {
        die("Password must be between 8 and 16 characters.");
    }

    // Check if password is alphanumeric
    if (!preg_match("/^[a-zA-Z0-9]+$/", $password)) {
        die("Password must be alphanumeric.");
    }

    // Check if passwords match
    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    $newPassword = password_hash($password, PASSWORD_DEFAULT);
    $email = $result->fetch_assoc()['email'];

    // Update the password based on user type
    if ($user_type === 'client' || $user_type === 'organizer') {
        // Update users table for client or organizer
        $query = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $newPassword, $email);
        $stmt->execute();
    } elseif ($user_type === 'supplier') {
        // Update supplier table for supplier
        $query = "UPDATE supplier SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $newPassword, $email);
        $stmt->execute();
    }

    // Delete the token
    $query = "DELETE FROM password_resets WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Success</title>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </head>
            <body onload="Swal.fire({ icon: \'success\', title: \'Success\', text: \'Password Reset Successful.\' }).then(() => { window.location.href = \'index.php\'; })">
            </body>
            </html>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        input:focus,
        button:focus {
            outline: none;
            border-color: #4CAF50;
        }

        /* Password strength bar */
        #password-strength {
            width: 100%;
            height: 5px;
            margin-top: 10px;
            border-radius: 5px;
            background-color: #ddd;
        }

        #password-strength span {
            display: block;
            height: 100%;
        }

        .weak {
            background-color: red;
        }

        .medium {
            background-color: orange;
        }

        .strong {
            background-color: green;
        }

        /* Strength text */
        #strength-text {
            margin-top: 5px;
            font-size: 14px;
        }

        .weak-text {
            color: red;
        }

        .medium-text {
            color: orange;
        }

        .strong-text {
            color: green;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <h2>Reset Password</h2>
        <input type="password" name="password" placeholder="New Password" id="password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" required>
        <div id="password-strength">
            <span></span>
        </div>
        <div id="strength-text"></div> <!-- Strength text element -->
        <button type="submit">Reset Password</button>
    </form>

    <script>
        // Password validation (alphanumeric check)
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('confirm_password');
        const strengthBar = document.getElementById('password-strength').getElementsByTagName('span')[0];
        const strengthText = document.getElementById('strength-text');

        function checkPasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength++;  // Length check
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;  // Upper and lower case letters
            if (/\d/.test(password)) strength++;  // Numbers check
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength++;  // Special characters check

            // Update the strength bar and text
            if (strength === 1) {
                strengthBar.className = 'weak';
                strengthText.className = 'weak-text';
                strengthText.textContent = 'Weak';
            } else if (strength === 2) {
                strengthBar.className = 'medium';
                strengthText.className = 'medium-text';
                strengthText.textContent = 'Medium';
            } else if (strength === 3 || strength === 4) {
                strengthBar.className = 'strong';
                strengthText.className = 'strong-text';
                strengthText.textContent = 'Strong';
            } else {
                strengthBar.className = '';
                strengthText.textContent = '';
            }
        }

        document.querySelector("form").addEventListener("submit", function (event) {
            const password = passwordField.value;
            const confirmPassword = confirmPasswordField.value;

            // Check if password length is between 8 and 16 characters
            if (password.length < 8 || password.length > 16) {
                alert("Password must be between 8 and 16 characters.");
                event.preventDefault();  // Prevent form submission
                return;
            }

            // Check if password is alphanumeric
            const alphanumericRegex = /^[a-zA-Z0-9]+$/;
            if (!alphanumericRegex.test(password)) {
                alert("Password must be alphanumeric.");
                event.preventDefault();  // Prevent form submission
                return;
            }

            // Check if passwords match
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                event.preventDefault();  // Prevent form submission
            }
        });

        // Monitor password field for strength
        passwordField.addEventListener('input', function () {
            checkPasswordStrength(passwordField.value);
        });
    </script>
</body>

</html>
