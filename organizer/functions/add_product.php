    <?php
    session_start();
    // Include the database connection file
    include '../../connection/conn.php';
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        // Check if the form was submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize and validate the input
            $product_name = trim($_POST['product_name']);
            $event_type = trim($_POST['event_type']);

            if (empty($product_name)) {
                die('Product name is required.');
            }

            // Check if a file was uploaded and handle the file upload
            if (isset($_FILES['theme_photo']) && $_FILES['theme_photo']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../../images/'; // Directory for storing uploaded files
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; // Allowed MIME types

                // Get the file information
                $fileName = basename($_FILES['theme_photo']['name']);
                $fileType = $_FILES['theme_photo']['type'];
                $fileTmpName = $_FILES['theme_photo']['tmp_name'];
                $fileError = $_FILES['theme_photo']['error'];
                $fileSize = $_FILES['theme_photo']['size'];

                // Validate the file type
                if (!in_array($fileType, $allowedTypes)) {
                    die("<script>alert('Invalid Picture Type'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>");
                }

                // Generate a unique file name to avoid collisions
                $newFileName = uniqid('product_', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

                // Move the uploaded file to the designated directory
                if (move_uploaded_file($fileTmpName, $uploadDir . $newFileName)) {
                    // Insert the product data into the database
                    $sql = "INSERT INTO organizer_products (product_name, product_photo, organizer_id, event_types) VALUES (?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);

                    if ($stmt) {
                        $stmt->bind_param("ssii", $product_name, $newFileName, $id, $event_type);

                        if ($stmt->execute()) {

                            echo "<script>alert('Product added successfully!'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";
                        } else {
                            echo 'Error: ' . $stmt->error;
                        }

                        $stmt->close();
                    } else {
                        echo 'Error: ' . $conn->error;
                    }
                } else {
                    die("<script>alert('Failed to upload the photo. Please try again.'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>");
                }
            } else {
                die("<script>alert('Photo upload is required.'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>");
            }

            // Close the database connection
            $conn->close();
        } else {
            die("<script>alert('Invalid request method.'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>");
        }
    }
    ?>
