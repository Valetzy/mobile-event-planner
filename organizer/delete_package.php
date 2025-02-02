<?php
session_start();
include '../connection/conn.php'; // Include database connection


if (isset($_GET['id'])) {
    $event_id = intval($_GET['id']);

    // Prepare a statement to delete associated products first to maintain integrity
    $delete_products_query = "DELETE FROM event_products WHERE event_id = ?";
    $stmt_products = $conn->prepare($delete_products_query);
    $stmt_products->bind_param("i", $event_id);
    $stmt_products->execute();
    $stmt_products->close();

    // Prepare a statement to delete the event package
    $delete_query = "DELETE FROM events WHERE event_id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $event_id);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Package deleted successfully.";
    } else {
        $_SESSION['error'] = "Error deleting package.";
    }

    $stmt->close();
} else {
    $_SESSION['error'] = "Invalid request.";
}

// Redirect back to the event management page
 echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Success</title>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>
        <body onload="Swal.fire({ icon: \'success\', title: \'Success\', text: \'Package Deleted.\' }).then(() => { window.location.href = \'event_package.php\'; })">
        </body>
        </html>';
exit();
?>
