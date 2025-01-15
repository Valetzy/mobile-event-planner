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
<html lang="en">

<?php include 'includes/head.php'; ?>
<style>
    /* Basic styling for the photo gallery */
    .photo-gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        height: 500px;
        overflow-y: scroll;
        /* Adds horizontal scrolling */
        max-width: 100%;
        padding: 10px;
    }

    .photo-item {
        flex: 0 0 auto;
        width: 200px;
        height: 150px;
        border: 2px solid #ccc;
        overflow: hidden;
    }

    .photo-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<body>


    <?php include 'includes/topbar.php'; ?>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Team Start -->
    <div class="container-fluid team py-6">
        <div class="container">
            <div style="margin-top: -80px; margin-bottom: 20px;">
                <a href="javascript:history.back()">
                    <img src="back.png" alt="Back Button" width="30px" height="30px">
                </a>
            </div>

            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <h1 class="display-5 mb-5">Event Organizer</h1>
            </div>
            <div class="row g-4">

                <?php
                // Get the date range from the query parameters
                $date_start = $_GET['date_start'];
                $date_end = $_GET['date_end'];

                // Query to get organizers excluding those with approved overlapping events
                $sql = "
                SELECT * 
                FROM users 
                WHERE user_type = 'organizer'
                AND user_id NOT IN (
                    SELECT organizer_id 
                    FROM client_request_form 
                    WHERE status = 'approved' 
                    AND (
                        (date_start <= '$date_end' AND date_end >= '$date_start')
                    )
                )";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // Loop through the results and generate the HTML for each organizer
                    while ($row = mysqli_fetch_assoc($result)) {

                        $eventtype_id = $_GET['eventtype_id'];
                        $event_name = $_GET['event_name'];

                        $user_id = $row['user_id'];
                        $full_name = $row['full_name'];
                        $email = $row['email'];
                        $contact = $row['contact'];
                        $profile_pic = $row['profile_pic'];
                        $valid_id = $row['valid_id'];
                        $address = $row['address'];
                        $birthday = $row['birthday'];
                        $age = $row['age'];
                        $facebook = $row['facebook'];
                        $modal_id = "exampleModal" . $row['user_id'];
                        ?>

                        <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.1s">
                            <div class="team-item rounded" data-bs-toggle="modal" data-bs-target="#<?= $modal_id ?>">
                                <img src="<?= $profile_pic ?>" class="img-fluid" alt="" style="height: 300px; width: 600px;">
                                <div class="team-content text-center py-3 bg-dark rounded-bottom">
                                    <h1 style="font-size:15px;" class="text-white"><?= $full_name ?></h1>
                                    <p class="text-white mb-0">Email : <?= $email ?></p>
                                    <p class="text-white mb-0">Contact : <?= $contact ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="<?= $modal_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="exampleModalLabel" style="font-size:30px;">Organizer
                                            Information</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="get" action="organizer_event_packages.php">
                                            <input type="hidden" name="eventtype_id" value="<?= $eventtype_id ?>">
                                            <input type="hidden" name="date_start" value="<?= $date_start ?>">
                                            <input type="hidden" name="date_end" value="<?= $date_end ?>">
                                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                            <input type="hidden" name="event_name" value="<?= $event_name ?>">

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <center>
                                                                <label>
                                                                    <h1 style="font-size:20px;">Profile</h1>
                                                                </label>
                                                                <br>
                                                                <img src="<?= $profile_pic ?>" class="img-fluid" alt=""
                                                                    style="width: 300px; height: 300px; border-radius: 50%;">
                                                            </center>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <center>
                                                                <label>
                                                                    <h1 style="font-size:20px;">Valid ID</h1>
                                                                </label>
                                                                <br>
                                                                <img src="<?= $valid_id ?>" class="img-fluid" alt=""
                                                                    style="width: 300px; height: 300px; border-radius: 50%;">
                                                            </center>
                                                        </div>

                                                        <center>
                                                            <br><br>
                                                            <label>
                                                                <h1 style="font-size:25px;">Full Name: <?= $full_name ?></h1>
                                                            </label><br>
                                                            <label>
                                                                <h1 style="font-size:25px;">Address: <?= $address ?></h1>
                                                            </label><br>
                                                            <label>
                                                                <h1 style="font-size:25px;">Birth Date: <?= $birthday ?></h1>
                                                            </label><br>
                                                            <label>
                                                                <h1 style="font-size:25px;">Age: <?= $age ?></h1>
                                                            </label><br>
                                                            <label>
                                                                <h1 style="font-size:25px;">Email: <?= $email ?></h1>
                                                            </label><br>
                                                            <label>
                                                                <h1 style="font-size:25px;">Contact Number: <?= $contact ?></h1>
                                                            </label><br>
                                                            <label>
                                                                <h1 style="font-size:25px;">Facebook: <a href="<?= $facebook ?>" target="_blank" rel="noopener noreferrer"><?= $facebook ?></a> </h1>
                                                            </label><br><br>
                                                        </center>
                                                        <br><br>
                                                        <hr>
                                                        <center>
                                                            <?php

                                                            // Fetch data from events_photos and organizer_done_event tables
                                                            $query_pic = "
                                                                        SELECT events_photos.file_path 
                                                                        FROM events_photos
                                                                        INNER JOIN client_request_form
                                                                        ON events_photos.event_id = client_request_form.id 
                                                                        WHERE client_request_form.organizer_id = $user_id
                                                                    ";

                                                            // Execute the query
                                                            $result_pic = mysqli_query($conn, $query_pic);

                                                            // Check if query was successful
                                                            if (mysqli_num_rows($result_pic) > 0) {
                                                                echo '<h2>Event Done Handle</h2>';
                                                                echo '<div class="photo-gallery">';

                                                                // Display all fetched images
                                                                while ($row_pic = mysqli_fetch_assoc($result_pic)) {
                                                                    echo '<div class="photo-item">';
                                                                    echo '<img src="../organizer/functions/' . $row_pic['file_path'] . '" alt="Event Photo">';
                                                                    echo '</div>';
                                                                }

                                                                echo '</div>';
                                                            } else {
                                                                echo 'No photos available for this event.';
                                                            }
                                                            ?>

                                                        </center>
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="submit"
                                                    class="btn btn-outline-primary">Continue</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                } else {
                    echo '<p class="text-center">No organizers available for the selected date range.</p>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <?php include 'includes/footer.php'; ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <script>
        // Smooth scrolling for the photo gallery (optional)
        document.querySelector('.photo-gallery').addEventListener('wheel', function (event) {
            if (event.deltaY > 0) {
                this.scrollBy(300, 0); // Scroll right
            } else {
                this.scrollBy(-300, 0); // Scroll left
            }
        });
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>