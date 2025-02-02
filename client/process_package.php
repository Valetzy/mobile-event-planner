<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php"); // Redirect to login if not logged in
    exit();
}

include '../connection/conn.php';


$event_id = $_GET['event_id'];

$sql = "SELECT e.supplier_location, s.business_name, e.supplier_venue, e.participants, e.price, e.theme, e.theme_photo, ot.event_name, e.event_package_name, e.event_id FROM events AS e 
                INNER JOIN event_types AS ot ON ot.event_type_id = e.event_type
                INNER JOIN supplier AS s ON s.supplier_id = e.supplier_venue
                WHERE e.event_id = '$event_id' ";
$result = mysqli_query($conn, $sql);

$disable_button = mysqli_num_rows($result) === 0;

if (mysqli_num_rows($result) > 0) {
    // Loop through the results and generate the HTML for each event
    while ($row = mysqli_fetch_assoc($result)) {

        $participants = $row['participants'];
        $price = $row['price'];
        $event_package_name = $row['event_package_name'];
        $event_id = $row['event_id'];
        $theme = $row['theme'];
        $supplier_venue = $row['supplier_venue'];
        $business_name = $row['business_name'];
        $supplier_location = $row['supplier_location'];

    }
} else {
    echo 'No events found.';
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>
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
    .product-img {
        width: 80px; /* Set fixed width */
        height: 80px; /* Set fixed height */
        object-fit: cover; /* Ensures the image fills the area without distortion */
        border-radius: 5px; /* Optional: adds rounded corners */
    }

</style>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <?php include 'includes/topbar.php'; ?>

    <div class="container-fluid blog py-6">
        <div class="container">

            <div style="margin-top: -80px; margin-bottom: 20px;">
                <a href="javascript:history.back()">
                    <img src="back.png" alt="Back Button" width="30px" height="30px">
                </a>
            </div>

            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <div>
                    <h1 class="display-5 mb-5"><?= $_GET['event_name'] ?> Event Packages</h1>
                </div>
            </div>


            <form action="functions/process_package.php" enctype="multipart/form-data" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="card-border">
                                <div class="card-border-body">
                                    <div class="row">

                                        <input type="hidden" name="organizer_id" value="<?= $_GET['user_id'] ?>">
                                        <input type="hidden" name="client_id" value="<?= $_SESSION['id'] ?>">
                                        <input type="hidden" name="event_type" value="<?= $_GET['eventtype_id'] ?>">
                                        <input type="hidden" name="date_start" value="<?= $_GET['date_start'] ?>">
                                        <input type="hidden" name="date_end" value="<?= $_GET['date_end'] ?>">
                                        <input type="hidden" name="event_id" value="<?= $event_id ?>" >
                                        <input type="hidden" name="package_id" value="<?= $event_id ?>" >


                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Event Name<span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="event_package_name" value="<?=$event_package_name?>  " readonly
                                                    required placeholder="Enter Event Name">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Theme<span class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="theme" value="<?=$theme?>" required readonly
                                                    placeholder="Enter Theme Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Participants<span
                                                        class="text-red">*</span></label>
                                                <input type="number" class="form-control" name="participants" required value="<?=$participants?>" readonly
                                                    placeholder="Enter Participants">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Parcial Price<span
                                                        class="text-red">*</span></label>
                                                <input type=" number" class="form-control" name="budget" required value="<?=$price?>" readonly
                                                    placeholder="Enter Price">
                                            </div>
                                        </div>

                                        <?php
                                        // Check if the session variable is set
                                        
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

                                        <div class="col-sm-12 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Add-ons(Others)<span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="add_ons" required
                                                    placeholder="Enter Add-ons(Others)">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php
                    // Prepare the SQL query to select products for the current event
                    $products_query = "SELECT ep.event_product_id, ogp.orga_products_id, ogp.product_name, ogp.product_photo 
                                    FROM event_products AS ep 
                                    INNER JOIN organizer_products AS ogp ON ogp.orga_products_id = ep.product_id 
                                    WHERE event_id = ?";
                    $products_stmt = $conn->prepare($products_query);
                    $products_stmt->bind_param("i", $event_id);
                    $products_stmt->execute();
                    $products_result = $products_stmt->get_result();

                    // Check if there are products to display
                    if ($products_result->num_rows > 0) {
                        echo '<label class="form-label">Current Products*</label>';
                        echo '<div class="row">
                                <div class="d-flex m-2 justify-content-center align-items-center">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>';

                        $count = 1; 

                        while ($product_row = $products_result->fetch_assoc()) {
                            $product_id_orga = htmlspecialchars($product_row['orga_products_id']);
                            $product_names = htmlspecialchars($product_row['product_name']);
                            $product_photos = htmlspecialchars($product_row['product_photo']);
                            $event_product_id = htmlspecialchars($product_row['event_product_id']);

                            echo '<tr>
                                    <td>' . $count . '</td>
                                    <td>' . $product_names . '</td>
                                    <td>Product description here</td> 
                                    <td>
                                        <img src="../images/' . $product_photos . '" alt="Product Image" class="product-img">
                                    </td>
                                </tr>';
                            $count++; // Increment count
                        }

                        echo '   </tbody>
                                </table>
                                </div>
                            </div>';
                    } else {
                        echo '<p class="text-center">No products found for this event.</p>';
                    }

                    $products_stmt->close();
                    ?>


                     <div style="float: right;" >
                    <button type="submit" class="btn btn-success">Confirm Theme</button>
                    </div>
                </div>

        </div>
        
        </form>



    </div>
    </div>
    <?php include 'includes/footer.php'; ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <?php include 'includes/script.php'; ?>
</body>

</html>