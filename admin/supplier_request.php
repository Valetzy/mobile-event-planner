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
                            <h3 class="mb-0">Organizers Packages</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Organizers Packages
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->

                        <!-- Search Bar -->
                        <div class="d-flex justify-content-end">
                            <div class="col-md-4">
                                <input type="text" id="searchBar" class="form-control mb-2"
                                    placeholder="Search for names..." onkeyup="searchTable()">
                            </div>
                        </div>

                        <!-- Table -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Supplier Name</th>
                                    <th>Products</th>
                                    <th>Packages</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <tr>
                                    <td style="width: 100px">
                                        <center><img src="../images/profile.png" alt="profile" width="50px"></center>
                                    </td>
                                    <td>Sample Name</td>
                                    <td>10</td>
                                    <td>5</td>
                                </tr>
                            </tbody>
                        </table>

                        <script>
                            function searchTable() {
                                let input = document.getElementById("searchBar").value.toLowerCase();
                                let rows = document.querySelectorAll("#tableBody tr");

                                rows.forEach(row => {
                                    let nameCell = row.cells[1].textContent.toLowerCase();
                                    row.style.display = nameCell.includes(input) ? "" : "none";
                                });
                            }
                        </script>



                    </div>
                </div>
            </div>
        </main>
    </div>

    <?php include 'includes/footer.php'; ?>