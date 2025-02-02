<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php"); // Redirect to login if not logged in
    exit();
}

include '../connection/conn.php';

// Get the event ID from GET request
$get_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($get_id > 0) {
    // Prepare the SQL query
    $query = "SELECT 
                e.event_package_name, et.event_name, e.event_type, e.theme, e.participants, e.price, e.theme_photo, e.supplier_venue, s.business_name, e.supplier_location
              FROM events AS e
              LEFT JOIN event_types AS et ON et.event_type_id = e.event_type
              LEFT JOIN supplier AS s ON s.supplier_id = e.supplier_venue
              WHERE e.event_id = ?";
    $stmt = $conn->prepare(query: $query);
    $stmt->bind_param("i", $get_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $event = $result->fetch_assoc();

        $event_package_name = htmlspecialchars($event['event_package_name']);
        $event_name = htmlspecialchars($event['event_name']);
        $event_type = htmlspecialchars($event['event_type']);
        $theme = htmlspecialchars($event['theme']);
        $participants = htmlspecialchars($event['participants']);
        $price = htmlspecialchars($event['price']);
        $theme_photo = htmlspecialchars($event['theme_photo']);
        $supplier_venue = htmlspecialchars($event['supplier_venue']);
        $business_name = htmlspecialchars($event['business_name']);
        $supplier_location = htmlspecialchars($event['supplier_location']);
            
       

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Package</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .info-box {
        display: flex;
        align-items: center;
        width: 300px;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        background: #fff;
        margin: 2px;
        position: relative;
    }

    .info-box img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .info-box .text {
        font-size: 14px;
    }

    .info-box h4 {
        margin: 0;
        font-size: 16px;
        color: #333;
    }

    .info-box p {
        margin: 2px 0 0;
        color: #666;
    }

    .delete-btn {
          position: absolute;
          top: 5px;
          right: 5px;
          background: red;
          color: white;
          border: none;
          width: 20px;
          height: 20px;
          display: flex;
          align-items: center;
          justify-content: center;
          cursor: pointer;
          border-radius: 50%;
          font-size: 14px;
          line-height: 1;
          padding: 0;
      }
</style>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h3 class="text-center mb-4">Edit Event Package</h3>
            <form action="edit_event.php" enctype="multipart/form-data" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="card-border">
                                <div class="card-border-body">
                                    <div class="row">

                                    <input type="hidden" name="event_id" value="<?= $get_id ?>">

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Event Name<span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="event_package_name"
                                                    value="<?php echo $event_package_name ?>" required
                                                    placeholder="Enter Event Name">
                                            </div>
                                        </div>

                                        <?php
                                        // Check if the session variable is set
                                        if (isset($_SESSION['id'])) {
                                            $query_products = "SELECT * FROM event_types"; // Removed the WHERE clause
                                            $stmt_products = $conn->prepare($query_products);
                                            $stmt_products->execute();
                                            $products_result = $stmt_products->get_result();
                                            ?>
                                            <div class="col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Event Type</label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="event_type" id="rental_retails">
                                                            <option selected value="<?php echo $event_type ?>" ><?php echo $event_name ?></option>
                                                            <?php while ($products = $products_result->fetch_assoc()) { ?>
                                                                <option
                                                                    value="<?php echo htmlspecialchars($products['event_type_id']); ?>">
                                                                    <?php echo htmlspecialchars($products['event_name']); ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Create Theme<span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="theme" required value="<?= $theme ?>"
                                                    placeholder="Enter Theme Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Participants<span
                                                        class="text-red">*</span></label>
                                                <input type="number" class="form-control" name="participants" required value="<?= $participants ?>"
                                                    placeholder="Enter Participants">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Price<span class="text-red">*</span></label>
                                                <input type=" number" class="form-control" name="price" required value="<?= $price ?>"
                                                    placeholder="Enter Price">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Photo<span class="text-red">*</span></label>
                                                <input type="file" class="form-control" name="theme_photo">
                                                <?php if (!empty($theme_photo)): ?>
                                                    <p>Current File: <?= htmlspecialchars($theme_photo) ?></p>
                                                <?php endif; ?>
                                                <input type="hidden" name="existing_image" value="<?= htmlspecialchars($theme_photo) ?>" >

                                            </div>
                                        </div>

                                        <?php
                                        // Check if the session variable is set
                                        if (isset($_SESSION['id'])) {
                                            $query_products = "SELECT * FROM supplier WHERE supplier_type = 'venue'";
                                            $stmt_products = $conn->prepare($query_products);
                                            $stmt_products->execute();
                                            $products_result = $stmt_products->get_result();
                                            ?>
                                            <div class="col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Event Venue</label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="venue" id="venue"
                                                            onchange="updateAddress()">
                                                            <option selected value="<?= $supplier_venue ?>"><?= $business_name ?></option>
                                                            <?php while ($products = $products_result->fetch_assoc()) { ?>
                                                                <option
                                                                    value="<?php echo htmlspecialchars($products['supplier_id']); ?>"
                                                                    data-address="<?php echo htmlspecialchars($products['address']); ?>">
                                                                    <?php echo htmlspecialchars($products['business_name']); ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Location <span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="location" id="location" value="<?= $supplier_location ?>"
                                                    required placeholder="Supplier Address">
                                            </div>
                                        </div>

                                        <script>
                                            function updateAddress() {
                                                var venueSelect = document.getElementById("venue");
                                                var addressInput = document.getElementById("location");

                                                var selectedOption = venueSelect.options[venueSelect.selectedIndex];
                                                var address = selectedOption.getAttribute("data-address");

                                                if (address) {
                                                    addressInput.value = address;
                                                } else {
                                                    addressInput.value = "";
                                                }
                                            }
                                        </script>

<?php
// Prepare the SQL query to select products for the current event
$products_query = "SELECT ep.event_product_id, ogp.orga_products_id, ogp.product_name, ogp.product_photo 
                   FROM event_products AS ep 
                   INNER JOIN organizer_products AS ogp ON ogp.orga_products_id = ep.product_id 
                   WHERE event_id = ?";
$products_stmt = $conn->prepare($products_query);
$products_stmt->bind_param("i", $get_id);
$products_stmt->execute();
$products_result = $products_stmt->get_result();

// Check if there are products to display
if ($products_result->num_rows > 0) {
    echo '<label class="form-label">Current Products</label>';

    while ($product_row = $products_result->fetch_assoc()) {
        $product_id_orga = htmlspecialchars($product_row['orga_products_id']);
        $product_names = htmlspecialchars($product_row['product_name']);
        $product_photos = htmlspecialchars($product_row['product_photo']);
        $event_product_id = htmlspecialchars($product_row['event_product_id']);

        echo '<div class="info-box" id="product-'.$product_id_orga.'">
                <img src="../images/' . $product_photos . '" alt="Products">
                <div class="text">
                    <h4>' .$product_names. '</h4>
                    <button class="btn btn-danger delete-btn" data-id="' . $event_product_id . '">x</button>
                </div>
              </div>';
    }
}
?>


                                        <label class="form-label mt-5">Add Products Items<span
                                                class="text-red">*</span></label>
                                        <div style="max-height: 350px; overflow-y: auto;">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">Select Multiple</th>
                                                        <th>Product Name</th>
                                                        <th>Image</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Check if the session variable is set
                                                    if (isset($_SESSION['id'])) {
                                                        $id = $_SESSION['id'];
                                                        $event_product_ids = []; // Ensure it's an array
                                                        $query_products = "SELECT * FROM organizer_products WHERE organizer_id = ?";
                                                        $stmt_products = $conn->prepare($query_products);
                                                        $stmt_products->bind_param("i", $id);
                                                        $stmt_products->execute();
                                                        $products_result = $stmt_products->get_result();

                                                        while ($products = $products_result->fetch_assoc()) {
                                                            // Skip products that are already in event_products
                                                            if (in_array($products['orga_products_id'], $event_product_ids)) {
                                                                continue;
                                                            }
                                                            ?>
                                                            <tr class="align-middle">
                                                                <td>
                                                                    <center>
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="selected_products[]"
                                                                            value="<?php echo htmlspecialchars($products['orga_products_id']) ?>">
                                                                    </center>
                                                                </td>
                                                                <td><?php echo htmlspecialchars($products['product_name']) ?>
                                                                </td>
                                                                <td>
                                                                    <img src="../images/<?php echo htmlspecialchars($products['product_photo']) ?>"
                                                                        alt="Product image"
                                                                        style='width: 100px; height: 100px;'>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>
                <div class="modal-footer">
            <button type="submit" class="btn btn-success">Update Package</button>
        </div>
        </div>
        </form>
    </div>
    </div>

    <script>
        function updateAddress() {
            var venueSelect = document.getElementById("venue");
            var addressInput = document.getElementById("location");
            var selectedOption = venueSelect.options[venueSelect.selectedIndex];
            var address = selectedOption.getAttribute("data-address");
            addressInput.value = address || "";
        }
    </script>
   <script>
document.addEventListener('DOMContentLoaded', function() {
    // Select all delete buttons
    const deleteButtons = document.querySelectorAll('.delete-btn');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const eventProductId = this.getAttribute('data-id');
            
            // Make the AJAX request to delete the product
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_product.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText == 'Product successfully deleted.') {
                        // Remove the product from the UI
                        document.getElementById('product-' + eventProductId).remove();
                        // Optionally, redirect to event_package.php
                        window.location.href = 'event_package.php'; // Redirect after deletion
                    } else {
                        alert('Error: Could not delete the product.');
                    }
                }
            };
            xhr.send('event_product_id=' + eventProductId);
        });
    });
});
</script>
</body>

</html>
<?php 
} else {
                echo "No event found.";
            }

        } else {
            echo "Invalid event ID.";
        }

?>