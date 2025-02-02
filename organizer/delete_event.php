<?php
// delete_product.php
include '../connection/conn.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $stmt = $conn->prepare("DELETE FROM organizer_products WHERE orga_products_id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Product deleted successfully'); window.location.href='inventory.php';</script>";
    } else {
        echo "<script>alert('Error deleting product'); window.location.href='inventory.php';</script>";
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request'); window.location.href='inventory.php';</script>";
}
?>
