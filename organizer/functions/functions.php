<?php
function getSupplierById($conn, $supplier_id)
{
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $supplier_id = intval($supplier_id); // Ensure the ID is an integer

        // Query to get supplier details
        $query = "SELECT * FROM supplier WHERE supplier_id = $supplier_id";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $supplier = mysqli_fetch_assoc($result);
            $supplierName = htmlspecialchars($supplier['business_name']);
            $imagePath = !empty($supplier['business_pic']) ? htmlspecialchars($supplier['business_pic']) : '../uploads/suppliers/OIP.jpg';

            echo '<div class="card-header d-flex flex-column align-items-center">';
            echo '<h1><strong>' . $supplierName . '</strong></h1>';
            echo '<img class="user-image rounded-circle shadow" src="../uploads/suppliers/' . $imagePath . '" alt="" width="100px" height="100px">';
            echo '<div class="m-3">';

            // Query to check request status
            $statusQuery = "SELECT status FROM organizer_request WHERE supplier_id = $supplier_id AND organizer_id = $id";
            $statusResult = mysqli_query($conn, $statusQuery);

            if ($statusResult && mysqli_num_rows($statusResult) > 0) {
                $statusRow = mysqli_fetch_assoc($statusResult);
                $status = $statusRow['status'];

                if ($status === 'request') {
                    // Display cancel button
                    echo '<form action="functions/cancel.php" method="post">
                            <input type="hidden" name="cancel" value="cancel">
                            <input type="hidden" name="supplier_id" value="' . htmlspecialchars($supplier['supplier_id']) . '">
                            <input type="hidden" name="organizer_id" value="' . $id . '">
                            <button class="btn btn-danger m-3" type="submit">Cancel Request</button>
                          </form>';
                } elseif ($status === 'cancel') {
                    // Display request button
                    echo '<form action="functions/request.php" method="post">
                            <input type="hidden" name="request" value="request">
                            <input type="hidden" name="supplier_id" value="' . htmlspecialchars($supplier['supplier_id']) . '">
                            <input type="hidden" name="organizer_id" value="' . $id . '">
                            <button class="btn btn-primary m-3" type="submit">Request</button>
                          </form>';
                } elseif ($status === 'approved') {
                    // Display approved button
                    echo '<button class="btn btn-success m-3" type="button">Approved</button>';
                } elseif ($status === 'deny') {
                    // Display approved button
                    echo '<button class="btn btn-danger m-3" type="button">Denied</button>';
                } elseif ($status === ' ') {
                    // Display approved button
                    echo '<form action="functions/request.php" method="post">
                            <input type="hidden" name="request" value="request">
                            <input type="hidden" name="supplier_id" value="' . htmlspecialchars($supplier['supplier_id']) . '">
                            <input type="hidden" name="organizer_id" value="' . $id . '">
                            <button class="btn btn-primary m-3" type="submit">Request</button>
                          </form>';
                }
            } else {
                // If no record found, display request button
                echo '<form action="functions/request.php" method="post">
                        <input type="hidden" name="request" value="request">
                        <input type="hidden" name="supplier_id" value="' . htmlspecialchars($supplier['supplier_id']) . '">
                        <input type="hidden" name="organizer_id" value="' . $id . '">
                        <button class="btn btn-primary m-3" type="submit">Request</button>
                      </form>';
            }

            echo '</div></div>';
        }
    }
}


function displayProductsBySupplierId($conn, $supplier_id, $supplier_type)
{

    switch ($supplier_type) {
        case 'catering':

            // Sanitize and prepare the query
            $supplier_id = intval($supplier_id); // Ensure the ID is an integer to prevent SQL injection
            $query = "SELECT * FROM products WHERE supplier_id = $supplier_id";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($product = mysqli_fetch_assoc($result)) {
                    // Assuming the products table has 'name' and 'image_path' columns
                    $productName = htmlspecialchars($product['product_name']);
                    $imagePath = !empty($product['product_image']) ? htmlspecialchars($product['product_image']) : '';

                    echo '<div class="col-lg-3 col-6 mb-3 ">';
                    echo '    <div class="card">';
                    echo '        <img src="../uploads/products/' . $imagePath . '" class="card-img-top" alt="' . $imagePath . '" style="width: 100%; height: 250px; object-fit: cover;">';
                    echo '        <div class="card-body d-flex justify-content-center">';
                    echo '            <h5 class="card-title"><strong>' . $productName . '</strong></h5>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';

                }
            } else {
                echo '<div class="col-12">';
                echo '    <p>No products found for this supplier.</p>';
                echo '</div>';
            }

            break;

        case 'decor':

            // Sanitize and prepare the query
            $supplier_id = intval($supplier_id); // Ensure the ID is an integer to prevent SQL injection
            $query = "SELECT * FROM decors WHERE supplier_id = $supplier_id";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($product = mysqli_fetch_assoc($result)) {
                    // Assuming the products table has 'name' and 'image_path' columns
                    $productName = htmlspecialchars($product['decor_name']);
                    $imagePath = !empty($product['decor_image']) ? htmlspecialchars($product['decor_image']) : '';

                    echo '<div class="col-lg-3 col-6 mb-3 ">';
                    echo '    <div class="card">';
                    echo '        <img src="../uploads/products/' . $imagePath . '" class="card-img-top" alt="' . $imagePath . '" style="width: 100%; height: 250px; object-fit: cover;">';
                    echo '        <div class="card-body d-flex justify-content-center">';
                    echo '            <h5 class="card-title"><strong>' . $productName . '</strong></h5>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';

                }
            } else {
                echo '<div class="col-12">';
                echo '    <p>No products found for this supplier.</p>';
                echo '</div>';
            }

            break;

        case 'dress':

            // Sanitize and prepare the query
            $supplier_id = intval($supplier_id); // Ensure the ID is an integer to prevent SQL injection
            $query = "SELECT * FROM dresses WHERE supplier_id = $supplier_id";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($product = mysqli_fetch_assoc($result)) {
                    // Assuming the products table has 'name' and 'image_path' columns
                    $productName = htmlspecialchars($product['dress_name']);
                    $imagePath = !empty($product['dress_image']) ? htmlspecialchars($product['dress_image']) : '';

                    echo '<div class="col-lg-3 col-6 mb-3 ">';
                    echo '    <div class="card">';
                    echo '        <img src="../uploads/products/' . $imagePath . '" class="card-img-top" alt="' . $imagePath . '" style="width: 100%; height: 250px; object-fit: cover;">';
                    echo '        <div class="card-body d-flex justify-content-center">';
                    echo '            <h5 class="card-title"><strong>' . $productName . '</strong></h5>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';

                }
            } else {
                echo '<div class="col-12">';
                echo '    <p>No products found for this supplier.</p>';
                echo '</div>';
            }

            break;

            case 'venue':

                // Sanitize and prepare the query
                $supplier_id = intval($supplier_id); // Ensure the ID is an integer to prevent SQL injection
                $query = "SELECT * FROM venue WHERE supplier_id = $supplier_id";
                $result = mysqli_query($conn, $query);
    
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($product = mysqli_fetch_assoc($result)) {
                        // Assuming the products table has 'name' and 'image_path' columns
                        $productName = htmlspecialchars($product['venue_name']);
                        $imagePath = !empty($product['venue_image']) ? htmlspecialchars($product['venue_image']) : '';
    
                        echo '<div class="col-lg-3 col-6 mb-3 ">';
                        echo '    <div class="card">';
                        echo '        <img src="../uploads/products/' . $imagePath . '" class="card-img-top" alt="' . $imagePath . '" style="width: 100%; height: 250px; object-fit: cover;">';
                        echo '        <div class="card-body d-flex justify-content-center">';
                        echo '            <h5 class="card-title"><strong>' . $productName . '</strong></h5>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
    
                    }
                } else {
                    echo '<div class="col-12">';
                    echo '    <p>No products found for this supplier.</p>';
                    echo '</div>';
                }
    
                break;
    }


}

function displayEventCards($conn)
{
    // Start the session to retrieve the session ID
    $organizer_id = $_SESSION['id']; // Assuming 'sessionid' is stored in session

    // Prepare the SQL query to select events for the given organizer_id
    $query = "SELECT * FROM events INNER JOIN event_types ON event_types.event_type_id = events.event_type WHERE organizer_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $organizer_id); // Bind the organizer_id as an integer
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are events to display
    if ($result->num_rows > 0) {
        // Start building the HTML for the cards
        echo '<div class="row">'; // Start a row for the cards
        while ($row = $result->fetch_assoc()) {
            // Fetching the event details
            $title = htmlspecialchars($row['theme']);
            $event_type = htmlspecialchars($row['event_name']);
            $image_path = htmlspecialchars($row['theme_photo']);
            $event_id = htmlspecialchars($row['event_id']);
            $price = htmlspecialchars($row['price']);
            $participants = htmlspecialchars($row['participants']);
            $event_package_name = htmlspecialchars($row['event_package_name']);

            // Generate the card HTML
            echo '<div class="col-lg-3 col-6 mb-3">
                    <div class="card">
                        <img src="../uploads/products/' . $image_path . '" class="card-img-top" alt="Event Image" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="card-body d-flex flex-column justify-content-between" style="height: 100%;">
                            <h2 class="text-center"> ' . $event_package_name . '</h2>
                            <h3 class="text-center"> ' . $event_type . '</h3>
                            <p class="text-center"> Theme: ' . $title . '</p>
                            <p class="text-center"> Price: ₱' . $price . '</p>
                            <p class="text-center"> Participants: ' . $participants . '</p>
                            <button data-bs-toggle="modal" data-bs-target="#view_package_' . $event_id . '" class="btn btn-primary">View Packages</button>
                        </div>
                    </div>
                </div>';

            // Prepare the SQL query to select products for the current event
            $products_query = "SELECT ogp.product_name, ogp.product_photo FROM event_products AS ep INNER JOIN organizer_products AS ogp ON ogp.orga_products_id = ep.product_id WHERE event_id = ?";
            $products_stmt = $conn->prepare($products_query);
            $products_stmt->bind_param("i", $event_id); // Bind the event_id as an integer
            $products_stmt->execute();
            $products_result = $products_stmt->get_result();

            // Check if there are products to display
            if ($products_result->num_rows > 0) {
                echo '
                    <div class="modal fade" id="view_package_' . $event_id . '" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Packages for ' . $title . '</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">';

                while ($product_row = $products_result->fetch_assoc()) {
                    $product_name = htmlspecialchars($product_row['product_name']);
                    $product_photo = htmlspecialchars($product_row['product_photo']);
                    echo '           <div class="col-12 col-sm-12 col-md-12">
                                        <div class="info-box shadow-lg">
                                            <span class="info-box-icon shadow-sm">
                                                <img src="../images/' . $product_photo . '" alt="Supplier Image">
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
}
