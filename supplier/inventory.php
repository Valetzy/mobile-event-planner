<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php"); // Redirect to login if not logged in
    exit();
}
include '../connection/conn.php';
$id = $_SESSION['id'];
include 'functions/functions.php';

?>
<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<?php include 'includes/head.php'; ?>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper">

        <?php include 'includes/topbar.php'; ?>

        <?php include 'includes/sidebar.php'; ?>



        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Product List</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Product List
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->

                        <div class="card mb-4">

                            <div class="card-header d-flex justify-content-end">
                                <button class="btn btn-primary" id="printButton">Print</button>
                            </div>


                            <div class="card-body">

                                <div id="printableArea">
                                    <h1 class="d-flex justify-content-center align-items-center">Product Inventory</h1>
                                    <!-- Add a current date here -->
                                    <p class="text-center">
                                        <?php echo "Date: " . date("F j, Y"); ?>
                                    </p>
                                    <?php include 'includes/product_table.php'; ?>
                                </div>



                            </div> <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-end">
                                    <li class="page-item"> <a class="page-link" href="#">«</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">»</a> </li>
                                </ul>
                            </div>
                        </div>

                        <script>
                            document.getElementById('printButton').addEventListener('click', function () {
                                var printContent = document.getElementById('printableArea').innerHTML;
                                var originalContent = document.body.innerHTML;

                                document.body.innerHTML = printContent;
                                window.print();
                                document.body.innerHTML = originalContent;
                            });
                        </script>


                    </div> <!--end::Row--> <!--begin::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <?php include 'includes/footer.php'; ?>