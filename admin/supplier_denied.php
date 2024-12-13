<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php"); // Redirect to login if not logged in
    exit();
}



?>
<!-- Your additional supplier page content goes here -->

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
                            <h3 class="mb-0">supplier denied</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    supplier denied
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
                            <div class="card-header ">
                                <h3 class="card-title">LIST</h3>
                                <input style="float: right;" type="text" name="search-bar" id="search-bar"
                                    placeholder="Search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                            </div>
                            <div class="card-body">
                                <?php
                                include '../connection/conn.php';

                                $records_per_page = 10;
                                $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                $search_query = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
                                $offset = ($current_page - 1) * $records_per_page;

                                $total_query = "SELECT COUNT(*) AS total 
                                            FROM supplier 
                                            WHERE status = 'denied' 
                                            AND (business_name LIKE '%$search_query%' 
                                                OR email LIKE '%$search_query%' 
                                                OR address LIKE '%$search_query%')";
                                $total_result = mysqli_query($conn, $total_query);
                                $total_row = mysqli_fetch_assoc($total_result);
                                $total_records = $total_row['total'];

                                $total_pages = ceil($total_records / $records_per_page);

                                $query = "SELECT * FROM supplier 
                                    WHERE status = 'denied' 
                                    AND (business_name LIKE '%$search_query%' 
                                        OR email LIKE '%$search_query%' 
                                        OR address LIKE '%$search_query%') 
                                    LIMIT $records_per_page OFFSET $offset";
                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Business Name</th>
                                                <th>supplier_type</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Business Picture</th>
                                                <th>Business Permit</th>
                                                <th>BIR Permit</th>
                                                <th>DTI Permit</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                    $counter = $offset + 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr class="align-middle">
                                            <td>' . $counter . '</td>
                                            <td>' . htmlspecialchars($row['business_name']) . '</td>
                                            <td>' . htmlspecialchars($row['supplier_type']) . '</td>
                                            <td>' . htmlspecialchars($row['address']) . '</td>
                                            <td>' . htmlspecialchars($row['email']) . '</td>
                                            <td><img src="../uploads/suppliers/' . htmlspecialchars($row['business_pic']) . '" alt="Business Picture" class="thumbnail" style="width:50px;height:50px;cursor:pointer;" onclick="viewImage(this.src);"></td>
                                            <td><img src="../uploads/suppliers/' . htmlspecialchars($row['business_permit']) . '" alt="Business Permit" class="thumbnail" style="width:50px;height:50px;cursor:pointer;" onclick="viewImage(this.src);"></td>
                                            <td><img src="../uploads/suppliers/' . htmlspecialchars($row['bir_permit']) . '" alt="BIR Permit" class="thumbnail" style="width:50px;height:50px;cursor:pointer;" onclick="viewImage(this.src);"></td>
                                            <td><img src="../uploads/suppliers/' . htmlspecialchars($row['dti_permit']) . '" alt="DTI Permit" class="thumbnail" style="width:50px;height:50px;cursor:pointer;" onclick="viewImage(this.src);"></td>
                                        </tr>';
                                        $counter++;
                                    }

                                    echo '</tbody>
                                    </table>';
                                } else {
                                    echo '<p>No denied supplier found.</p>';
                                }
                                ?>
                            </div>
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-end">
                                    <?php
                                    if ($current_page > 1) {
                                        echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page - 1) . '&search=' . urlencode($search_query) . '">«</a></li>';
                                    }

                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        echo '<li class="page-item' . ($i == $current_page ? ' active' : '') . '">
                                        <a class="page-link" href="?page=' . $i . '&search=' . urlencode($search_query) . '">' . $i . '</a>
                                    </li>';
                                    }

                                    if ($current_page < $total_pages) {
                                        echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page + 1) . '&search=' . urlencode($search_query) . '">»</a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                        <div id="imageModal" class="modal" style="display:none; position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.8);">
                            <span id="closeModal" style="position: absolute; top: 10px; right: 25px; color: white; font-size: 35px; font-weight: bold; cursor: pointer;">&times;</span>
                            <img id="modalImage" style="margin: auto; display: block; max-width: 90%; max-height: 90%; margin-top: 50px; ">
                        </div>


                        <script>
                            let debounceTimer;
                            document.getElementById('search-bar').addEventListener('input', function() {
                                clearTimeout(debounceTimer);
                                debounceTimer = setTimeout(() => {
                                    const searchValue = this.value.trim();
                                    const url = new URL(window.location.href);
                                    url.searchParams.set('search', searchValue);
                                    url.searchParams.set('page', 1);
                                    window.location.href = url.toString();
                                }, 1000); // Delay of 500ms
                            });
                        </script>
                        <script>
                            function viewImage(src) {
                                const modal = document.getElementById('imageModal');
                                const modalImage = document.getElementById('modalImage');
                                modal.style.display = 'block';
                                modalImage.src = src;
                            }

                            document.getElementById('closeModal').onclick = function() {
                                document.getElementById('imageModal').style.display = 'none';
                            }

                            window.onclick = function(event) {
                                const modal = document.getElementById('imageModal');
                                if (event.target === modal) {
                                    modal.style.display = 'none';
                                }
                            }
                        </script>




                    </div> <!--end::Row--> <!--begin::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <?php include 'includes/footer.php'; ?>