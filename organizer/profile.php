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
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS (make sure this is included after jQuery) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


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
                                <!-- Card Header -->
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Profile Info</h5>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body text-center">
                                    <!-- Profile Image -->
                                    <div class="mb-4">
                                        <img class="user-image shadow rounded-circle " width="200" height="200"
                                            style="object-fit: cover;"
                                            src="../uploads/<?php echo htmlspecialchars($supplier['profile_pic'] ?? 'default.jpg'); ?>"
                                            alt="Profile Picture">
                                    </div>

                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editProfileModal">
                                        Edit Profile
                                    </button>

                                    <!-- Profile Details -->
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <ul class="list-group list-group-flush text-start">
                                                <li class="list-group-item"><strong>Name:</strong>
                                                    <span
                                                        id="profile_name"><?php echo htmlspecialchars($supplier['full_name'] ?? 'N/A'); ?></span>
                                                </li>
                                                <li class="list-group-item"><strong>Address:</strong>
                                                    <span
                                                        id="profile_address"><?php echo htmlspecialchars($supplier['address'] ?? 'N/A'); ?></span>
                                                </li>
                                                <li class="list-group-item"><strong>Contact:</strong>
                                                    <span
                                                        id="profile_contact"><?php echo htmlspecialchars($supplier['contact'] ?? 'N/A'); ?></span>
                                                </li>
                                                <li class="list-group-item"><strong>Email:</strong>
                                                    <span
                                                        id="profile_email"><?php echo htmlspecialchars($supplier['email'] ?? 'N/A'); ?></span>
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>Facebook:</strong>
                                                    <?php if (!empty($supplier['facebook'])): ?>
                                                        <a href="<?php echo htmlspecialchars($supplier['facebook']); ?>"
                                                            target="_blank">
                                                            <?php echo htmlspecialchars($supplier['facebook']); ?>
                                                        </a>
                                                    <?php else: ?>
                                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#facebookModal">
                                                            Add Facebook Link
                                                        </button>
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Profile Modal -->
                            <div class="modal fade" id="editProfileModal" tabindex="-1"
                                aria-labelledby="editProfileModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form id="editProfileForm">
                                            <div class="modal-body">
                                                <input type="hidden" name="user_id"
                                                    value="<?php echo $supplier['user_id']; ?>">
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" name="full_name"
                                                        value="<?php echo htmlspecialchars($supplier['full_name']); ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" name="address"
                                                        value="<?php echo htmlspecialchars($supplier['address']); ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Contact</label>
                                                    <input type="text" class="form-control" name="contact"
                                                        value="<?php echo htmlspecialchars($supplier['contact']); ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="<?php echo htmlspecialchars($supplier['email']); ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Facebook Link Modal -->
                            <div class="modal fade" id="facebookModal" tabindex="-1"
                                aria-labelledby="facebookModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="facebookModalLabel">Add Facebook Link</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="url" id="facebookLinkInput" class="form-control"
                                                placeholder="Enter Facebook URL">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary"
                                                onclick="saveFacebookLink()">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                document.getElementById("editProfileForm").addEventListener("submit", function (e) {
                                    e.preventDefault();

                                    const formData = new FormData(this);

                                    fetch("update_profile.php", {
                                        method: "POST",
                                        body: formData
                                    })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) {
                                                alert("Profile updated successfully!");
                                                document.getElementById("profile_name").innerText = formData.get("full_name");
                                                document.getElementById("profile_address").innerText = formData.get("address");
                                                document.getElementById("profile_contact").innerText = formData.get("contact");
                                                document.getElementById("profile_email").innerText = formData.get("email");
                                                document.querySelector("#editProfileModal .btn-close").click(); // Close modal
                                            } else {
                                                alert("Error updating profile: " + data.message);
                                            }
                                        })
                                        .catch(error => {
                                            console.error("Error:", error);
                                            alert("An error occurred while updating the profile.");
                                        });
                                });

                                function saveFacebookLink() {
                                    const link = document.getElementById("facebookLinkInput").value.trim();
                                    if (link) {
                                        fetch("save_facebook.php", {
                                            method: "POST",
                                            headers: { "Content-Type": "application/x-www-form-urlencoded" },
                                            body: "facebook=" + encodeURIComponent(link)
                                        })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    alert("Facebook link saved successfully!");
                                                    location.reload();
                                                } else {
                                                    alert("Error: " + data.message);
                                                }
                                            })
                                            .catch(error => {
                                                console.error("Error:", error);
                                                alert("An error occurred while saving.");
                                            });
                                    }
                                }
                            </script>


                            <!--end::Quick Example-->



                        </div>
                    </div> <!--end::Row--> <!--begin::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <?php include 'includes/footer.php'; ?>