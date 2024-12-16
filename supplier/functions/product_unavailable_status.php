<?php
// Include database connection file
include '../../connection/conn.php'; // Ensure this file sets up the $conn variable for database connection

// Get the decor_id from the request (e.g., from a GET or POST request)
if (isset($_GET['id'])) {
    $decor_id = $_GET['id']; // Or use $_POST['decor_id'] if sent via POST

    // Prepare the SQL query to update the status
    $sql = "UPDATE products SET status = 'Unavailable' WHERE product_id = ?";

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $decor_id);

    if ($stmt->execute()) {
        // If successful, display an alert and navigate back
        echo "<script>
                window.location.href = document.referrer; // Navigate to the previous page
              </script>";
    } else {
        // If there's an error, display an alert with the error
        echo "<script>
                alert('Error updating status: " . htmlspecialchars($stmt->error) . "');
                window.location.href = document.referrer; // Navigate to the previous page
              </script>";
    }

    $stmt->close();
} else {
    // If decor_id is not provided, show an alert and go back
    echo "<script>
            alert('No decor ID provided.');
            window.location.href = document.referrer; // Navigate to the previous page
          </script>";
}

// Close the database connection
$conn->close();
?>