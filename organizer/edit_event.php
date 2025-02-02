<?php
include '../connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_id = $_POST['event_id']; // Ensure event_id is provided
    $event_type = $_POST['event_type'];
    $participants = $_POST['participants'];
    $price = $_POST['price'];
    $theme = $_POST['theme'];
    $event_package_name = $_POST['event_package_name'];
    $selected_products = isset($_POST['selected_products']) ? $_POST['selected_products'] : [];
    $venue = $_POST['venue'];
    $location = $_POST['location'];

    // Handle file upload
    if (!empty($_FILES['theme_photo']['name'])) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES['theme_photo']['type'], $allowed_types)) {
            die("Invalid file type. Only JPG, PNG, and GIF are allowed.");
        }

        $image_path = basename($_FILES['theme_photo']['name']);
        move_uploaded_file($_FILES['theme_photo']['tmp_name'], $image_path);
    } else {
        // If no image is uploaded, keep the old one
        $image_path = $_POST['existing_image'];
    }

    // Prepare the SQL query to update the event
    $query = "UPDATE events SET theme = ?, event_package_name = ?, price = ?, participants = ?, theme_photo = ?, event_type = ?, supplier_venue = ?, supplier_location = ? WHERE event_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssdisisss", $theme, $event_package_name, $price, $participants, $image_path, $event_type, $venue, $location, $event_id);

    if ($stmt->execute()) {
        if (!empty($selected_products)) {
            foreach ($selected_products as $product_id) {
                // Prepare the check statement
                $stmt_check = $conn->prepare("SELECT COUNT(*) FROM event_products WHERE event_id = ? AND product_id = ?");
                $stmt_check->bind_param("ii", $event_id, $product_id);
                $stmt_check->execute();
                $stmt_check->bind_result($count);
                $stmt_check->fetch();
                $stmt_check->close(); // Close the check statement

                // If the product is not already associated, insert it
                if ($count == 0) {
                    // Prepare the insert statement
                    $stmt_insert = $conn->prepare("INSERT INTO event_products (event_id, product_id) VALUES (?, ?)");
                    $stmt_insert->bind_param("ii", $event_id, $product_id);
                    $stmt_insert->execute();
                    $stmt_insert->close(); // Close the insert statement
                }
            }
        }

        // Redirect on success
        echo '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Time Conflict</title>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    </head>
                    <body onload="Swal.fire({ icon: \'success\', title: \'Package Update\', text: \'Package Updated Successfully\' }).then((result) => { if (result.isConfirmed) { window.location.href = \'event_package.php\'; } })">
                    </body>
                    </html>';
        exit();
    } else {
        echo "Error updating event: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>