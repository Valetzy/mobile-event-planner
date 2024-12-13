<?php
// Start the session at the beginning of the script
session_start();

// Database connection
include '../../connection/conn.php';

// Check if the session variable is set
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    // Prepare the SQL query
    $query = "SELECT * FROM supplier WHERE supplier_id = ?";

    // Prepare the statement
    if ($stmt = $conn->prepare($query)) {
        // Bind the parameter
        $stmt->bind_param("i", $id);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if any records were found
        if ($result->num_rows > 0) {
            // Fetch all records
            while ($row = $result->fetch_assoc()) {
                // Output the data (you can modify this part based on your needs)
                $supplierType = $row['supplier_type'];

                // Generate the button based on supplier_type
                switch ($supplierType) {
                    case 'catering':

                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // Retrieve and sanitize form inputs
                            $catering_category = mysqli_real_escape_string($conn, $_POST['catering_category']);
                            $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
                            $status = mysqli_real_escape_string($conn, $_POST['status']);
                            $product_descriptions = mysqli_real_escape_string($conn, $_POST['product_descriptions']);

                            // Handle file upload
                            $target_dir = "../../uploads/products/"; // Ensure this directory exists and is writable
                            $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
                            $image = basename($_FILES["product_image"]["name"]);
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            $uploadOk = 1;

                            // Check if the image file is a actual image or fake image
                            $check = getimagesize($_FILES["product_image"]["tmp_name"]);
                            if ($check === false) {
                                echo "File is not an image.";
                                $uploadOk = 0;
                            }

                            // Check file size (5MB maximum)
                            if ($_FILES["product_image"]["size"] > 5000000) {
                                echo "Sorry, your file is too large.";
                                $uploadOk = 0;
                            }

                            // Allow certain file formats
                            if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                $uploadOk = 0;
                            }

                            // Check if $uploadOk is set to 0 by an error
                            if ($uploadOk == 0) {
                                echo "Sorry, your file was not uploaded.";
                            } else {
                                // Try to upload file
                                if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
                                    // Insert product details into the database
                                    $sql = "INSERT INTO products (supplier_id,catering_category, product_name, product_image, status, product_descriptions) 
                                            VALUES ('$id','$catering_category', '$product_name', '$image', '$status', '$product_descriptions')";

                                    if (mysqli_query($conn, $sql)) {
                                        echo "New product added successfully.";
                                        // Redirect or show success message
                                        header("Location: ../product_list.php"); // Change this to your success page
                                        exit();
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    }
                                } else {
                                    echo "Sorry, there was an error uploading your file.";
                                }
                            }
                            // Close the database connection
                            mysqli_close($conn);
                        } else {
                            // If the request is not a POST, redirect or show an error
                            header("Location: ../error.php"); // Change this to your error page
                            exit();
                        }

                        break;

                    case 'dress':

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            // Collect form data
                            $rental_retails = $_POST['rental_retails'];
                            $dress_category = $_POST['dress_category'];
                            $gender = $_POST['gender'];
                            $dress_name = $_POST['dress_name'];
                            $dress_price = $_POST['dress_price'];
                            $status = $_POST['status'];

                            // Handle file upload
                            if (isset($_FILES['dress_image']) && $_FILES['dress_image']['error'] == 0) {
                                $dress_image = $_FILES['dress_image'];
                                $upload_dir = '../../uploads/products/'; // Specify your upload directory
                                $upload_file = $upload_dir . basename($dress_image['name']);

                                // Check if file is an image
                                $check = getimagesize($dress_image['tmp_name']);
                                if ($check === false) {
                                    die('File is not an image.');
                                }

                                // Move the uploaded file to the specified directory
                                if (!move_uploaded_file($dress_image['tmp_name'], $upload_file)) {
                                    die('Error uploading file.');
                                }
                            } else {
                                die('No image uploaded or there was an upload error.');
                            }

                            // Prepare SQL query
                            $stmt = $conn->prepare("INSERT INTO dresses (supplier_id, rental_retails, dress_category, gender, dress_name, dress_price, status, dress_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

                            // Bind parameters
                            $stmt->bind_param("issssiss", $id, $rental_retails, $dress_category, $gender, $dress_name, $dress_price, $status, $upload_file);

                            // Execute query and check for success
                            if ($stmt->execute()) {
                                echo "New product added successfully.";
                                // Redirect or show success message
                                header("Location: ../product_list.php"); // Change this to your success page  
                            } else {
                                echo "Error adding product: " . $stmt->error;
                            }

                            // Close the statement and connection
                            $stmt->close();
                            $conn->close();
                        } else {
                            // Not a POST request
                            echo "Invalid request.";
                        }

                        break;

                    case 'decor':

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            // Get form data
                            $rental_retails = $_POST['rental_retails'];
                            $product_category = $_POST['product_category'];
                            $decor_name = $_POST['decor_name'];
                            $decor_price = $_POST['decor_price'];
                            $status = $_POST['status'];
                            $decor_description = $_POST['decor_description'];

                            // File upload handling
                            $target_dir = "../../uploads/products/";
                            $decor_image = $_FILES['decor_image']['name'];
                            $target_file = $target_dir . basename($decor_image);
                            $uploadOk = 1;

                            // Check if image file is a valid image or fake
                            $check = getimagesize($_FILES['decor_image']['tmp_name']);
                            if ($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "File is not an image.";
                                $uploadOk = 0;
                            }

                            // Check file size (limit to 5MB)
                            if ($_FILES['decor_image']['size'] > 5000000) {
                                echo "Sorry, your file is too large.";
                                $uploadOk = 0;
                            }

                            // Allow certain file formats
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                $uploadOk = 0;
                            }

                            // Check if everything is ok before uploading
                            if ($uploadOk == 1) {
                                if (move_uploaded_file($_FILES['decor_image']['tmp_name'], $target_file)) {
                                    // Prepare and bind
                                    $stmt = $conn->prepare("INSERT INTO decors (supplier_id, rental_retails, product_category, decor_name, decor_price, decor_image, status, decor_description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                                    $stmt->bind_param("isssssss", $id, $rental_retails, $product_category, $decor_name, $decor_price, $decor_image, $status, $decor_description);

                                    if ($stmt->execute()) {
                                        echo "<script>alert('Decor added successfully'); window.location.href='../product_list.php';</script>";
                                    } else {
                                        echo "<script>alert('Error adding product'); window.location.href='../product_list.php';</script>";
                                    }
                                    $stmt->close();
                                } else {
                                    echo "Sorry, there was an error uploading your file.";
                                }
                            }
                        }

                        break;

                    case 'venue':

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            // Get form data
                            $venue_name = $_POST['venue_name'];
                            $venue_price = $_POST['venue_price'];
                            $status = $_POST['status'];
                            $venue_description = $_POST['venue_description'];

                            if (empty($venue_name) || empty($venue_price) || empty($status)) {
                                echo "Please fill in all required fields.";
                            }

                            // File upload handling
                            $target_dir = "../../uploads/products/";
                            $venue_image = $_FILES['venue_image']['name'];
                            $target_file = $target_dir . basename($venue_image);
                            $uploadOk = 1;

                            // Check if image file is a valid image or fake
                            $check = getimagesize($_FILES['venue_image']['tmp_name']);
                            if ($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "File is not an image.";
                                $uploadOk = 0;
                            }

                            // Check file size (limit to 5MB)
                            if ($_FILES['venue_image']['size'] > 5000000) {
                                echo "Sorry, your file is too large.";
                                $uploadOk = 0;
                            }

                            // Allow certain file formats
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                $uploadOk = 0;
                            }

                            // Check if everything is ok before uploading
                            if ($uploadOk == 1) {
                                if (move_uploaded_file($_FILES['venue_image']['tmp_name'], $target_file)) {
                                    // Prepare and bind
                                    $stmt = $conn->prepare("INSERT INTO venue (supplier_id, venue_name, venue_price, venue_image, status, venue_descriptions ) VALUES (?, ?, ?, ?, ?, ?)");
                                    $stmt->bind_param("isssss", $id, $venue_name, $venue_price, $venue_image, $status, $venue_description);

                                    if ($stmt->execute()) {

                                    } else {
                                        echo "<script>alert('Error adding Venue'); window.location.href='../product_list.php';</script>";
                                    }

                                } else {
                                    echo "Sorry, there was an error uploading your file.";
                                }
                            }
                        }

                        break;

                    case 'photo_video':

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            // Get form data
                            $photo_video_name = $_POST['photo_video_name'];
                            $photo_video_price = $_POST['photo_video_price'];
                            $status = $_POST['status'];
                            $photo_video_description = $_POST['photo_video_description'];

                            if (empty($photo_video_name) || empty($photo_video_price) || empty($status)) {
                                echo "Please fill in all required fields.";
                            }

                            // File upload handling
                            $target_dir = "../../uploads/products/";
                            $photo_video_image = $_FILES['photo_video_image']['name'];
                            $target_file = $target_dir . basename($photo_video_image);
                            $uploadOk = 1;

                            // Check if image file is a valid image or fake
                            $check = getimagesize($_FILES['photo_video_image']['tmp_name']);
                            if ($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "File is not an image.";
                                $uploadOk = 0;
                            }

                            // Check file size (limit to 5MB)
                            if ($_FILES['photo_video_image']['size'] > 5000000) {
                                echo "Sorry, your file is too large.";
                                $uploadOk = 0;
                            }

                            // Allow certain file formats
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                $uploadOk = 0;
                            }

                            // Check if everything is ok before uploading
                            if ($uploadOk == 1) {
                                if (move_uploaded_file($_FILES['photo_video_image']['tmp_name'], $target_file)) {
                                    // Prepare and bind
                                    $stmt = $conn->prepare("INSERT INTO photo_video (supplier_id, photo_video_name, photo_video_price, photo_video_image, status, photo_video_description ) VALUES (?, ?, ?, ?, ?, ?)");
                                    $stmt->bind_param("isssss", $id, $photo_video_name, $photo_video_price, $photo_video_image, $status, $photo_video_description);

                                    if ($stmt->execute()) {

                                    } else {
                                        echo "<script>alert('Error adding photo_video'); window.location.href='../product_list.php';</script>";
                                    }

                                } else {
                                    echo "Sorry, there was an error uploading your file.";
                                }
                            }
                        }

                        break;


                    default:
                        // Optional: Handle the case where supplier_type does not match any expected value
                        echo '<p>No package available for this supplier type.</p>';
                        break;
                }

                // Add other fields as necessary
            }
        } else {
            echo "No supplier found with ID: $id";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the statement: " . $conn->error;
    }
} else {
    echo "Session ID is not set.";
}
?>