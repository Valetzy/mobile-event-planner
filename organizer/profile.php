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
                        <div class="col-md-12"> <!--begin::Quick Example-->

                            <?php
                            // Start the session
                            

                            // Include the database connection file
                            include '../connection/conn.php';

                            // Get supplier_id from the session
                            $user_id = $_SESSION['id'];

                            // Fetch supplier details from the database
                            $sql = "SELECT * FROM users WHERE user_id = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param('i', $user_id);
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
                                            <img class="user-image shadow rounded-circle" width="200" height="200"
                                                style="object-fit: cover;"
                                                src="../uploads/<?php echo htmlspecialchars($supplier['profile_pic'] ?? 'default.jpg'); ?>"
                                                alt="">
                                        </div>
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-md-12"><strong>Name:</strong>
                                                <?php echo htmlspecialchars($supplier['full_name'] ?? 'N/A'); ?>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-12"><strong>Address:</strong>
                                                <?php echo htmlspecialchars($supplier['address'] ?? 'N/A'); ?></div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-12"><strong>Contact:</strong>
                                                <?php echo htmlspecialchars($supplier['contact'] ?? 'N/A'); ?></div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-12"><strong>Email:</strong>
                                                <?php echo htmlspecialchars($supplier['email'] ?? 'N/A'); ?></div>
                                            <!--end::Col-->
                                            <div class="col-md-12">
                                                <strong>Facebook:</strong>
                                                <?php
                                                if (empty($supplier['facebook'])) {
                                                    echo '<button class="btn btn-primary" onclick="addFacebookLink()">Add Facebook Link</button>';
                                                } else {
                                                    echo '<a href="' . htmlspecialchars($supplier['facebook']) . '" target="_blank">' . htmlspecialchars($supplier['facebook']) . '</a>';
                                                }
                                                ?>
                                            </div>

                                            <script>
                                                function addFacebookLink() {
                                                    const link = prompt("Please enter the Facebook link:");
                                                    if (link) {
                                                        // Send the link to the server using fetch API
                                                        fetch("save_facebook.php", {
                                                            method: "POST",
                                                            headers: {
                                                                "Content-Type": "application/x-www-form-urlencoded"
                                                            },
                                                            body: "facebook=" + encodeURIComponent(link)
                                                        })
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                if (data.success) {
                                                                    alert("Facebook link saved successfully!");
                                                                    location.reload(); // Reload to reflect the changes
                                                                } else {
                                                                    alert("Error saving the Facebook link: " + data.message);
                                                                }
                                                            })
                                                            .catch(error => {
                                                                console.error("Error:", error);
                                                                alert("An error occurred while saving the Facebook link.");
                                                            });
                                                    }
                                                }
                                            </script>

                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Quick Example-->



                        </div>
                    </div> <!--end::Row--> <!--begin::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <?php include 'includes/footer.php'; ?>