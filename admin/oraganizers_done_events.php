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
                            <h3 class="mb-0">Done Events</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Done Events
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->

                        <div class="d-flex justify-content-end">
                            <div class="col-md-4 ">
                                <input type="text" id="searchBar" class="form-control mb-2"
                                    placeholder="Search for names..." onkeyup="searchTable()">
                            </div>
                        </div>

                        <?php
                        include "../connection/conn.php";

                        // Pagination variables
                        $limitOptions = [10, 20, 50, 100];
                        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 10; // Default limit
                        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Default page
                        $offset = ($page - 1) * $limit;

                        // SQL query to fetch total records
                        $totalSql = "SELECT COUNT(DISTINCT users.user_id) AS total FROM users
                                    INNER JOIN organizer_done_event ON users.user_id = organizer_done_event.organizer_id";
                        $totalResult = $conn->query($totalSql);
                        $totalRow = $totalResult->fetch_assoc();
                        $totalRecords = $totalRow['total'];
                        $totalPages = ceil($totalRecords / $limit);

                        // SQL query to fetch data with pagination
                        $sql = "SELECT users.user_id, users.profile_pic, users.full_name AS organizer_name, COUNT(organizer_done_event.event_id) AS events_done
                                FROM users
                                INNER JOIN organizer_done_event ON users.user_id = organizer_done_event.organizer_id
                                GROUP BY users.user_id, users.full_name
                                LIMIT $limit OFFSET $offset";

                        $result = $conn->query($sql);
                        ?>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Organizer Name</th>
                                    <th>Event Done</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td style='width: 100px'><center><img src='../images/" . htmlspecialchars($row['profile_pic']) . "' alt='profile' width='50px'></center></td>";
                                        echo "<td>" . htmlspecialchars($row['organizer_name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['events_done']) . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No records found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-between">
                            <div>
                                <label for="limit">Show:</label>
                                <select id="limit" onchange="changeLimit()">
                                    <?php foreach ($limitOptions as $option): ?>
                                        <option value="<?= $option ?>" <?= $option == $limit ? 'selected' : '' ?>>
                                            <?= $option ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <nav>
                                    <ul class="pagination">
                                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                                <a class="page-link"
                                                    href="?page=<?= $i ?>&limit=<?= $limit ?>"><?= $i ?></a>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <?php
                        $conn->close();
                        ?>

                        <script>
                            function searchTable() {
                                let input = document.getElementById("searchBar");
                                let filter = input.value.toLowerCase();
                                let table = document.getElementById("tableBody");
                                let rows = table.getElementsByTagName("tr");

                                for (let i = 0; i < rows.length; i++) {
                                    let cells = rows[i].getElementsByTagName("td");
                                    let nameCell = cells[1]; // Organizer Name column
                                    if (nameCell) {
                                        let nameText = nameCell.textContent || nameCell.innerText;
                                        if (nameText.toLowerCase().indexOf(filter) > -1) {
                                            rows[i].style.display = "";
                                        } else {
                                            rows[i].style.display = "none";
                                        }
                                    }
                                }
                            }

                            function changeLimit() {
                                const limit = document.getElementById("limit").value;
                                window.location.href = "?page=1&limit=" + limit; // Reset to first page
                            }
                        </script>

                    </div>
                </div>
            </div>
        </main>
    </div>

    <?php include 'includes/footer.php'; ?>