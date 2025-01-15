<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php"); // Redirect to login if not logged in
    exit();
}

include '../connection/conn.php';

?>
<?php include 'functions/functions.php'; ?>

<!-- Your additional client page content goes here -->

<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<?php include 'includes/head.php'; ?>
<style>
    .tab-content {
        display: none;
    }

    .active-tab {
        font-weight: bold;
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
    }

    .active-tab:not(:hover) {
        background-color: #0056b3;
    }

    button {
        padding: 10px 20px;
        margin: 0 5px;
        border-radius: 5px;
        border: 1px solid #ddd;
        cursor: pointer;
    }
</style>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper">

        <?php include 'includes/topbar.php'; ?>

        <?php include 'includes/sidebar.php'; ?>
        <?php include 'includes/modal.php'; ?>


        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->

                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->

                        <div class="card mb-4">

                            <?php
                            if (isset($_GET['id'])) {
                                getSupplierById($conn, $_GET['id']);
                            }
                            ?>

                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <!-- Tab Buttons -->
                                    <button id="productTab" onclick="showTab('products')"
                                        class="active-tab">Products</button>
                                    <button id="packageTab" onclick="showTab('packages')">Package</button>
                                </div>

                                <!-- Tab Content -->
                                <div id="products" class="tab-content">
                                    <div class="row">
                                        <?php if (isset($_GET['id'])) {
                                            displayProductsBySupplierId($conn, $_GET['id'], $_GET['supplier_type']);
                                        } ?>
                                    </div>
                                </div>

                                <div id="packages" class="tab-content" style="display: none;">
                                    <div class="row">
                                        <?php if (isset($_GET['id'])) {
                                            displayPackageBySupplierId($conn, $_GET['id'], $_GET['supplier_type']);
                                        } ?>
                                    </div>
                                </div>
                            </div>



                        </div> <!--end::Row--> <!--begin::Row-->
                    </div> <!--end::Container-->
                </div> <!--end::App Content-->
        </main> <!--end::App Main-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script>
        function showTab(tabName) {
            // Hide all tabs
            document.getElementById('products').style.display = 'none';
            document.getElementById('packages').style.display = 'none';

            // Remove active-tab class from all buttons
            document.getElementById('productTab').classList.remove('active-tab');
            document.getElementById('packageTab').classList.remove('active-tab');

            // Show the selected tab and highlight the corresponding button
            document.getElementById(tabName).style.display = 'block';
            document.getElementById(tabName + 'Tab').classList.add('active-tab');
        }

        // Set default tab on page load
        document.addEventListener('DOMContentLoaded', function () {
            showTab('products');
        });
    </script>
    <?php include 'includes/footer.php'; ?>