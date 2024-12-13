<?php
// Database connection
include '../connection/conn.php';

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

                        // Prepare the SQL query to select events for the given organizer_id
                        $query = "SELECT * FROM package_catering WHERE supplier_id = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("i", $id); // Bind the organizer_id as an integer
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Check if there are events to display
                        if ($result->num_rows > 0) {
                            // Start building the HTML for the cards
                            echo '<div class="row">'; // Start a row for the cards
                            while ($row = $result->fetch_assoc()) {
                                // Fetching the event details
                                $catering_name = htmlspecialchars($row['catering_name']);
                                $catering_category = htmlspecialchars($row['catering_category']);
                                $catering_price = htmlspecialchars($row['catering_price']);
                                $catering_participants = htmlspecialchars($row['catering_participants']);
                                $package_id = htmlspecialchars($row['package_id']);


                                // Generate the card HTML
                                echo '<div class="col-lg-3 col-6 mb-3">
                                                                <div class="card">
                                                                    <img src="../1332803.png" class="card-img-top" alt="Event Image" style="width: 100%; height: 250px; object-fit: cover;">
                                                                    <div class="card-body d-flex flex-column justify-content-between" style="height: 100%;">
                                                                        <h2 class="text-center"> ' . $catering_name . '</h2>
                                                                        <h3 class="text-center"> ' . $catering_category . '</h3>
                                                                        <p class="text-center"> Price: ₱' . $catering_price . '</p>
                                                                        <p class="text-center"> Participants: ' . $catering_participants . '</p>
                                                                        <button data-bs-toggle="modal" data-bs-target="#view_package_' . $package_id . '" class="btn btn-primary">View Packages</button>
                                                                    </div>
                                                                </div>
                                                            </div>';

                                // Prepare the SQL query to select products for the current event
                                $products_query = "SELECT d.product_name, d.product_image FROM package_products_1 AS pp
                                                                            INNER JOIN products AS d ON d.product_id = pp.product_id WHERE pp.supplier_id = ?";
                                $products_stmt = $conn->prepare($products_query);
                                $products_stmt->bind_param("i", $id); // Bind the event_id as an integer
                                $products_stmt->execute();
                                $products_result = $products_stmt->get_result();

                                // Check if there are products to display
                                if ($products_result->num_rows > 0) {
                                    echo '
                                                                <div class="modal fade" id="view_package_' . $package_id . '" tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Packages for ' . $catering_name . '</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="card-body">';

                                    while ($product_row = $products_result->fetch_assoc()) {
                                        $product_name = htmlspecialchars($product_row['product_name']);
                                        $product_image = htmlspecialchars($product_row['product_image']);
                                        echo '           <div class="col-12 col-sm-12 col-md-12">
                                                                <div class="info-box shadow-lg">
                                                                    <span class="info-box-icon shadow-sm">
                                                                        <img src="../uploads/products/' . $product_image . '" alt="Supplier Image">
                                                                    </span>
                                                                    <div class="info-box-content" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" >
                                                                        <span class="info-box-text">' . $product_name . '</span>
                                                                    </div>
                                                                    <!-- /.info-box-content -->
                                                                </div>
                                                                <!-- /.info-box -->
                                                            </div>';
                                    }

                                    echo '                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                }
                            }
                            echo '</div>'; // End the row
                        } else {
                            echo '<p>No events found.</p>';
                        }

                        break;

                    case 'dress':
                        // Prepare the SQL query to select events for the given organizer_id
                        $query = "SELECT * FROM package_dress WHERE supplier_id = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("i", $id); // Bind the organizer_id as an integer
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Check if there are events to display
                        if ($result->num_rows > 0) {
                            // Start building the HTML for the cards
                            echo '<div class="row">'; // Start a row for the cards
                            while ($row = $result->fetch_assoc()) {
                                // Fetching the event details
                                $dress_name = htmlspecialchars($row['dress_name']);
                                $dress_category = htmlspecialchars($row['dress_category']);
                                $dress_price = htmlspecialchars($row['dress_price']);
                                $dress_participants = htmlspecialchars($row['dress_participants']);
                                $package_id = htmlspecialchars($row['package_id']);


                                // Generate the card HTML
                                echo '<div class="col-lg-3 col-6 mb-3">
                                        <div class="card">
                                            <img src="../1332803.png" class="card-img-top" alt="Event Image" style="width: 100%; height: 250px; object-fit: cover;">
                                            <div class="card-body d-flex flex-column justify-content-between" style="height: 100%;">
                                                <h2 class="text-center"> ' . $dress_name . '</h2>
                                                <h3 class="text-center"> ' . $dress_category . '</h3>
                                                <p class="text-center"> Price: ₱' . $dress_price . '</p>
                                                <p class="text-center"> Participants: ' . $dress_participants . '</p>
                                                <button data-bs-toggle="modal" data-bs-target="#view_package_' . $package_id . '" class="btn btn-primary">View Packages</button>
                                            </div>
                                        </div>
                                    </div>';

                                // Prepare the SQL query to select products for the current event
                                $products_query = "SELECT d.dress_name, d.dress_image FROM package_products_1 AS pp
                                                    INNER JOIN dresses AS d ON d.dress_id = pp.product_id WHERE pp.supplier_id = ?";
                                $products_stmt = $conn->prepare($products_query);
                                $products_stmt->bind_param("i", $id); // Bind the event_id as an integer
                                $products_stmt->execute();
                                $products_result = $products_stmt->get_result();

                                // Check if there are products to display
                                if ($products_result->num_rows > 0) {
                                    echo '
                                        <div class="modal fade" id="view_package_' . $package_id . '" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Packages for ' . $dress_name . '</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-body">';

                                    while ($product_row = $products_result->fetch_assoc()) {
                                        $dress_name = htmlspecialchars($product_row['dress_name']);
                                        $dress_image = htmlspecialchars($product_row['dress_image']);
                                        echo '           <div class="col-12 col-sm-12 col-md-12">
                                        <div class="info-box shadow-lg">
                                            <span class="info-box-icon shadow-sm">
                                                <img src="../uploads/products/' . $dress_image . '" alt="Supplier Image">
                                            </span>
                                            <div class="info-box-content" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" >
                                                <span class="info-box-text">' . $dress_name . '</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>';
                                    }

                                    echo '                </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                                }
                            }
                            echo '</div>'; // End the row
                        } else {
                            echo '<p>No events found.</p>';
                        }

                        break;

                    case 'decor':

                        // Prepare the SQL query to select events for the given organizer_id
                        $query = "SELECT * FROM package_decor WHERE supplier_id = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("i", $id); // Bind the organizer_id as an integer
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Check if there are events to display
                        if ($result->num_rows > 0) {
                            // Start building the HTML for the cards
                            echo '<div class="row">'; // Start a row for the cards
                            while ($row = $result->fetch_assoc()) {
                                // Fetching the event details
                                $decor_name = htmlspecialchars($row['decor_name']);
                                $decor_category = htmlspecialchars($row['decor_category']);
                                $decor_price = htmlspecialchars($row['decor_price']);
                                $decor_participants = htmlspecialchars($row['decor_participants']);
                                $package_id = htmlspecialchars($row['package_id']);


                                // Generate the card HTML
                                echo '<div class="col-lg-3 col-6 mb-3">
                                                                <div class="card">
                                                                    <img src="../1332803.png" class="card-img-top" alt="Event Image" style="width: 100%; height: 250px; object-fit: cover;">
                                                                    <div class="card-body d-flex flex-column justify-content-between" style="height: 100%;">
                                                                        <h2 class="text-center"> ' . $decor_name . '</h2>
                                                                        <h3 class="text-center"> ' . $decor_category . '</h3>
                                                                        <p class="text-center"> Price: ₱' . $decor_price . '</p>
                                                                        <p class="text-center"> Participants: ' . $decor_participants . '</p>
                                                                        <button data-bs-toggle="modal" data-bs-target="#view_package_' . $package_id . '" class="btn btn-primary">View Packages</button>
                                                                    </div>
                                                                </div>
                                                            </div>';

                                // Prepare the SQL query to select products for the current event
                                $products_query = "SELECT d.decor_name, d.decor_image FROM package_products_1 AS pp
                                                                            INNER JOIN decors AS d ON d.decor_id = pp.product_id WHERE pp.supplier_id = ?";
                                $products_stmt = $conn->prepare($products_query);
                                $products_stmt->bind_param("i", $id); // Bind the event_id as an integer
                                $products_stmt->execute();
                                $products_result = $products_stmt->get_result();

                                // Check if there are products to display
                                if ($products_result->num_rows > 0) {
                                    echo '
                                                                <div class="modal fade" id="view_package_' . $package_id . '" tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Packages for ' . $decor_name . '</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="card-body">';

                                    while ($product_row = $products_result->fetch_assoc()) {
                                        $product_name = htmlspecialchars($product_row['decor_name']);
                                        $product_image = htmlspecialchars($product_row['decor_image']);
                                        echo '           <div class="col-12 col-sm-12 col-md-12">
                                                                <div class="info-box shadow-lg">
                                                                    <span class="info-box-icon shadow-sm">
                                                                        <img src="../uploads/products/' . $product_image . '" alt="Supplier Image">
                                                                    </span>
                                                                    <div class="info-box-content" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" >
                                                                        <span class="info-box-text">' . $product_name . '</span>
                                                                    </div>
                                                                    <!-- /.info-box-content -->
                                                                </div>
                                                                <!-- /.info-box -->
                                                            </div>';
                                    }

                                    echo '                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                }
                            }
                            echo '</div>'; // End the row
                        } else {
                            echo '<p>No events found.</p>';
                        }

                        break;

                    default:
                        // Optional: Handle the case where supplier_type does not match any expected value
                        echo '<p>No product available for this supplier type.</p>';
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