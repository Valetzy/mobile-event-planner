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

        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: 'fetch_events.php',
                eventClick: function (info) {
                    var id = info.event.extendedProps.id;

                    // Debugging: Log the ID to confirm it's being retrieved
                    console.log("Event ID:", id);

                    var title = info.event.title;
                    var start = info.event.start.toLocaleDateString();
                    var end = info.event.end ? info.event.end.toLocaleDateString() : 'N/A';
                    var fullName = info.event.extendedProps.full_name || 'Unknown Organizer';
                    var profilePic = info.event.extendedProps.profile_pic || 'default-profile.png';

                    document.getElementById('eventDetails').innerHTML = `
                        <div class="text-center">
                            <img src="../uploads/${profilePic}" alt="${fullName}" class="rounded-circle" style="width: 100px; height: 100px;">
                            <h1>${title}</h1>
                            <h2>${fullName}</h2>
                            <p><strong>Start:</strong> ${start}</p>
                            <p><strong>End:</strong> ${end}</p>
                            <button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#largeModal${id}'>Mark as Done</button>
                        </div>

                        <div class='modal fade' id='largeModal${id}' tabindex='-1'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>Upload Pictures</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <form id='uploadForm${id}' action='functions/done.php' method='post' enctype='multipart/form-data'>
                                            <input type='hidden' name='id' value='${id}'>
                                            <div class='mb-3'>
                                                <label for='pictures${id}' class='form-label'>Select Pictures</label>
                                                <input type='file' class='form-control' id='pictures${id}' name='pictures[]' multiple accept='image/*'>
                                                <small class='form-text text-muted'>You can select multiple pictures.</small>
                                            </div>
                                            <div id='imagePreview${id}' class='d-flex flex-wrap gap-2'></div>
                                        </form>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                        <button type='submit' form='uploadForm${id}' class='btn btn-primary'>Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
            });
            calendar.render();
        });


        </script>




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

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Event Schedule</h3>
                                </div> <!-- /.card-header -->
                                <div class="card-body">#
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Event Details</h3>
                                </div>
                                <div class="card-body" id="eventDetails">
                                    <!-- Event details will be populated here -->
                                </div>
                            </div>
                        </div>



                    </div> <!--end::Row--> <!--begin::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <?php include 'includes/footer.php'; ?>