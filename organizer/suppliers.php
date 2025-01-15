<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php"); // Redirect to login if not logged in
    exit();
}



?>
<!-- Your additional client page content goes here -->

<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<?php include 'includes/head.php'; ?>

<style>
    .info-box-icon img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures the image fits the container while maintaining aspect ratio */
        border-radius: 10%; /* Optional: Makes the image circular */
    }

    .info-box-icon {
        width: 80px; /* Adjust as needed */
        height: 80px; /* Adjust as needed */
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden; /* Ensures the image doesn't overflow */
    }
</style>


<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper">

        <?php include 'includes/topbar.php'; ?>

        <?php include 'includes/sidebar.php'; ?>

        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Suppliers</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                Suppliers
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->

                        <?php
                        // Include your database connection
                        include '../connection/conn.php';

                        // Query to select suppliers
                        $query = "SELECT * FROM supplier"; // Replace 'id', 'name', and 'image_path' with actual column names
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $supplierName = $row['business_name'];
                                $imagePath = $row['business_pic'];
                                $id = $row['supplier_id'];
                                $supplier_type = $row['supplier_type'];

                                echo '
                                    <div class="col-12 col-sm-6 col-md-3">
                                        <div class="info-box shadow-lg">
                                            <span class="info-box-icon shadow-sm">
                                                <img src="../uploads/suppliers/' . htmlspecialchars($imagePath) . '" alt="Supplier Image">
                                            </span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">' . htmlspecialchars($supplierName) . '</span>
                                                <span class="info-box-number"><a href="supplier_details.php?id=' . htmlspecialchars($id) . '&supplier_type=' . htmlspecialchars($supplier_type) . '">More Info</a></span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    ';
                            }
                        } else {
                            echo 'Error fetching suppliers: ' . mysqli_error($conn);
                        }

                        // Close the database connection
                        mysqli_close($conn);
                        ?>


                        <!-- add suppliers -->
                        <div class="modal fade" id="addsuppliers" tabindex="-1">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="functions/add_product.php" enctype="multipart/form-data"
                                            method="post">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-12">
                                                        <div class="card-border">
                                                            <div class="card-border-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Product Name<span
                                                                                    class="text-red">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                name="product_name" required
                                                                                placeholder="Enter Product Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Photo<span
                                                                                    class="text-red">*</span></label>
                                                                            <input type="file" class="form-control"
                                                                                name="theme_photo" required
                                                                                placeholder="Enter Product Name">
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
                        </div>
                    </div> <!--end::Row--> <!--begin::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <?php include 'includes/footer.php'; ?>