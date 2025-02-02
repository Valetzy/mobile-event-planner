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

                        <?php
                        include '../connection/conn.php'; // Include your database connection
                        
                        // Pagination Variables
                        $limit = 10; // Number of rows per page
                        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                        $offset = ($page - 1) * $limit;

                        // Count total records
                        $count_query = "SELECT COUNT(DISTINCT u.user_id) AS total FROM events AS e
                INNER JOIN users AS u ON u.user_id = e.organizer_id";
                        $count_result = mysqli_query($conn, $count_query);
                        $total_rows = mysqli_fetch_assoc($count_result)['total'];
                        $total_pages = ceil($total_rows / $limit);

                        // Fetch paginated data
                        $query = "
                                    SELECT 
                                        u.user_id,
                                        u.full_name AS organizer_name,
                                        u.profile_pic,
                                        SUM(CASE WHEN et.event_name = 'Birthday' THEN 1 ELSE 0 END) AS birthday_count,
                                        SUM(CASE WHEN et.event_name = 'Wedding' THEN 1 ELSE 0 END) AS wedding_count,
                                        SUM(CASE WHEN et.event_name = 'Christening' THEN 1 ELSE 0 END) AS christening_count
                                    FROM events AS e
                                    INNER JOIN users AS u ON u.user_id = e.organizer_id
                                    INNER JOIN event_types AS et ON et.event_type_id = e.event_type
                                    GROUP BY u.user_id, u.full_name, u.profile_pic
                                    LIMIT $limit OFFSET $offset
                                ";

                        $result = mysqli_query($conn, $query);
                        ?>

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
                                    <th>Organizer Name</th>
                                    <th>Birthday</th>
                                    <th>Wedding</th>
                                    <th>Christening</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td style="width: 100px">
                                            <center><img src="../images/<?php echo $row['profile_pic']; ?>" alt="profile"
                                                    width="50px"></center>
                                        </td>
                                        <td><?php echo $row['organizer_name']; ?></td>
                                        <td><?php echo $row['birthday_count']; ?></td>
                                        <td><?php echo $row['wedding_count']; ?></td>
                                        <td><?php echo $row['christening_count']; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <nav>
                            <ul class="pagination justify-content-center">
                                <?php if ($page > 1): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=1">First</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo ($page - 1); ?>">Previous</a>
                                    </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($page < $total_pages): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo ($page + 1); ?>">Next</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $total_pages; ?>">Last</a>
                                    </li>
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
                        </script>



                    </div>
                </div>
            </div>
        </main>
    </div>

    <?php include 'includes/footer.php'; ?>