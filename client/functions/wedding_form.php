<?php
// Start the session to access session variables
session_start();

// Include the database connection
include '../../connection/conn.php'; // Replace with the correct path to your database connection file

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form inputs
    $inputs = [
        'primary_contact_person', 'contact_person', 'email', 'address', 'bride_name', 
        'brides_mother_name', 'brides_father_name', 'groom_name', 'groom_mother_name', 
        'groom_father_name', 'maid_honor_name', 'best_man_name', 'brides_maid_1', 'brides_maid_2', 
        'brides_maid_3', 'brides_maid_4', 'brides_maid_5', 'brides_maid_6', 
        'brides_maid_7', 'brides_maid_8', 'grooms_men_1', 'grooms_men_2', 
        'grooms_men_3', 'grooms_men_4', 'grooms_men_5', 'grooms_men_6', 'grooms_men_7', 'grooms_men_8',
        'event_id', 'event_type', 'organizer_id', 'date_start', 'date_end', 'client_id'
    ];

    $data = [];
    foreach ($inputs as $input) {
        $data[$input] = isset($_POST[$input]) ? mysqli_real_escape_string($conn, $_POST[$input]) : null;
    }

    // SQL query to insert form data into the wedding_form table
    $sql = "INSERT INTO wedding_form (
                primary_contact_person, contact_person, email, address, bride_name, 
                brides_mother_name, brides_father_name, groom_name, groom_mother_name, 
                groom_father_name, maid_honor_name, best_man_name, brides_maid_1, brides_maid_2, 
                brides_maid_3, brides_maid_4, brides_maid_5, brides_maid_6, 
                brides_maid_7, brides_maid_8, grooms_men_1, grooms_men_2, 
                grooms_men_3, grooms_men_4, grooms_men_5, grooms_men_6, grooms_men_7, grooms_men_8, 
                event_id, event_type, organizer_id
            ) VALUES (
                '{$data['primary_contact_person']}', '{$data['contact_person']}', '{$data['email']}', '{$data['address']}', '{$data['bride_name']}', 
                '{$data['brides_mother_name']}', '{$data['brides_father_name']}', '{$data['groom_name']}', '{$data['groom_mother_name']}', 
                '{$data['groom_father_name']}', '{$data['maid_honor_name']}', '{$data['best_man_name']}', '{$data['brides_maid_1']}', '{$data['brides_maid_2']}', 
                '{$data['brides_maid_3']}', '{$data['brides_maid_4']}', '{$data['brides_maid_5']}', '{$data['brides_maid_6']}', 
                '{$data['brides_maid_7']}', '{$data['brides_maid_8']}', '{$data['grooms_men_1']}', '{$data['grooms_men_2']}', 
                '{$data['grooms_men_3']}', '{$data['grooms_men_4']}', '{$data['grooms_men_5']}', '{$data['grooms_men_6']}', '{$data['grooms_men_7']}', '{$data['grooms_men_8']}', 
                '{$data['event_id']}', '{$data['event_type']}', '{$data['organizer_id']}'
            )";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Get the ID of the last inserted wedding form
        $last_inserted_id = mysqli_insert_id($conn);

        // Now insert the ID, date_start, and date_end into the client_request_form table
        $client_request_sql = "INSERT INTO client_request_form (client_form_id, date_start, date_end, client_id, organizer_id, event_type) 
                               VALUES ('$last_inserted_id', '{$data['date_start']}', '{$data['date_end']}', '{$data['client_id']}', '{$data['organizer_id']}' , '{$data['event_type']}')";

        if (mysqli_query($conn, $client_request_sql)) {
            // Redirect to a success page or display a success message
            echo "<script>
                    alert('Wedding details and client request submitted successfully!');
                    window.location.href = '../request_pending.php'; // Replace with your success page
                  </script>";
        } else {
            // Handle failure to insert into client_request_form
            echo "<script>
                    alert('Error inserting into client_request_form: " . mysqli_error($conn) . "');
                    window.history.back(); // Redirect back to the form
                  </script>";
        }

    } else {
        // Handle query failure for the wedding_form insertion
        echo "<script>
                alert('Error submitting form: " . mysqli_error($conn) . "');
                window.history.back(); // Redirect back to the form
              </script>";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Redirect if accessed without submitting the form
    header('Location: ../form_page.php'); // Replace with the form page URL
    exit();
}
?>
