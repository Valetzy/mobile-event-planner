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
                            <h3 class="mb-0">Events</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Events
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->

                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addpackage">Add Event</button>
                            </div>
                            <div class="card-body">
                                <?php
                                include '../connection/conn.php';

                                if (isset($_SESSION['id'])) {
                                    $id = $_SESSION['id'];

                                    // Define the number of records per page
                                    $recordsPerPage = 5;

                                    // Get the current page from the URL, default to page 1 if not set
                                    $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                                    $offset = ($currentPage - 1) * $recordsPerPage;

                                    // Prepare and execute the paginated query
                                    $stmt = $conn->prepare("SELECT * FROM organizer_products WHERE organizer_id = ? LIMIT ?, ?");
                                    $stmt->bind_param("iii", $id, $offset, $recordsPerPage);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        echo '
                                                <table id="example2" class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>Product Name</th>
                                                            <th>Pic</th>
                                                            <th style="width: 200px">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';

                                        while ($row = $result->fetch_assoc()) {
                                            echo '
                                                <tr class="align-middle">
                                                    <td>' . htmlspecialchars($row['orga_products_id']) . '</td>
                                                    <td>' . htmlspecialchars($row['product_name']) . '</td>
                                                    <td><img src="../images/' . htmlspecialchars($row['product_photo']) . '" alt="Product Image" style="width: 100px; height: auto;"></td>
                                                    <td><button class="btn btn-warning">Edit</button> <button class="btn btn-danger">Trash</button></td>
                                                </tr>';
                                        }

                                        echo '
                                                </tbody>
                                            </table>';
                                    } else {
                                        echo '<p>No products found.</p>';
                                    }

                                    // Get total records count for pagination
                                    $countStmt = $conn->prepare("SELECT COUNT(*) as total FROM organizer_products WHERE organizer_id = ?");
                                    $countStmt->bind_param("i", $id);
                                    $countStmt->execute();
                                    $countResult = $countStmt->get_result();
                                    $totalRecords = $countResult->fetch_assoc()['total'];
                                    $totalPages = ceil($totalRecords / $recordsPerPage);

                                    $stmt->close();
                                    $countStmt->close();
                                } else {
                                    echo '<p>Session ID not set. Please log in.</p>';
                                }

                                $conn->close();
                                ?>
                            </div>
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-end">
                                    <?php if ($currentPage > 1): ?>
                                        <li class="page-item"><a class="page-link"
                                                href="?page=<?php echo $currentPage - 1; ?>">«</a></li>
                                    <?php endif; ?>

                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php endfor; ?>

                                    <?php if ($currentPage < $totalPages): ?>
                                        <li class="page-item"><a class="page-link"
                                                href="?page=<?php echo $currentPage + 1; ?>">»</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>


                        <div class="modal fade" id="addpackage" tabindex="-1">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="functions/add_product.php" enctype="multipart/form-data"
                                            method="post">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-12">
                                                        <div class="card-border">
                                                            <div class="card-border-body">
                                                                <div class="row">

                                                                    <div class="col-sm-12 col-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Event Type</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control"
                                                                                    name="event_type"
                                                                                    id="rental_retails">
                                                                                    <option selected disabled>Choose an
                                                                                        Option</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12 col-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Product Name<span
                                                                                    class="text-red">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                name="product_name" required
                                                                                placeholder="Enter Product Name">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12 col-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Photo<span
                                                                                    class="text-red">*</span></label>
                                                                            <input type="file" class="form-control"
                                                                                name="theme_photo" required
                                                                                placeholder="Enter Product Name">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Add Product</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div><!--end::Col-->

                    </div> <!--end::Row--> <!--begin::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetchEventTypes();
        });

        function fetchEventTypes() {
            fetch("functions/fetch_event_types.php")
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById("rental_retails");

                    data.forEach(event => {
                        const option = document.createElement("option");
                        option.value = event.event_type_id;
                        option.textContent = event.event_name;
                        select.appendChild(option);
                    });
                })
                .catch(error => console.error("Error fetching event types:", error));
        }
    </script>
    <?php include 'includes/footer.php'; ?>