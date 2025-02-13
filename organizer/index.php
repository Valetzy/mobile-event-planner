<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  header("Location: ../index.php"); // Redirect to login if not logged in
  exit();
}
include "../connection/conn.php";

$user_id = $_SESSION['id'];

// Initialize counts
$pendingCount = 0;
$approvedCount = 0;
$deniedCount = 0;

// Queries to count requests by status for the organizer
$statusQueries = [
  'pending' => "SELECT COUNT(*) as count FROM client_request_form WHERE status = 'pending' AND organizer_id = ?",
  'approved' => "SELECT COUNT(*) as count FROM client_request_form WHERE status = 'approved' AND organizer_id = ?",
  'done' => "SELECT COUNT(*) as count FROM client_request_form WHERE status = 'done' AND organizer_id = ?",
  'rejected' => "SELECT COUNT(*) as count FROM client_request_form WHERE status = 'rejected' AND organizer_id = ?"
];

foreach ($statusQueries as $status => $query) {
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($row = $result->fetch_assoc()) {
    switch ($status) {
      case 'pending':
        $pendingCount = $row['count'];
        break;
      case 'approved':
        $approvedCount = $row['count'];
        break;
      case 'rejected':
        $deniedCount = $row['count'];
        break;
      case 'done':
        $doneCount = $row['count'];
        break;
    }
  }
  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary" style=" background-color: #04062e;" >
  <div class="app-wrapper">

    <?php include 'includes/topbar.php'; ?>

    <?php include 'includes/sidebar.php'; ?>

    <main class="app-main">
      <div class="app-content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h3 class="mb-0">Organizer Dashboard</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <div class="app-content">
        <div class="container-fluid">
          <div class="row">
            <!-- Pending Requests -->
            <div class="col-lg-3 col-6">
              <div class="small-box text-bg-primary">
                <div class="inner">
                  <h3><?php echo $pendingCount; ?></h3>
                  <p>Pending</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"></path>
                </svg>
              </div>
            </div>

            <!-- Approved Requests -->
            <div class="col-lg-3 col-6">
              <div class="small-box text-bg-success">
                <div class="inner">
                  <h3><?php echo $approvedCount; ?></h3>
                  <p>Approved</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"></path>
                </svg>
              </div>
            </div>

            <!-- Denied Requests -->
            <div class="col-lg-3 col-6">
              <div class="small-box text-bg-danger">
                <div class="inner">
                  <h3><?php echo $deniedCount; ?></h3>
                  <p>Denied</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"></path>
                  <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"></path>
                </svg>
              </div>
            </div>

            <!-- done Requests -->
            <div class="col-lg-3 col-6">
              <div class="small-box text-bg-info">
                <div class="inner">
                  <h3><?php echo $doneCount; ?></h3>
                  <p>Completed</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"></path>
                  <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"></path>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
