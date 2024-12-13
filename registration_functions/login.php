<?php
session_start();
include_once '../connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query
    $query = "
        SELECT users.user_type AS userType, users.password AS userPassword, users.user_id AS id, users.full_name AS name, users.profile_pic AS profile, users.contact AS contact, users.address AS address, users.status AS status
        FROM users 
        WHERE users.email = ?
        UNION ALL
        SELECT supplier.user_type AS userType, supplier.password AS userPassword, supplier.supplier_id AS id, supplier.business_name AS name, supplier.business_pic AS profile, supplier.contact AS contact, supplier.address AS address, supplier.status AS status
        FROM supplier 
        WHERE supplier.email = ?
    ";

    $stmt = $conn->prepare($query);

    if (!$stmt) {
        // Log the SQL error and exit
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("ss", $email, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($user['status'] === 'pending') {
            echo "<script>alert('Account not yet Approved'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";
            exit();
        }

        if (password_verify($password, $user['userPassword'])) {
            $_SESSION['email'] = $email;
            $_SESSION['user_type'] = $user['userType'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['profile'] = $user['profile'];
            $_SESSION['supplierType'] = $user['supplierType'];
            $_SESSION['contact'] = $user['contact'];
            $_SESSION['address'] = $user['address'];

            switch ($user['userType']) {
                case 'client':
                    header("Location: ../client/index.php");
                    exit();
                case 'organizer':
                    header("Location: ../organizer/index.php");
                    exit();
                case 'supplier':
                    header("Location: ../supplier/dashboard.php");
                    exit();
                case 'admin':
                    header("Location: ../admin/index.php");
                    exit();
                default:
                    header("Location: error_page.php");
                    exit();
            }
        } else {
            echo "<script>alert('Invalid email or password'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Invalid email or password'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";
        exit();
    }

    $stmt->close();
}
$conn->close();
