<?php
include '../connection/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $description = $_POST["description"];
    
    // Check if a file is uploaded
    if (!empty($_FILES["theme_photo"]["name"])) {
        $target_dir = "../images/";
        $file_name = basename($_FILES["theme_photo"]["name"]);
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Allowed file types
        $allowed_types = ["jpg", "jpeg", "png", "gif"];

        if (in_array($file_type, $allowed_types)) {
            if (move_uploaded_file($_FILES["theme_photo"]["tmp_name"], $target_file)) {
                // Update with theme_photo
                $stmt = $conn->prepare("UPDATE organizer_products SET product_name = ?, description = ?, product_photo = ? WHERE orga_products_id = ?");
                $stmt->bind_param("sssi", $product_name, $description, $file_name, $product_id);
            } else {
                echo "<script>alert('Error uploading file!'); window.location.href=document.referrer;</script>";
                exit;
            }
        } else {
            echo "<script>alert('Invalid file format! Only JPG, JPEG, PNG, and GIF are allowed.'); window.location.href=document.referrer;</script>";
            exit;
        }
    } else {
        // Update without changing theme_photo
        $stmt = $conn->prepare("UPDATE organizer_products SET product_name = ?, description = ? WHERE orga_products_id = ?");
        $stmt->bind_param("ssi", $product_name, $description, $product_id);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Product updated successfully!'); window.location.href=document.referrer;</script>";
    } else {
        echo "<script>alert('Error updating product!'); window.location.href=document.referrer;</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
