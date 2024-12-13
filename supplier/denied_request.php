<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php"); // Redirect to login if not logged in
    exit();
}

include '../connection/conn.php';

?>
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
                            <h3 class="mb-0">Denied Request</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Denied Request
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
                            <div class="card-header">
                                <h3 class="card-title">Denied Request</h3>
                            </div> <!-- /.card-header -->
                            <div class="card-body">
                                <?php
                                // Include your database connection file
                                include '../connection/conn.php';

                                // Query to select data from organizer_request and users
                                $query = "SELECT u.full_name, u.profile_pic, u.user_id , ogr.status, ogr.orga_request_id
                                        FROM organizer_request AS ogr 
                                        INNER JOIN users AS u ON ogr.organizer_id = u.user_id 
                                        WHERE ogr.status = 'deny' AND ogr.supplier_id = '" . $_SESSION['id'] . "'";

                                // Execute the query
                                $result = mysqli_query($conn, $query);
                                ?>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th style="width: 200px">Profile</th>
                                            <th>Name</th>
                                            <th style="width: 300px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            $counter = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                $status = htmlspecialchars($row['status']);

                                                echo "<tr class='align-middle'>";
                                                echo "<td>" . $counter . ".</td>";
                                                echo "<td><img src='../uploads/" . htmlspecialchars($row['profile_pic']) . "' alt='Profile Picture' width='100px' height='100px'></td>";
                                                echo "<td>" . htmlspecialchars($row['full_name']) . "</td>";
                                                echo "<td>";

                                                if ($status === 'deny') {

                                                    echo '<form action="functions/confirm.php" method="post">
                                                            <input type="hidden" name="approved" value="approved">
                                                            <input type="hidden" name="orga_id" value="' . htmlspecialchars($row['orga_request_id']) . '">
                                                            <button class="btn btn-success m-3" type="submit">Approve Denied</button>
                                                        </form>';

                                                        echo '<form action="functions/removed.php" method="post">
                                                            <input type="hidden" name="orga_id" value="' . htmlspecialchars($row['orga_request_id']) . '">
                                                            <button class="btn btn-danger m-3" type="submit">Remove</button>
                                                        </form>';
                                                }

                                                echo "</td>";
                                                echo "</tr>";
                                                $counter++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='4' class='text-center'>No requests found</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <?php
                                // Close the database connection
                                mysqli_close($conn);
                                ?>
                            </div> <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-end">
                                    <li class="page-item"> <a class="page-link" href="#">«</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">»</a> </li>
                                </ul>
                            </div>
                        </div>

                    </div> <!--end::Row--> <!--begin::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <?php include 'includes/footer.php'; ?>