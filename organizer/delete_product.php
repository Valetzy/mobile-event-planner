<?php
session_start();
include '../connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_product_id = $_POST['event_product_id'];

    // Prepare the SQL query to delete the product
    $query = "DELETE FROM event_products WHERE event_product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $event_product_id);

    if ($stmt->execute()) {
        echo 'Product successfully deleted.';
    } else {
        echo 'Error deleting product: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>