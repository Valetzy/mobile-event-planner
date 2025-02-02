<?php
include "../connection/conn.php";

if (isset($_GET['organizer_id'])) {
    $organizer_id = (int) $_GET['organizer_id'];

    // Fetch events for the selected organizer
    $sql = "SELECT event_id, event_name, event_date FROM organizer_done_event WHERE organizer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $organizer_id);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    die("Organizer ID not provided.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Organizer Done Events</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Done Events</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Event ID</th>
                    <th>Event Name</th>
                    <th>Event Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['event_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['event_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['event_date']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No events found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="javascript:history.back()" class="btn btn-primary">Go Back</a>
    </div>
</body>
</html>
