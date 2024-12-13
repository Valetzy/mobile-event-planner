<?php

function generateAddPackageButton($id, $conn)
{
    // Check if the session variable for supplier_type is set

    // Prepare the SQL query
    $query = "SELECT * FROM supplier WHERE supplier_id = ?";

    // Prepare the statement
    if ($stmt = $conn->prepare($query)) {
        // Bind the parameter
        $stmt->bind_param("i", $id);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if any records were found
        if ($result->num_rows > 0) {
            // Fetch all records
            while ($row = $result->fetch_assoc()) {
                // Output the data (you can modify this part based on your needs)
                $supplierType = $row['supplier_type'];

                // Generate the button based on supplier_type
                switch ($supplierType) {
                    case 'catering':
                        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#package_catering">Add Package</button>';
                        break;

                    case 'dress':
                        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#package_dress">Add Package</button>';
                        break;

                    case 'decor':
                        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#package_decor">Add Package</button>';
                        break;

                    case 'venue':
                        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#package_venue">Add Venue</button>';
                        break;

                    default:
                        // Optional: Handle the case where supplier_type does not match any expected value
                        echo '<p>No package available for this supplier type.</p>';
                        break;
                }

                // Add other fields as necessary
            }
        } else {
            echo "No supplier found with ID: $id";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the statement: " . $conn->error;
    }

}

function generateAdProductButton($id, $conn)
{
    // Check if the session variable for supplier_type is set

    // Prepare the SQL query
    $query = "SELECT * FROM supplier WHERE supplier_id = ?";

    // Prepare the statement
    if ($stmt = $conn->prepare($query)) {
        // Bind the parameter
        $stmt->bind_param("i", $id);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if any records were found
        if ($result->num_rows > 0) {
            // Fetch all records
            while ($row = $result->fetch_assoc()) {
                // Output the data (you can modify this part based on your needs)
                $supplierType = $row['supplier_type'];

                // Generate the button based on supplier_type
                switch ($supplierType) {
                    case 'catering':
                        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#catering">Add Product</button>';
                        break;

                    case 'dress':
                        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dress">Add Product</button>';
                        break;

                    case 'decor':
                        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#decor">Add Product</button>';
                        break;

                    case 'venue':
                        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#venue">Add Venue</button>';
                        break;

                    case 'photo_video':
                        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#photo_video">Add Venue</button>';
                        break;

                    default:
                        // Optional: Handle the case where supplier_type does not match any expected value
                        echo '<p>No package available for this supplier type.</p>';
                        break;
                }

                // Add other fields as necessary
            }
        } else {
            echo "No supplier found with ID: $id";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the statement: " . $conn->error;
    }

}

function displayCardPending($supplier_id, $conn)
{

    // Fetch count of pending requests for the supplier
    $query = "SELECT COUNT(*) as pending_count FROM organizer_request WHERE supplier_id = ? AND status =
    'pending'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $supplier_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $pendingCount = $row['pending_count'] ?? 0;
    ?>

    <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
        <div class="small-box text-bg-primary">
            <div class="inner">
                <h3><?php echo $pendingCount; ?></h3>
                <p>Pending</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true">
                <path
                    d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z">
                </path>
            </svg>
        </div> <!--end::Small Box Widget 1-->
    </div>
    <?php
}