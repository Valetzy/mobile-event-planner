<?php 
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  header("Location: ../index.php"); // Redirect to login if not logged in
  exit();
}

include 'functions/function.php'; ?>
<?php include '../connection/conn.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <?php include 'includes/topbar.php'; ?>

    <!-- Blog Start -->
    <div class="container-fluid blog py-6">
        <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <h1 class="display-5 mb-5">Event Types</h1>
            </div>
            <div class="row gx-4 justify-content-center">
                <div class="container">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM event_types";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $event_name = $row['event_name'];
                                $event_image = $row['event_image'];
                                $event_type_id = $row['event_type_id'];

                                echo '
                            <div class="col-md-4 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                                <div class="blog-item">
                                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#modal_' . $event_type_id . '">
                                        <div class="overflow-hidden rounded">
                                            <img src="../assets/img/' . $event_image . '" class="img-fluid" alt="' . $event_name . '" style="height: 300px; width: 500px;">
                                        </div>
                                        <div class="h5 lh-base my-auto h-100 p-3">
                                            <center>
                                                <h1 style="font-size:30px;">' . $event_name . '</h1>
                                            </center>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modal_' . $event_type_id . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel_' . $event_type_id . '" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title" id="staticBackdropLabel_' . $event_type_id . '" style="font-size:30px;">Date of Event</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="get" action="event_organizer.php">
                                                <input type="hidden" name="eventtype_id" value="' . $event_type_id . '">
                                                <input type="hidden" name="event_name" value="' . $event_name . '">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label>
                                                                <h1 style="font-size:30px;">Start Date of Event</h1>
                                                            </label><br>
                                                            <input type="date" name="date_start" id="date_start_' . $event_type_id . '" class="w-100 form-control p-3 mb-4 border-primary bg-light" required onchange="validateStartDate(' . $event_type_id . ')">
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label>
                                                                <h1 style="font-size:30px;">End Date of Event</h1>
                                                            </label>
                                                            <input type="date" name="date_end" id="date_end_' . $event_type_id . '" disabled class="w-100 form-control p-3 mb-4 border-primary bg-light" required onchange="validateEndDate(' . $event_type_id . ')">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit" class="btn btn-outline-primary">Check Now</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            }
                        } else {
                            echo 'No events found.';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <?php include 'includes/footer.php'; ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <?php include 'includes/script.php'; ?>
</body>

</html>