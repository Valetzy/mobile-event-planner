<!-- products -->

<!-- Catering Information -->
<div class="modal fade" id="catering" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Catering Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="functions/add_product.php" enctype="multipart/form-data" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <div class="card-border">
                                    <div class="card-border-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Catering Category <span
                                                            class="text-red">*</span></label>
                                                    <select class="form-control" name="catering_category" required>
                                                        <option value="" selected disabled>Select Catering Category
                                                        </option>
                                                        <option value="Appetizers">Appetizers</option>
                                                        <option value="Salads">Salads</option>
                                                        <option value="Beverages">Beverages</option>
                                                        <option value="Desserts">Desserts</option>
                                                        <option value="Main Courses">Main Courses</option>
                                                        <option value="Side Dishes">Side Dishes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Product Name <span
                                                            class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="product_name" required
                                                        placeholder="Enter Product Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <div class=" mb-3">
                                                    <label class="form-label">Product Image<span
                                                            class="text-red">*</span></label>
                                                    <div class="input-group">
                                                        <input type="file" name="product_image" id="product_image"
                                                            required class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Catering Status <span
                                                            class="text-red">*</span></label>
                                                    <select class="form-control" name="status" required id="status">
                                                        <option value="" selected disabled>Choose a Status</option>
                                                        <option value="Available">Available</option>
                                                        <option value="Unavailable">Unavailable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-12">
                                                <div class="mb-0">
                                                    <label class="form-label">Product Description <span
                                                            class="text-red">*</span></label>
                                                    <textarea rows="4" class="form-control" required
                                                        name="product_descriptions"
                                                        placeholder="Enter Product Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Add Product</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- End Catering Information-->

<!-- Dress Information -->
<div class="modal fade" id="dress" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dress Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="functions/add_product.php" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="card-border">
                                <div class="card-border-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class=" mb-3">
                                                <label class="form-label">Rental/Retail</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="rental_retails"
                                                        id="rental_retails">
                                                        <option selected disabled>Choose an Options</option>
                                                        <option value="Rental">Rental</option>
                                                        <option value="Retail">Retail</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Dress Category <span
                                                        class="text-red">*</span></label>
                                                <select class="form-control" name="dress_category" id="dress_category">
                                                    <option value="Select Product Category">Select Dress Category
                                                    </option>
                                                    <option value="Casual Dresses">Casual Dresses</option>
                                                    <option value="Formal Dresses">Formal Dresses</option>
                                                    <option value="Work/Office Dresses">Work/Office Dresses</option>
                                                    <option value="Party Dresses">Party Dresses</option>
                                                    <option value="Summer Dresses">Summer Dresses</option>
                                                    <option value="Wedding Dresses">Wedding Dresses</option>
                                                    <option value="Cultural/Traditional Dresses">Cultural/Traditional
                                                        Dresses</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class=" mb-3">
                                                <label class="form-label">Gender</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="gender" id="gender">
                                                        <option selected disabled>Choose a Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class=" mb-3">
                                                <label class="form-label">Dress Image</label>
                                                <div class="input-group">
                                                    <input type="file" name="dress_image" id="dress_image"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Dress Name <span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="dress_name"
                                                    placeholder="Enter Dress Name">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Dress Price <span
                                                        class="text-red">*</span></label>
                                                <input type="number" class="form-control" name="dress_price"
                                                    placeholder="Enter Dress Price">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Dress Status <span
                                                        class="text-red">*</span></label>
                                                <select class="form-control" name="status" id="status">
                                                    <option selected disabled>Choose a Status</option>
                                                    <option value="Available">Available</option>
                                                    <option value="Unavailable">Unavailable</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Add Product</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- End Dress Information-->


<!-- Decor Information -->
<div class="modal fade" id="decor" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Decor Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="functions/add_product.php" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="card-border">
                                <div class="card-border-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class=" mb-3">
                                                <label class="form-label">Rental/Retail</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="rental_retails"
                                                        id="rental_retails">
                                                        <option selected disabled>Choose an Options</option>
                                                        <option value="Rental">Rental</option>
                                                        <option value="Retail">Retail</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Decor Category <span
                                                        class="text-red">*</span></label>
                                                <select class="form-control" name="product_category">
                                                    <option selected disabled>Select Decor Category</option>
                                                    <option value="Ballons">Ballons</option>
                                                    <option value="Tableware">Tableware</option>
                                                    <option value="Lighting">Lighting</option>
                                                    <option value="Signage">Signage</option>
                                                    <option value="Furniture">Furniture</option>
                                                    <option value="Miscellaneous Party Essentials">Miscellaneous Party
                                                        Essentials</option>
                                                    <option value="Catering Equipment">Catering Equipment</option>
                                                    <option value="Themed Props and Accessories">Themed Props and
                                                        Accessories</option>
                                                    <option value="Entertainment and Special Effects">Entertainment and
                                                        Special Effects</option>
                                                    <option value="Draping and Fabric">Draping and Fabric</option>
                                                    <option value="Floral Arrangements">Floral Arrangements</option>
                                                    <option value="Event Backdrops">Event Backdrops</option>
                                                    <option value="Sound and Audio Equipment">Sound and Audio Equipment
                                                    </option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Decor Name <span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="decor_name"
                                                    placeholder="Enter Product Name">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Decor Price <span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="decor_price"
                                                    placeholder="Enter Product Price">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class=" mb-3">
                                                <label class="form-label">Decor Image</label>
                                                <div class="input-group">
                                                    <input type="file" name="decor_image" id="decor_image"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Decor Status <span
                                                        class="text-red">*</span></label>
                                                <select class="form-control" name="status" id="status">
                                                    <option selected disabled>Choose a Status</option>
                                                    <option value="Available">Available</option>
                                                    <option value="Unavailable">Unavailable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-0">
                                                <label class="form-label">Decor Description <span
                                                        class="text-red">*</span></label>
                                                <textarea rows="4" class="form-control" name="decor_description"
                                                    placeholder="Enter Product Description"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Add Product</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- End Decor Information-->

<!-- Decor venue -->
<div class="modal fade" id="venue" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Venue Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="functions/add_product.php" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="card-border">
                                <div class="card-border-body">
                                    <div class="row">
                                        
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Venue Name <span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="venue_name"
                                                    placeholder="Enter Product Name">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Venue Price <span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="venue_price"
                                                    placeholder="Enter Product Price">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class=" mb-3">
                                                <label class="form-label">Venue Image</label>
                                                <div class="input-group">
                                                    <input type="file" name="venue_image" id="venue_image"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Venue Status <span
                                                        class="text-red">*</span></label>
                                                <select class="form-control" name="status" id="status">
                                                    <option selected disabled>Choose a Status</option>
                                                    <option value="Available">Available</option>
                                                    <option value="Unavailable">Unavailable</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Venue Description <span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="venue_description"
                                                    placeholder="Enter Product Name">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Add Venue</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- End Decor venue-->


<!-- Decor venue -->
<div class="modal fade" id="photo_video" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Photograph/videograph Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="functions/add_product.php" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="card-border">
                                <div class="card-border-body">
                                    <div class="row">
                                        
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">package Name <span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="photo_video_name"
                                                    placeholder="Enter Product Name">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">package Price <span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="photo_video_price"
                                                    placeholder="Enter Product Price">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class=" mb-3">
                                                <label class="form-label">package Image</label>
                                                <div class="input-group">
                                                    <input type="file" name="photo_video_image" id="photo_video_image"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">package Status <span
                                                        class="text-red">*</span></label>
                                                <select class="form-control" name="status" id="status">
                                                    <option selected disabled>Choose a Status</option>
                                                    <option value="Available">Available</option>
                                                    <option value="Unavailable">Unavailable</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">package Description <span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="photo_video_description"
                                                    placeholder="Enter Product Name">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Add Venue</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- End Decor venue-->




<!-- package -->

<!-- package_catering -->
<div class="modal fade" id="package_catering" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Package Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="functions/add_package.php" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="card-border">
                                <div class="card-border-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Package Name <span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="catering_name"
                                                    placeholder="Enter Package Name" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Catering Category <span
                                                        class="text-red">*</span></label>
                                                <select class="form-control" name="catering_category" required>
                                                    <option value="" selected disabled>Select Catering Category
                                                    </option>
                                                    <option value="appetizers">Appetizers</option>
                                                    <option value="salads">Salads</option>
                                                    <option value="beverages">Beverages</option>
                                                    <option value="desserts">Desserts</option>
                                                    <option value="main_courses">Main Courses</option>
                                                    <option value="side_dishes">Side Dishes</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Package Price <span
                                                        class="text-red">*</span></label>
                                                <input type="number" class="form-control" name="catering_price"
                                                    placeholder="Enter Package Price" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Number of Participants <span
                                                        class="text-red">*</span></label>
                                                <input type="number" class="form-control" name="catering_participants"
                                                    placeholder="Enter Number of Participants" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-12">
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
                                                            $query_products = "SELECT * FROM products WHERE supplier_id = ?";
                                                            $stmt_products = $conn->prepare($query_products);
                                                            $stmt_products->bind_param("i", $id);
                                                            $stmt_products->execute();
                                                            $products_result = $stmt_products->get_result();

                                                            while ($products = $products_result->fetch_assoc()) { ?>
                                                                <tr class="align-middle">
                                                                    <td>
                                                                        <center><input class="form-check-input" type="checkbox"
                                                                                name="selected_products[]"
                                                                                value="<?php echo htmlspecialchars($products['product_id']) ?>">
                                                                        </center>
                                                                    </td>
                                                                    <td><?php echo htmlspecialchars($products['product_name']) ?>
                                                                    </td>
                                                                    <td><img src="../uploads/products/<?php echo htmlspecialchars($products['product_image']) ?>"
                                                                            alt="catering image"
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
                <button type="submit" class="btn btn-success">Add Package</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- End package_catering-->


<!-- package_dress -->
<div class="modal fade" id="package_dress" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Package Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="functions/add_package.php" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="card-border">
                                <div class="card-border-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Package Name <span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="dress_name"
                                                    placeholder="Enter Package Name" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Dress Category <span
                                                        class="text-red">*</span></label>
                                                <select class="form-control" name="dress_category"
                                                    id="dress_category">
                                                    <option value="Select Product Category">Select Dress Category
                                                    </option>
                                                    <option value="Casual Dresses">Casual Dresses</option>
                                                    <option value="Formal Dresses">Formal Dresses</option>
                                                    <option value="Work/Office Dresses">Work/Office Dresses</option>
                                                    <option value="Party Dresses">Party Dresses</option>
                                                    <option value="Summer Dresses">Summer Dresses</option>
                                                    <option value="Wedding Dresses">Wedding Dresses</option>
                                                    <option value="Cultural/Traditional Dresses">Cultural/Traditional
                                                        Dresses</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Package Price <span
                                                        class="text-red">*</span></label>
                                                <input type="number" class="form-control" name="dress_price"
                                                    placeholder="Enter Package Price" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Number of Participants <span
                                                        class="text-red">*</span></label>
                                                <input type="number" class="form-control" name="dress_participants"
                                                    placeholder="Enter Number of Participants" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-12">
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
                                                            $query_products = "SELECT * FROM dresses WHERE supplier_id = ?";
                                                            $stmt_products = $conn->prepare($query_products);
                                                            $stmt_products->bind_param("i", $id);
                                                            $stmt_products->execute();
                                                            $products_result = $stmt_products->get_result();

                                                            while ($products = $products_result->fetch_assoc()) { ?>
                                                                <tr class="align-middle">
                                                                    <td>
                                                                        <center><input class="form-check-input" type="checkbox"
                                                                                name="selected_dress[]"
                                                                                value="<?php echo htmlspecialchars($products['dress_id']) ?>">
                                                                        </center>
                                                                    </td>
                                                                    <td><?php echo htmlspecialchars($products['dress_name']) ?>
                                                                    </td>
                                                                    <td><img src="../uploads/products/<?php echo htmlspecialchars($products['dress_image']) ?>"
                                                                            alt="catering image"
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
                <button type="submit" class="btn btn-success">Add Package</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- End package_catering-->

<!-- package_decor -->
<div class="modal fade" id="package_decor" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Package Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="functions/add_package.php" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="card-border">
                                <div class="card-border-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Package Name <span
                                                        class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="decor_name"
                                                    placeholder="Enter Package Name" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Decor Category <span
                                                        class="text-red">*</span></label>
                                                <select class="form-control" name="decor_category">
                                                    <option selected disabled>Select Decor Category</option>
                                                    <option value="Miscellaneous Party Essentials">Miscellaneous Party
                                                        Essentials</option>
                                                    <option value="Catering Equipment">Catering Equipment</option>
                                                    <option value="Themed Props and Accessories">Themed Props and
                                                        Accessories</option>
                                                    <option value="Entertainment and Special Effects">Entertainment and
                                                        Special Effects</option>
                                                    <option value="Floral Arrangements">Floral Arrangements</option>
                                                    <option value="Sound and Audio Equipment">Sound and Audio Equipment
                                                    </option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Package Price <span
                                                        class="text-red">*</span></label>
                                                <input type="number" class="form-control" name="decor_price"
                                                    placeholder="Enter Package Price" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Number of Participants <span
                                                        class="text-red">*</span></label>
                                                <input type="number" class="form-control" name="decor_participants"
                                                    placeholder="Enter Number of Participants" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-12">
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
                                                            $query_products = "SELECT * FROM decors WHERE supplier_id = ?";
                                                            $stmt_products = $conn->prepare($query_products);
                                                            $stmt_products->bind_param("i", $id);
                                                            $stmt_products->execute();
                                                            $products_result = $stmt_products->get_result();

                                                            while ($products = $products_result->fetch_assoc()) { ?>
                                                                <tr class="align-middle">
                                                                    <td>
                                                                        <center><input class="form-check-input" type="checkbox"
                                                                                name="selected_decor[]"
                                                                                value="<?php echo htmlspecialchars($products['decor_id']) ?>">
                                                                        </center>
                                                                    </td>
                                                                    <td><?php echo htmlspecialchars($products['decor_name']) ?>
                                                                    </td>
                                                                    <td><img src="../uploads/products/<?php echo htmlspecialchars($products['decor_image']) ?>"
                                                                            alt="decor image"
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
                <button type="submit" class="btn btn-success">Add Package</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- End package_decor-->
