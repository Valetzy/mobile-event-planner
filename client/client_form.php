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

<body style=" background-color: #14213d;" >

    <!-- Spinner Start -->
    <!-- <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div> -->
    <!-- Spinner End -->


    <?php include 'includes/topbar.php'; ?>

    <?php
    if (isset($_GET['event_type'])) {
        $event_type = $_GET['event_type'];

        if ($event_type == 5) {
            include 'includes/wedding_form.php';
        } elseif ($event_type == 4) {
            include 'includes/christening_form.php';
        } elseif ($event_type == 1) {
            include 'includes/birthday_form.php';
        } else {
            echo "Invalid event type.";
        }
    } else {
        echo "Event type not specified.";
    }
    ?>


    <?php include 'includes/footer.php'; ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <?php include 'includes/script.php'; ?>
</body>

</html>