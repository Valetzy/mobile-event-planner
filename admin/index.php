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

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
  <div class="app-wrapper">

    <?php include 'includes/topbar.php'; ?>

    <?php include 'includes/sidebar.php'; ?>

    <main class="app-main"> <!--begin::App Content Header-->
      <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
          <div class="row">
            <div class="col-sm-6">
              <h3 class="mb-0">Dashboard</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Dashboard
                </li>
              </ol>
            </div>
          </div> <!--end::Row-->
        </div> <!--end::Container-->
      </div> <!--end::App Content Header--> <!--begin::App Content-->
      <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
          <div class="row"> <!--begin::Col-->

            <div class="col-lg-4 col-6"> <!--begin::Small Box Widget 1-->
              <div class="small-box text-bg-dark">
                <div class="inner">
                  <h3>150</h3>
                  <p>Client</p>
                </div>
              </div> <!--end::Small Box Widget 1-->
            </div> <!--end::Col-->

            <div class="col-lg-4 col-6"> <!--begin::Small Box Widget 2-->
              <div class="small-box text-bg-info">
                <div class="inner">
                  <h3>53</h3>
                  <p>Organizer</p>
                </div>
              </div> <!--end::Small Box Widget 2-->
            </div> <!--end::Col-->

            <div class="col-lg-4 col-6"> <!--begin::Small Box Widget 4-->
              <div class="small-box text-bg-secondary">
                <div class="inner">
                  <h3>65</h3>
                  <p>Supplier</p>
                </div>
              </div> <!--end::Small Box Widget 4-->
            </div> <!--end::Col-->

          </div> <!--end::Row--> <!--begin::Row-->
          <div class="row"> <!--begin::Col-->

            <div class="col-lg-4 col-6"> <!--begin::Small Box Widget 1-->
              <div class="small-box text-bg-primary">
                <div class="inner">
                  <h3>150</h3>
                  <p>Pending</p>
                </div>
              </div> <!--end::Small Box Widget 1-->
            </div> <!--end::Col-->

            <div class="col-lg-4 col-6"> <!--begin::Small Box Widget 2-->
              <div class="small-box text-bg-success">
                <div class="inner">
                  <h3>53</h3>
                  <p>Approved</p>
                </div>
              </div> <!--end::Small Box Widget 2-->
            </div> <!--end::Col-->

            <div class="col-lg-4 col-6"> <!--begin::Small Box Widget 4-->
              <div class="small-box text-bg-danger">
                <div class="inner">
                  <h3>65</h3>
                  <p>Denied</p>
                </div>
              </div> <!--end::Small Box Widget 4-->
            </div> <!--end::Col-->

          </div> <!--end::Row--> <!--begin::Row-->
        </div> <!--end::Container-->
      </div> <!--end::App Content-->
    </main> <!--end::App Main-->
  </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <?php include 'includes/footer.php'; ?>