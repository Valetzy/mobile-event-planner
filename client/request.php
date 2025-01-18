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
<html lang="en" style=" background-color: #14213d;">

<?php include 'includes/head.php'; ?>

<body style=" background-color: #14213d;">

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <?php include 'includes/topbar.php'; ?>


    <div class="container" style=" background-color: #14213d; ">
        <div class="row g-0">
            <div class="col-1">
                <div class="img-fluid h-100 w-100 rounded-start"
                    style="object-fit: cover; opacity: 0.7; background-color: #d4a762; "> </div>
            </div>
            <div class="col-10">
                <div class="border-bottom border-top border-primary bg-light py-5 px-4">
                    <div class="text-center">
                        <h1 class="display-5 mb-5">Requested Events</h1>
                    </div>

                    <?php

                    $user_id = $_SESSION['id'];
                    // Query to combine data from all forms
                    $query = "
                            SELECT 
                                et.event_name, u.full_name, crf.status, crf.id, et.event_type_id, crf.date_created 
                            FROM client_request_form AS crf
                            LEFT JOIN birthday_client_form AS bcf ON crf.client_form_id = bcf.id
                            LEFT JOIN wedding_form AS wf ON crf.client_form_id = wf.id
                            LEFT JOIN christening_form AS cf ON crf.client_form_id = cf.id
                            INNER JOIN event_types AS et ON crf.event_type = et.event_type_id
                            INNER JOIN users AS u ON crf.organizer_id = u.user_id
                            WHERE (bcf.id IS NOT NULL OR wf.id IS NOT NULL OR cf.id IS NOT NULL)
                            AND crf.status = 'approved' AND crf.client_id = $user_id
                            ORDER BY crf.date_created DESC"; // Sort by date_created in ascending order


                    $result = mysqli_query($conn, $query);

                    if (!$result) {
                        die("Query Failed: " . mysqli_error($conn));
                    }
                    ?>

                    <div class="overflow-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Event Type</th>
                                    <th scope="col">Organizer Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Submitted</th>
                                    <th scope="col">View</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (mysqli_num_rows($result) > 0): ?>
                                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['id']; ?></th>
                                            <td><?php echo htmlspecialchars($row['event_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                                            <td>
                                                <?php
                                                $badge_class = '';

                                                switch ($row['status']) {
                                                    case 'pending':
                                                        $badge_class = 'bg-warning'; // Yellow for Pending
                                                        break;
                                                    case 'cancelled':
                                                        $badge_class = 'bg-danger'; // Red for Cancelled
                                                        break;
                                                    case 'approved':
                                                        $badge_class = 'bg-primary'; // Blue for Approved
                                                        break;
                                                    default:
                                                        $badge_class = 'bg-secondary'; // Grey for unknown statuses
                                                        break;
                                                }

                                                echo '<span class="badge rounded-pill ' . $badge_class . '">' . htmlspecialchars($row['status']) . '</span>';
                                                ?>
                                            </td>
                                            <td><?php echo date('F j, Y | g:i A', strtotime($row['date_created'])); ?></td>
                                            <td>
                                                <a href="form_details.php?id=<?php echo $row['id']; ?>&event_type=<?php echo $row['event_type_id']; ?>"
                                                    class="btn btn-primary btn-sm">View Details</a>
                                            </td>

                                        </tr>

                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No data available</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <div class="col-1">
                <div class="img-fluid h-100 w-100 rounded-end"
                    style="object-fit: cover; opacity: 0.7;  background-color: #d4a762;"></div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <?php include 'includes/script.php'; ?>
</body>

</html>