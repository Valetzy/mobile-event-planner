<!-- Event package -->
<div class="modal fade" id="addevent" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="functions/add_event.php" enctype="multipart/form-data" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <div class="card-border">
                                    <div class="card-border-body">
                                        <div class="row">

                                            <div class="col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Event Name<span
                                                            class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="event_package_name" required
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
                                                            <select class="form-control" name="event_type"
                                                                id="rental_retails">
                                                                <option selected disabled>Choose an Option</option>
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
                                                    <label class="form-label">Price<span
                                                            class="text-red">*</span></label>
                                                    <input type=" number" class="form-control" name="price" required
                                                        placeholder="Enter Price">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Photo<span
                                                            class="text-red">*</span></label>
                                                    <input type="file" class="form-control" name="theme_photo" required
                                                        placeholder="Enter Product Name">
                                                </div>
                                            </div>
                                            <label class="form-label">Add Products Items<span
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
                                                        // Database connection
                                                        include '../connection/conn.php';

                                                        // Check if the session variable is set
                                                        if (isset($_SESSION['id'])) {
                                                            $id = $_SESSION['id'];
                                                            $query_products = "SELECT * FROM organizer_products WHERE organizer_id = ?";
                                                            $stmt_products = $conn->prepare($query_products);
                                                            $stmt_products->bind_param("i", $id);
                                                            $stmt_products->execute();
                                                            $products_result = $stmt_products->get_result();

                                                            while ($products = $products_result->fetch_assoc()) { ?>
                                                                <tr class="align-middle">
                                                                    <td>
                                                                        <center><input class="form-check-input" type="checkbox"
                                                                                name="selected_products[]"
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