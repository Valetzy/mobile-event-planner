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
                            <h3 class="mb-0">Event Reports</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Reports
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
                        // Include your database connection file
                        include '../connection/conn.php';

                        // Set default values for pagination
                        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 10; // Default to 10 per page
                        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                        $offset = ($page - 1) * $limit;

                        // Fetch total record count
                        $totalQuery = "SELECT COUNT(*) AS total FROM client_request_form";
                        $totalResult = mysqli_query($conn, $totalQuery);
                        $totalRow = mysqli_fetch_assoc($totalResult);
                        $totalRecords = $totalRow['total'];
                        $totalPages = ceil($totalRecords / $limit);

                        // Fetch paginated data
                        $query = "SELECT 
                                    client.full_name AS client_name, 
                                    client.profile_pic, 
                                    et.event_name, 
                                    crf.date_created, 
                                    crf.status, 
                                    organizer.full_name AS organizer_name
                                FROM client_request_form AS crf 
                                INNER JOIN users AS client ON client.user_id = crf.client_id
                                INNER JOIN event_types AS et ON et.event_type_id = crf.event_type
                                LEFT JOIN users AS organizer ON organizer.user_id = crf.organizer_id
                                ORDER BY crf.date_created DESC
                                LIMIT $limit OFFSET $offset";
                        

                        $result = mysqli_query($conn, $query);
                        ?>

                        <div class="d-flex justify-content-between">
                            <!-- Pagination Limit Dropdown -->
                            <div>
                                <label for="limit">Show:</label>
                                <select id="limit" class="form-select d-inline-block w-auto" onchange="changeLimit()">
                                    <option value="5" <?= ($limit == 5) ? 'selected' : '' ?>>5</option>
                                    <option value="10" <?= ($limit == 10) ? 'selected' : '' ?>>10</option>
                                    <option value="50" <?= ($limit == 50) ? 'selected' : '' ?>>50</option>
                                    <option value="100" <?= ($limit == 100) ? 'selected' : '' ?>>100</option>
                                </select>
                            </div>

                            <!-- Search Bar -->
                            <div class="col-md-4">
                                <input type="text" id="searchBar" class="form-control mb-2"
                                    placeholder="Search for names..." onkeyup="searchTable()">
                            </div>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Client Name</th>
                                    <th>Event Type</th>
                                    <th>Organizer  Name</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        // Check if profile picture exists; otherwise, use default
                                        $profilePic = !empty($row['profile_pic']) ? '../uploads/' . $row['profile_pic'] : '../images/profile.png';

                                        // Format date
                                        $formattedDate = date('m/d/Y', strtotime($row['date_created']));

                                        echo "<tr>
                                                <td style='width: 100px'>
                                                    <center><img src='$profilePic' alt='profile' width='50px'></center>
                                                </td>
                                                <td>{$row['client_name']}</td>
                                                <td>{$row['event_name']}</td>
                                                <td>{$row['organizer_name']}</td>
                                                <td>{$row['status']}</td>
                                                <td>$formattedDate</td>
                                            </tr>";

                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        <nav>
                            <ul class="pagination">
                                <?php if ($page > 1): ?>
                                    <li class="page-item"><a class="page-link"
                                            href="?page=<?= ($page - 1) ?>&limit=<?= $limit ?>">Previous</a></li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?>&limit=<?= $limit ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($page < $totalPages): ?>
                                    <li class="page-item"><a class="page-link"
                                            href="?page=<?= ($page + 1) ?>&limit=<?= $limit ?>">Next</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>

                        <script>
                            function searchTable() {
                                let input = document.getElementById("searchBar").value.toLowerCase();
                                let rows = document.querySelectorAll("#tableBody tr");

                                rows.forEach(row => {
                                    let nameCell = row.cells[1].textContent.toLowerCase();
                                    row.style.display = nameCell.includes(input) ? "" : "none";
                                });
                            }

                            function changeLimit() {
                                let selectedLimit = document.getElementById("limit").value;
                                window.location.href = "?page=1&limit=" + selectedLimit;
                            }
                        </script>


                    </div>
                </div>
            </div>
        </main>
    </div>

    <?php include 'includes/footer.php'; ?>