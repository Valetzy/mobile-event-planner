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

                        // Check if the form is submitted
                        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                            // Get the form data
                            $catering_name = $_POST['catering_name'];
                            $catering_category = $_POST['catering_category'];
                            $catering_price = $_POST['catering_price'];
                            $catering_participants = $_POST['catering_participants'];
                            $selected_products = isset($_POST['selected_products']) ? $_POST['selected_products'] : [];

                            // Validate required fields
                            if (empty($catering_name) || empty($catering_price) || empty($catering_participants)) {
                                echo "Please fill in all required fields.";
                                exit;
                            }

                            // Validate that at least one product is selected
                            if (empty($selected_products)) {
                                echo "Please select at least one product.";
                                exit;
                            }

                            // Check if the package name already exists
                            $check_query = "SELECT * FROM package_catering WHERE catering_name = ? AND supplier_id = ?";
                            $stmt_check = $conn->prepare($check_query);
                            $stmt_check->bind_param("si", $catering_name, $id);
                            $stmt_check->execute();
                            $result = $stmt_check->get_result();

                            if ($result->num_rows > 0) {
                                echo "A package with this name already exists. Please choose a different name.";
                            } else {
                                // Prepare to insert the package information
                                $query = "INSERT INTO package_catering (supplier_id, catering_name, catering_price, catering_participants, catering_category) VALUES (?, ?, ?, ?, ?)";
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param("isdis", $id, $catering_name, $catering_price, $catering_participants, $catering_category);

                                if ($stmt->execute()) {
                                    // Get the last inserted package ID
                                    $package_id = $stmt->insert_id;

                                    // Insert selected products into the package_products table
                                    $query_product = "INSERT INTO package_products_1 ( supplier_id, package_id, product_id) VALUES (?, ?, ?)";
                                    $stmt_product = $conn->prepare($query_product);

                                    foreach ($selected_products as $product_id) {
                                        $stmt_product->bind_param("iii", $id, $package_id, $product_id);
                                        $stmt_product->execute();
                                    }

                                    echo "Package added successfully!";
                                    header("Location: ../package_list.php"); // Change this to your success page
                                } else {
                                    echo "Error: " . $stmt->error;
                                }

                                // Close the statements

                            }

                            // Close the check statement and the connection
                            $stmt_check->close();
                            $conn->close();
                        } else {
                            echo "Invalid request.";
                        }


                        break;

                    case 'dress':

                        // Check if the form is submitted
                        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                            // Get the form data
                            $catering_name = $_POST['dress_name'];
                            $catering_category = $_POST['dress_category'];
                            $catering_price = $_POST['dress_price'];
                            $catering_participants = $_POST['dress_participants'];
                            $selected_products = isset($_POST['selected_dress']) ? $_POST['selected_dress'] : [];

                            // Validate required fields
                            if (empty($catering_name) || empty($catering_price) || empty($catering_participants)) {
                                echo "Please fill in all required fields.";
                                exit;
                            }

                            // Validate that at least one product is selected
                            if (empty($selected_products)) {
                                echo "Please select at least one product.";
                                exit;
                            }

                            // Check if the package name already exists
                            $check_query = "SELECT * FROM package_dress WHERE dress_name = ? AND supplier_id = ?";
                            $stmt_check = $conn->prepare($check_query);
                            $stmt_check->bind_param("si", $catering_name, $id);
                            $stmt_check->execute();
                            $result = $stmt_check->get_result();

                            if ($result->num_rows > 0) {
                                echo "A package with this name already exists. Please choose a different name.";
                            } else {
                                // Prepare to insert the package information
                                $query = "INSERT INTO package_dress (supplier_id, dress_name, dress_price, dress_participants, dress_category) VALUES (?, ?, ?, ?, ?)";
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param("isdis", $id, $catering_name, $catering_price, $catering_participants, $catering_category);

                                if ($stmt->execute()) {
                                    // Get the last inserted package ID
                                    $package_id = $stmt->insert_id;

                                    // Insert selected products into the package_products table
                                    $query_product = "INSERT INTO package_products_1 ( supplier_id, package_id, product_id) VALUES (?, ?, ?)";
                                    $stmt_product = $conn->prepare($query_product);

                                    foreach ($selected_products as $product_id) {
                                        $stmt_product->bind_param("iii", $id, $package_id, $product_id);
                                        $stmt_product->execute();
                                    }

                                    echo "Package added successfully!";
                                    header("Location: ../package_list.php"); // Change this to your success page
                                } else {
                                    echo "Error: " . $stmt->error;
                                }

                                // Close the statements

                            }

                            // Close the check statement and the connection
                            $stmt_check->close();
                            $conn->close();
                        } else {
                            echo "Invalid request.";
                        }


                        break;

                    case 'decor':

                        // Check if the form is submitted
                        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                            // Get the form data
                            $catering_name = $_POST['decor_name'];
                            $catering_category = $_POST['decor_category'];
                            $catering_price = $_POST['decor_price'];
                            $catering_participants = $_POST['decor_participants'];
                            $selected_products = isset($_POST['selected_decor']) ? $_POST['selected_decor'] : [];

                            // Validate required fields
                            if (empty($catering_name) || empty($catering_price) || empty($catering_participants)) {
                                echo "Please fill in all required fields.";
                                exit;
                            }

                            // Validate that at least one product is selected
                            if (empty($selected_products)) {
                                echo "Please select at least one product.";
                                exit;
                            }

                            // Check if the package name already exists
                            $check_query = "SELECT * FROM package_decor WHERE decor_name = ? AND supplier_id = ?";
                            $stmt_check = $conn->prepare($check_query);
                            $stmt_check->bind_param("si", $catering_name, $id);
                            $stmt_check->execute();
                            $result = $stmt_check->get_result();

                            if ($result->num_rows > 0) {
                                echo "A package with this name already exists. Please choose a different name.";
                            } else {
                                // Prepare to insert the package information
                                $query = "INSERT INTO package_decor (supplier_id, decor_name, decor_price, decor_participants, decor_category) VALUES (?, ?, ?, ?, ?)";
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param("isdis", $id, $catering_name, $catering_price, $catering_participants, $catering_category);

                                if ($stmt->execute()) {
                                    // Get the last inserted package ID
                                    $package_id = $stmt->insert_id;

                                    // Insert selected products into the package_products table
                                    $query_product = "INSERT INTO package_products_1 ( supplier_id, package_id, product_id) VALUES (?, ?, ?)";
                                    $stmt_product = $conn->prepare($query_product);

                                    foreach ($selected_products as $product_id) {
                                        $stmt_product->bind_param("iii", $id, $package_id, $product_id);
                                        $stmt_product->execute();
                                    }

                                    echo "Package added successfully!";
                                    header("Location: ../package_list.php"); // Change this to your success page
                                } else {
                                    echo "Error: " . $stmt->error;
                                }

                                // Close the statements

                            }

                            // Close the check statement and the connection
                            $stmt_check->close();
                            $conn->close();
                        } else {
                            echo "Invalid request.";
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