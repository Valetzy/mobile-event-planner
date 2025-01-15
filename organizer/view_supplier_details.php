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

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper">

        <?php include 'includes/topbar.php'; ?>

        <?php include 'includes/sidebar.php'; ?>
        <?php include 'includes/modal.php'; ?>
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Profile</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Profile
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->
                        <div class="col-md-4"> <!--begin::Quick Example-->

                            <?php
                            // Start the session


                            // Include the database connection file
                            include '../connection/conn.php';

                            // Get supplier_id from the session
                            $supplier_id = $_GET['id'];

                            // Fetch supplier details from the database
                            $sql = "SELECT * FROM supplier WHERE supplier_id = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param('i', $supplier_id);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            // Check if the supplier exists
                            $supplier = $result->fetch_assoc();
                            ?>

                            <div class="card card-primary card-outline mb-4">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Profile Info</div>
                                </div>
                                <!--end::Header-->

                                <!--begin::Form-->
                                <form>
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center mb-5">
                                            <img class="user-image shadow rounded-circle" width="200" height="200" style="object-fit: cover;"
                                                src="../uploads/suppliers/<?php echo htmlspecialchars($supplier['business_pic'] ?? 'default.jpg'); ?>" alt="">
                                        </div>
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-md-12"><strong>Business Name:</strong> <?php echo htmlspecialchars($supplier['business_name'] ?? 'N/A'); ?></div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-12"><strong>Supplier Type:</strong> <?php echo htmlspecialchars($supplier['supplier_type'] ?? 'N/A'); ?></div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-12"><strong>Address:</strong> <?php echo htmlspecialchars($supplier['address'] ?? 'N/A'); ?></div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-12"><strong>Contact:</strong> <?php echo htmlspecialchars($supplier['contact'] ?? 'N/A'); ?></div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-12"><strong>Email:</strong> <?php echo htmlspecialchars($supplier['email'] ?? 'N/A'); ?></div>
                                            <!--end::Col-->
                                            <div class="col-md-12">
                                                <strong>Facebook:</strong>
                                                <?php
                                                if (empty($supplier['facebook'])) {
                                                    echo 'N/A';
                                                } else {
                                                    echo '<a href="' . htmlspecialchars($supplier['facebook']) . '" target="_blank">' . htmlspecialchars($supplier['facebook']) . '</a>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Quick Example-->



                        </div>

                        <div class="col-md-8"> <!--begin::Quick Example-->

                            <?php
                            // Start the session to access session variables
                            // Retrieve the supplier_id from the session
                            $supplier_id = $_GET['id'];

                            // Fetch images from the supplier_feedback_pics table for the given supplier_id
                            $sql = "SELECT * FROM supplier_feedback_pics WHERE supplier_id = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("i", $supplier_id);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            ?>

                            <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Feedbacks</div>
                                </div> <!--end::Header--> <!--begin::Form-->
                                <form id="uploadForm" method="post" action="upload_pic_feedback.php" enctype="multipart/form-data">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <div style="overflow: auto; height: 500px;">
                                            <div class="row justify-content-center">
                                                <?php
                                                // Check if any images were found
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $file_path = $row['file_path'];
                                                        $file_name = $row['file_name'];

                                                        // Display the images dynamically
                                                        echo '<div class="col-md-3 m-2">
                                        <img width="200" height="200" style="object-fit: cover; border-radius: 50px;" src="' . $file_path . '" alt="' . $file_name . '">
                                    </div>';
                                                    }
                                                } else {
                                                    echo "No feedback images found.";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </form>
                            </div>

                        </div>
                    </div> <!--end::Row--> <!--begin::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <?php include 'includes/footer.php'; ?>