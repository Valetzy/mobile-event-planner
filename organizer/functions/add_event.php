<?php
session_start();
include '../../connection/conn.php'; // Include your database connection file
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $event_type = $_POST['event_type'];
        $participants = $_POST['participants'];
        $price = $_POST['price'];
        $theme = $_POST['theme'];
        $event_package_name = $_POST['event_package_name'];
        $selected_products = isset($_POST['selected_products']) ? $_POST['selected_products'] : [];

        // Handle file upload
        $target_dir = "../../uploads/products/"; // Specify your upload directory
        $target_file = $target_dir . basename($_FILES["theme_photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["theme_photo"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size (e.g., limit to 2MB)
        if ($_FILES["theme_photo"]["size"] > 2000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Attempt to upload file
            if (move_uploaded_file($_FILES["theme_photo"]["tmp_name"], $target_file)) {
                // Prepare the SQL statement to insert the event data
                $stmt = $conn->prepare("INSERT INTO events (organizer_id, event_type, theme, theme_photo, participants, price, event_package_name) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("isssiis", $id, $event_type, $theme, basename($_FILES["theme_photo"]["name"]), $participants, $price, $event_package_name);

                if ($stmt->execute()) {
                    $event_id = $stmt->insert_id; // Get the last inserted event ID

                    // Insert selected products into event_products table
                    // Insert selected products into event_products table
                    if (!empty($selected_products)) {
                        $stmt_products = $conn->prepare("INSERT INTO event_products (event_id, product_id) VALUES (?, ?)");
                        foreach ($selected_products as $product_id) {
                            $product_id_variable = $product_id; // Create a variable to pass by reference
                            $stmt_products->bind_param("ii", $event_id, $product_id_variable);
                            $stmt_products->execute();
                        }
                        $stmt_products->close();
                    }


                    echo "New event created successfully.";
                    header("Location: ../event_package.php");
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
$conn->close(); // Close the database connection
?>