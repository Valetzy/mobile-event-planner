<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php"); // Redirect to login if not logged in
    exit();
}

include '../connection/conn.php'; ?>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

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
            <?php

            $user_id = $_GET['user_id'];
            $eventtype_id = $_GET['eventtype_id'];

            $sql = "SELECT e.participants, e.price, e.theme, e.theme_photo, ot.event_name, e.event_package_name, e.event_id FROM events AS e 
                            INNER JOIN event_types AS ot ON ot.event_type_id = e.event_type
                            WHERE e.organizer_id = '$user_id' AND e.event_type = '$eventtype_id'";
            $result = mysqli_query($conn, $sql);

            $disable_button = mysqli_num_rows($result) === 0;

            ?>
            <div class="d-flex justify-content-end mb-5 wow bounceInUp">
                <button class="btn btn-primary px-5 py-3 rounded-pill" <?= $disable_button ? 'disabled' : '' ?>
                    fdprocessedid="o2nolj" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Customize Package
                </button>
            </div>

            <div class="row gx-4 justify-content-center">


                <?php
                if (mysqli_num_rows($result) > 0) {
                    // Loop through the results and generate the HTML for each event
                    while ($row = mysqli_fetch_assoc($result)) {

                        $participants = $row['participants'];
                        $price = $row['price'];
                        $theme = $row['theme'];
                        $theme_photo = $row['theme_photo'];
                        $event_package_name = $row['event_package_name'];
                        $event_id = $row['event_id'];

                        ?>


                        <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                            <div class="blog-item">
                                <div class="overflow-hidden rounded" style="height: 300px;">
                                    <img src="../uploads/products/<?= $theme_photo ?>"
                                        class="img-fluid w-100 h-100 object-cover" alt="">
                                </div>

                                <div class="blog-content mx-4 d-flex rounded bg-light">
                                    <div class="text-dark bg-primary rounded-start">
                                        <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                            <p class="fw-bold mb-0"><?= $event_package_name ?></p>
                                        </div>
                                    </div>
                                    <a href="process_package.php?event_id=<?php echo $event_id ?>&event_type=<?php echo $_GET['eventtype_id'] ?>&organizer_id=<?php echo $_GET['user_id'] ?>&date_start=<?php echo $_GET['date_start'] ?>&date_end=<?php echo $_GET['date_end'] ?>&event_name=<?= $_GET['event_name'] ?>&eventtype_id=<?= $_GET['eventtype_id'] ?>&user_id=<?= $_GET['user_id'] ?>"
                                        class="h6 lh-base my-auto h-100 p-3">
                                        Theme: <span style="color: #d4a762;"> <?= $theme ?></span><br>
                                        Participants:<span style="color: #d4a762;"><?= $participants ?></span><br>
                                        Price: <span style="color: #d4a762;"><?= $price ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                } else {
                    echo 'No events found.';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Customize Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="functions/add_customized_event.php" enctype="multipart/form-data" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <div class="card-border">
                                        <div class="card-border-body">
                                            <div class="row">

                                                <input type="hidden" name="organizer_id"
                                                    value="<?= $_GET['user_id'] ?>">
                                                <input type="hidden" name="client_id" value="<?= $_SESSION['id'] ?>">
                                                <input type="hidden" name="event_type"
                                                    value="<?= $_GET['eventtype_id'] ?>">
                                                <input type="hidden" name="date_start"
                                                    value="<?= $_GET['date_start'] ?>">
                                                <input type="hidden" name="date_end" value="<?= $_GET['date_end'] ?>">

                                                <div class="col-sm-6 col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Event Name<span
                                                                class="text-red">*</span></label>
                                                        <input type="text" class="form-control"
                                                            name="event_package_name" required
                                                            placeholder="Enter Event Name">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Theme<span
                                                                class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="theme" required
                                                            placeholder="Enter Theme Name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Participants<span
                                                                class="text-red">*</span></label>
                                                        <input type="number" class="form-control" name="participants"
                                                            required placeholder="Enter Participants">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Budget Price<span
                                                                class="text-red">*</span></label>
                                                        <input type=" number" class="form-control" name="budget"
                                                            required placeholder="Enter Price">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Upload A Reference Photo<span
                                                                class="text-red">*</span></label>
                                                        <input type="file" class="form-control" name="reference_photo"
                                                            required placeholder="Enter Product Name">
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
                                                            <option selected >Choose a Venue</option>
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
                                                <input type="text" class="form-control" name="location" id="location"
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
                                                <div class="col-sm-6 col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Add-ons(Others)<span
                                                                class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="add_ons" required
                                                            placeholder="Enter Add-ons(Others)">
                                                    </div>
                                                </div>
                                                <label class="form-label">Select Events<span
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
                                                            if (isset($_GET['user_id'])) {
                                                                $id = $_GET['user_id'];
                                                                $query_products = "SELECT * FROM organizer_products WHERE organizer_id = ?";
                                                                $stmt_products = $conn->prepare($query_products);
                                                                $stmt_products->bind_param("i", $id);
                                                                $stmt_products->execute();
                                                                $products_result = $stmt_products->get_result();

                                                                while ($products = $products_result->fetch_assoc()) { ?>
                                                                    <tr class="align-middle">
                                                                        <td>
                                                                            <center><input class="form-check-input"
                                                                                    type="checkbox" name="selected_products[]"
                                                                                    value="<?php echo htmlspecialchars($products['orga_products_id']) ?>">
                                                                            </center>
                                                                        </td>
                                                                        <td><?php echo htmlspecialchars($products['product_name']) ?>
                                                                        </td>
                                                                        <td><img src="../images/<?php echo htmlspecialchars($products['product_photo']) ?>"
                                                                                alt="Product image"
                                                                                style='width: 100px; height: 100px;'></td>
                                                                    </tr>
                                                                <?php }
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

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add Theme</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <?php include 'includes/footer.php'; ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <?php include 'includes/script.php'; ?>
</body>

</html>