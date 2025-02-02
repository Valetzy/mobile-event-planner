<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  header("Location: ../index.php"); // Redirect to login if not logged in
  exit();
}

function UsersData($tablename, $user_type, $color) {
  include '../connection/conn.php'; // Make sure you have your database connection

  $sql = "SELECT COUNT(*) as total FROM $tablename WHERE user_type = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $user_type);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $count = $row['total'];

  echo '<div class="col-lg-4 col-6"> <!--begin::Small Box Widget 1-->
            <div class="small-box text-bg-'.$color.'">
              <div class="inner">
                <h3>' . $count . '</h3>
                <p>' . ucfirst($user_type) . '</p>
              </div>
            </div> <!--end::Small Box Widget 1-->
        </div> <!--end::Col-->';
}

function userdataStatus($table1, $table2, $status, $color) {
  include '../connection/conn.php'; // Database connection

  // Query to count pending users
  $sql1 = "SELECT COUNT(*) as total FROM $table1 WHERE status = ?";
  $stmt1 = $conn->prepare($sql1);
  $stmt1->bind_param("s", $status);
  $stmt1->execute();
  $result1 = $stmt1->get_result();
  $row1 = $result1->fetch_assoc();
  $count1 = $row1['total'];

  // Query to count pending suppliers
  $sql2 = "SELECT COUNT(*) as total FROM $table2 WHERE status = ?";
  $stmt2 = $conn->prepare($sql2);
  $stmt2->bind_param("s", $status);
  $stmt2->execute();
  $result2 = $stmt2->get_result();
  $row2 = $result2->fetch_assoc();
  $count2 = $row2['total'];

  // Total count
  $totalCount = $count1 + $count2;

  echo '<div class="col-lg-4 col-6"> <!--begin::Small Box Widget 1-->
            <div class="small-box text-bg-' . htmlspecialchars($color) . '"> 
              <div class="inner">
                <h3>' . $totalCount . '</h3>
                <p>' . ucfirst($status) . '</p>
              </div>
            </div> <!--end::Small Box Widget 1-->
        </div> <!--end::Col-->';
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

            <?php UsersData("users", "client", "dark"); ?>

            <?php UsersData("users", "organizer", "info"); ?>

            <?php UsersData("supplier", "supplier", "secondary"); ?>

          </div> <!--end::Row--> <!--begin::Row-->
          <div class="row"> <!--begin::Col-->

            <?php userdataStatus("users", "supplier", "pending", "primary"); ?>
            <?php userdataStatus("users", "supplier", "approved", "success"); ?>
            <?php userdataStatus("users", "supplier", "denied", "danger"); ?>

          </div> <!--end::Row--> <!--begin::Row-->
        </div> <!--end::Container-->
      </div> <!--end::App Content-->
    </main> <!--end::App Main-->
  </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <?php include 'includes/footer.php'; ?>