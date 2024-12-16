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
                            <h3 class="mb-0">Event Schedule</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Event Schedule
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
                                <h3 class="card-title">Event Schedule</h3>
                            </div> <!-- /.card-header -->
                            <div class="card-body">

                                <?php

                                $organizer_id = $_SESSION['id'];

                                // SQL query to fetch the pending client requests
                                $sql = "
                                        SELECT 
                                            et.event_name, 
                                            u.full_name,
                                            u.profile_pic,
                                            crf.status, 
                                            crf.id, 
                                            et.event_type_id, 
                                            crf.date_created, 
                                            crf.status 
                                        FROM client_request_form AS crf
                                        LEFT JOIN birthday_client_form AS bcf ON crf.client_form_id = bcf.id
                                        LEFT JOIN wedding_form AS wf ON crf.client_form_id = wf.id
                                        LEFT JOIN christening_form AS cf ON crf.client_form_id = cf.id
                                        INNER JOIN event_types AS et ON crf.event_type = et.event_type_id
                                        INNER JOIN users AS u ON crf.client_id = u.user_id 
                                        WHERE crf.status = 'done' AND crf.organizer_id = '$organizer_id' 
                                        AND (bcf.id IS NOT NULL OR wf.id IS NOT NULL OR cf.id IS NOT NULL) ORDER BY crf.date_created ASC ";

                                // Execute the query
                                $result = mysqli_query($conn, $sql);

                                // Check if query execution was successful
                                if (!$result) {
                                    die("Error: " . mysqli_error($conn));
                                }

                                ?>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th style="width: 200px">Profile</th>
                                            <th>Name</th>
                                            <th>Event Type</th>
                                            <th>Date Requested</th>
                                            <th style="width: 100px">Action</th>
                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $profile_image = $row['profile_pic']; // Replace with actual logic
                                            $event_type = $row['event_name'];
                                            $status = "done";
                                           
                                            echo "
                                                    <tr>
                                                        <td>{$row['id']}</td>
                                                        <td><img  style='width: 200px' src='{$profile_image}' alt='photo'></td>
                                                        <td>{$row['full_name']}</td>
                                                        <td>{$event_type}</td>
                                                        <td>{$row['date_created']}</td>
                                                        <td style=' white-space: nowrap;'>
                                                           <a class='btn btn-primary' href='view_request.php?id={$row['id']}&eventType={$event_type}&status={$status}'done'>View Details</a>
                                                        </td>
                                                        
                                                    </tr>
                                                ";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <script>
                                    // Function to handle View Details button click
                                    function viewDetails(requestId, eventType) {
                                        // Redirect to the appropriate URL with proper encoding
                                        window.location.href = `view_request.php?id=${requestId}&eventType=${encodeURIComponent(eventType)}`;
                                    }

                                    // Function to handle Approved/Cancel button clicks
                                    function handleAction(requestId) {
                                        // Implement functionality for Approved or Cancel action
                                        window.location.href = `functions/approved.php?id=${requestId}`;
                                        // You can replace the alert with an actual AJAX call or redirection as needed
                                    }

                                    function deniedAction(requestId) {
                                        // Implement functionality for Approved or Cancel action
                                        window.location.href = `functions/denied.php?id=${requestId}`;
                                        // You can replace the alert with an actual AJAX call or redirection as needed
                                    }
                                </script>




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