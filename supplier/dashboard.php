<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  header("Location: ../index.php"); // Redirect to login if not logged in
  exit();
}

include '../connection/conn.php';

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
              <h3 class="mb-0">Supplier Dashboard</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                Supplier Dashboard
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

            $supplier_id = $_SESSION['id'];

            // Fetch count of pending requests for the supplier
            $query = "SELECT COUNT(*) as pending_count FROM organizer_request WHERE supplier_id = ? AND status =
            'pending'";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $supplier_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $pendingCount = $row['pending_count'] ?? 0;
            ?>

            <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
              <div class="small-box text-bg-primary">
                <div class="inner">
                  <h3><?php echo $pendingCount; ?></h3>
                  <p>Pending</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                  aria-hidden="true">
                  <path
                    d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z">
                  </path>
                </svg>
              </div> <!--end::Small Box Widget 1-->
            </div>


            <?php 

            // Fetch count of pending requests for the supplier
            $approved_query = "SELECT COUNT(*) as approved_count FROM organizer_request WHERE supplier_id = ? AND status =
            'approved'";
            $ap_stmt = $conn->prepare($approved_query);
            $ap_stmt->bind_param("i", $supplier_id);
            $ap_stmt->execute();
            $ap_result = $ap_stmt->get_result();
            $ap_row = $ap_result->fetch_assoc();
            $approvedCount = $ap_row['approved_count'] ?? 0;
            ?>

            <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 2-->
              <div class="small-box text-bg-success">
                <div class="inner">
                  <h3><?php echo $approvedCount; ?></h3>
                  <p>Approved</p>
                </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path
                    d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                  </path>
                </svg>
              </div> <!--end::Small Box Widget 2-->
            </div> <!--end::Col-->


            <?php 

            // Fetch count of pending requests for the supplier
            $deny_query = "SELECT COUNT(*) as deny_count FROM organizer_request WHERE supplier_id = ? AND status =
            'deny'";
            $dy_stmt = $conn->prepare($deny_query);
            $dy_stmt->bind_param("i", $supplier_id);
            $dy_stmt->execute();
            $dy_result = $dy_stmt->get_result();
            $dy_row = $dy_result->fetch_assoc();
            $denyCount = $dy_row['deny_count'] ?? 0;
            ?>
            <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 4-->
              <div class="small-box text-bg-danger">
                <div class="inner">
                  <h3><?php echo $denyCount; ?></h3>
                  <p>Denied</p>
                </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z">
                  </path>
                  <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z">
                  </path>
                </svg>
              </div> <!--end::Small Box Widget 4-->
            </div> <!--end::Col-->

          </div> <!--end::Row--> <!--begin::Row-->
        </div> <!--end::Container-->
      </div> <!--end::App Content-->
    </main> <!--end::App Main-->
  </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <?php include 'includes/footer.php'; ?>