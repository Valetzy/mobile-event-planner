<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  header("Location: ../index.php"); // Redirect to login if not logged in
  exit();
}
include '../connection/conn.php';
 $id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<?php include 'includes/head.php'; ?>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper">

        <?php include 'includes/topbar.php'; ?>
        <?php include 'includes/sidebar.php'; ?>
        <?php include 'functions/functions.php'; ?>

        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Package List</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Package List
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
                                <div class="col-sm-4" style="margin-right: 29px;" >
                                    <select class="form-control" name="product_category">
                                        <option value=" " selected disabled>Choose a Catering Category</option>
                                        <option value="Appetizers">Appetizers</option>
                                        <option value="Salads">Salads</option>
                                        <option value="Beverages">Beverages</option>
                                        <option value="Desserts">Desserts</option>
                                        <option value="Main Courses">Main Courses</option>
                                        <option value="Side Dishes">Side Dishes</option>
                                    </select>
                                </div>
                                <?php generateAddPackageButton($id,$conn); ?>
                                <?php include 'includes/modal.php'; ?>
                            </div>
                            <div class="card-body">

                               <?php include 'includes/package_table.php'; ?>

                            </div> <!-- /.card-body -->
                           
                        </div>

                    </div> <!--end::Row--> <!--begin::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <?php include 'includes/footer.php'; ?>