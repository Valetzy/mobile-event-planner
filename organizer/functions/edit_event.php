<?php
include '../../connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $theme = $_POST['theme'];
    $price = $_POST['price'];
    $participants = $_POST['participants'];

    // Handle file upload
    if (!empty($_FILES['theme_photo']['name'])) {
        $image_path = '../uploads/products/' . basename($_FILES['theme_photo']['name']);
        move_uploaded_file($_FILES['theme_photo']['tmp_name'], $image_path);
    } else {
        // If no image is uploaded, keep the old one
        $image_path = $_POST['existing_image'];
    }

    // Prepare the SQL query to update the event
    $query = "UPDATE events SET theme = ?, event_package_name = ?, price = ?, participants = ?, theme_photo = ? WHERE event_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssdisi", $theme, $event_name, $price, $participants, $image_path, $event_id);
    $stmt->execute();

    // Redirect back to the event page or display a success message
    header("Location: event_page.php");
    exit();
}
?>
