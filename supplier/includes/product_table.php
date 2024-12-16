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

                        $query_products = "SELECT * FROM products WHERE supplier_id = ?";
                        $stmt_products = $conn->prepare($query_products);
                        $stmt_products->bind_param("i", $id);
                        $stmt_products->execute();
                        $products_result = $stmt_products->get_result();

                        echo '<table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Product Image</th>
                                    <th>Catering Status</th>
                                </tr>
                            </thead>
                            <tbody>';
                        // Loop through each product and populate the table rows
                        while ($products = $products_result->fetch_assoc()) {
                            echo "<tr class='align-middle'>";
                            echo "<td>" . htmlspecialchars($products['product_id']) . "</td>";
                            echo "<td>" . htmlspecialchars($products['catering_category']) . "</td>";
                            echo "<td>" . htmlspecialchars($products['product_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($products['product_descriptions']) . "</td>";
                            echo "<td><img src='../uploads/products/" . htmlspecialchars($products['product_image']) . "' alt='Product Image' style='width: 50px; height: 50px;'></td>";
                            echo "<td>";
                            if (htmlspecialchars($products['status']) === 'Available') {
                                echo "<a href='functions/product_unavailable_status.php?id=" . htmlspecialchars($products['product_id']) ."' class='btn btn-primary'>Available</a>";
                            } else {
                                echo "<a href='functions/product_available_status.php?id=" . htmlspecialchars($products['product_id']) ."' class='btn btn-secondary'>Unavailable</a>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }

                        echo '</tbody>
                                    </table>';

                        break;

                    case 'dress':

                        $query_products = "SELECT * FROM dresses WHERE supplier_id = ?";
                        $stmt_products = $conn->prepare($query_products);
                        $stmt_products->bind_param("i", $id);
                        $stmt_products->execute();
                        $products_result = $stmt_products->get_result();

                        echo '<table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Dress Name</th>
                                            <th>Dress Category</th>
                                            <th>Rental/Retail</th>
                                            <th>Gender</th>
                                            <th>Dress Price</th>
                                            <th>Dress Image</th>
                                            <th>Dress Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                        // Loop through each product and populate the table rows
                        while ($products = $products_result->fetch_assoc()) {

                            echo '<tr class="align-middle">
                                                    <td>' . htmlspecialchars($products['dress_id']) . '</td>
                                                    <td>' . htmlspecialchars($products['dress_name']) . '</td>
                                                    <td>' . htmlspecialchars($products['dress_category']) . '</td>
                                                    <td>' . htmlspecialchars($products['rental_retails']) . '</td>
                                                    <td>' . htmlspecialchars($products['gender']) . '</td>
                                                    <td>' . htmlspecialchars($products['dress_price']) . '</td>
                                                    <td><img src="../uploads/products/' . htmlspecialchars($products['dress_image']) . '" alt="Product Image" style="width: 50px; height: 50px;"></td>
                                                    <td>' . htmlspecialchars($products['status']) . '</td>
                                                </tr>';
                        }
                        echo ' </tbody>
                                        </table>';


                        break;

                    case 'decor':

                        $query_products = "SELECT * FROM decors WHERE supplier_id = ?";
                        $stmt_products = $conn->prepare($query_products);
                        $stmt_products->bind_param("i", $id);
                        $stmt_products->execute();
                        $products_result = $stmt_products->get_result();

                        echo '<table class="table table-bordered">
                                    <thead> 
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Decor Name </th>
                                            <th>Decor Category</th>
                                            <th>Rental/Retail</th>
                                            <th>Decor Price</th>
                                            <th>Decor Description</th>
                                            <th>Decor Stocks</th>
                                            <th>Decor Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                        // Loop through each product and populate the table rows
                        $index = 1;
                        while ($products = $products_result->fetch_assoc()) {
                            echo "<tr class='align-middle'>";
                            echo "<td>" . $index++ . "</td>";
                            echo "<td>" . htmlspecialchars($products['decor_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($products['product_category']) . "</td>";
                            echo "<td>" . htmlspecialchars($products['rental_retails']) . "</td>";
                            echo "<td>" . htmlspecialchars($products['decor_price']) . "</td>";
                            echo "<td>" . htmlspecialchars($products['decor_description']) . "</td>";
                            echo "<td><img src='../uploads/products/" . htmlspecialchars($products['decor_image']) . "' alt='Product Image' style='width: 50px; height: 50px;'></td>";
                            echo "<td>" . htmlspecialchars($products['stocks']) . "</td>";
                            echo "<td>";
                            if (htmlspecialchars($products['status']) === 'available') {
                                echo "<a href='functions/unavailable_status.php?id=" . htmlspecialchars($products['decor_id']) ."' class='btn btn-primary'>Available</a>";
                            } else {
                                echo "<a href='functions/available_status.php?id=" . htmlspecialchars($products['decor_id']) ."' class='btn btn-secondary'>Unavailable</a>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }


                        echo '</tbody>
                                                </table>';

                        break;

                    case 'venue':

                        $query_products = "SELECT * FROM venue WHERE supplier_id = ?";
                        $stmt_products = $conn->prepare($query_products);
                        $stmt_products->bind_param("i", $id);
                        $stmt_products->execute();
                        $products_result = $stmt_products->get_result();

                        echo '<table class="table table-bordered">
                                        <thead> 
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Venue Name </th>
                                                <th>Venue Price</th>
                                                <th>Venue Description</th>
                                                <th>Venue Image</th>
                                                <th>Venue Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                        // Loop through each product and populate the table rows
                        while ($products = $products_result->fetch_assoc()) {
                            echo "<tr class='align-middle'>";
                            echo "<td>" . htmlspecialchars($products['venue_id']) . "</td>";
                            echo "<td>" . htmlspecialchars($products['venue_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($products['venue_price']) . "</td>";
                            echo "<td>" . htmlspecialchars($products['venue_descriptions']) . "</td>";
                            echo "<td><img src='../uploads/products/" . htmlspecialchars($products['venue_image']) . "' alt='Product Image' style='width: 50px; height: 50px;'></td>";
                            echo "<td>" . htmlspecialchars($products['status']) . "</td>";
                            echo "</tr>";
                        }

                        echo '</tbody>
                                                    </table>';

                        break;

                    case 'photo_video':

                        $query_products = "SELECT * FROM photo_video WHERE supplier_id = ?";
                        $stmt_products = $conn->prepare($query_products);
                        $stmt_products->bind_param("i", $id);
                        $stmt_products->execute();
                        $products_result = $stmt_products->get_result();

                        echo '<table class="table table-bordered">
                                            <thead> 
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Venue Name </th>
                                                    <th>Venue Price</th>
                                                    <th>Venue Description</th>
                                                    <th>Venue Image</th>
                                                    <th>Venue Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                        // Loop through each product and populate the table rows
                        while ($products = $products_result->fetch_assoc()) {
                            echo "<tr class='align-middle'>";
                            echo "<td>" . htmlspecialchars($products['photo_video_id']) . "</td>";
                            echo "<td>" . htmlspecialchars($products['photo_video_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($products['photo_video_price']) . "</td>";
                            echo "<td>" . htmlspecialchars($products['photo_video_description']) . "</td>";
                            echo "<td><img src='../uploads/products/" . htmlspecialchars($products['photo_video_image']) . "' alt='Product Image' style='width: 50px; height: 50px;'></td>";
                            echo "<td>" . htmlspecialchars($products['status']) . "</td>";
                            echo "</tr>";
                        }

                        echo '</tbody>
                                                        </table>';

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