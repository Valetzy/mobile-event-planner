<div class="container">
    
    <div class="row g-0">


        <div class="col-12">
            <div class="border-bottom border-top border-primary bg-light py-5 px-4">


                <?php
                // Validate and sanitize GET parameter
                $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';

                // Query to combine data from all forms
                $query = "
                        SELECT 
                                bcf.package_id, bcf.event_id, bcf.contact_name, bcf.relationship, bcf.contact_number, bcf.email, bcf.address, bcf.celebrant_name,
                                bcf.dob, bcf.age, bcf.gender, bcf.party_date, bcf.start_time, bcf.end_time, bcf.venue, bcf.venue_location,
                                crf.client_form_id, crf.client_id, crf.organizer_id, crf.event_type, crf.status, crf.date_start, crf.date_end
                        FROM client_request_form AS crf
                        LEFT JOIN birthday_client_form AS bcf ON crf.client_form_id = bcf.id
                        LEFT JOIN wedding_form AS wf ON crf.client_form_id = wf.id
                        LEFT JOIN christening_form AS cf ON crf.client_form_id = cf.id
                        INNER JOIN event_types AS et ON crf.event_type = et.event_type_id
                        INNER JOIN users AS u ON crf.organizer_id = u.user_id
                        WHERE crf.id = '$id'
                        AND (bcf.id IS NOT NULL OR wf.id IS NOT NULL OR cf.id IS NOT NULL)
                    ";

                $result = mysqli_query($conn, $query);

                if (!$result) {
                    echo "<div class='alert alert-danger'>Query Failed: " . htmlspecialchars(mysqli_error($conn)) . "</div>";
                }
                ?>

                <?php if ($result && mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>

                        <div class="text-center">
                            <?php
                            $event_id = htmlspecialchars($row['event_id']);
                            $package_id = htmlspecialchars($row['package_id']);

                            // Query to select the event
                            $query_ev = "SELECT * FROM events WHERE event_id = $package_id";

                            // Execute the query
                            $result_ev = mysqli_query($conn, $query_ev);

                            // Check if the query was successful
                            if ($result_ev && mysqli_num_rows($result_ev) > 0) {
                                while ($row_ev = mysqli_fetch_assoc($result_ev)) {
                                    echo '<h1 class="display-5 mb-5">' . htmlspecialchars($row_ev['event_package_name']) . '</h1>';
                                }
                            } else {
                                echo '<h1 class="display-5 mb-5">Costumize Package Event</h1>';
                            }
                            ?>
                        </div>



                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="row g-4 form">
                                <p style="font-size: 1.5rem; font-weight: bold; font-family: italic; margin-bottom: -10px;">
                                    Client Information:
                                </p>



                                <div class="col-lg-8 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="contact_name" name="contact_name" disabled
                                            value="<?php echo htmlspecialchars($row['contact_name']); ?>"
                                            placeholder="Full Name" required>
                                        <label for="contact_name">Full Name of Contact Person</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="relationship" name="relationship" disabled
                                            value="<?php echo htmlspecialchars($row['relationship']); ?>"
                                            placeholder="Relationship" required>
                                        <label for="relationship">Relationship</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="contact_number" name="contact_number"
                                            disabled value="<?php echo htmlspecialchars($row['contact_number']); ?>"
                                            placeholder="Contact Number" required>
                                        <label for="contact_number">Contact Number</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                            disabled value="<?php echo htmlspecialchars($row['email']); ?>" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="<?php echo htmlspecialchars($row['address']); ?>" placeholder="Address"
                                            disabled required>
                                        <label for="address">Address</label>
                                    </div>
                                </div>

                                <p style="font-size: 1.5rem; font-weight: bold; font-family: italic; margin-bottom: -10px;">
                                    Celebrant’s Information:
                                </p>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="celebrant_name" name="celebrant_name"
                                            disabled value="<?php echo htmlspecialchars($row['celebrant_name']); ?>"
                                            placeholder="Celebrant Name" required>
                                        <label for="celebrant_name">Full Name of the Celebrant</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth"
                                            disabled value="<?php echo htmlspecialchars($row['dob']); ?>" required>
                                        <label for="dob">Date of Birth</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="age" name="age" placeholder="Age" disabled
                                            value="<?php echo htmlspecialchars(string: $row['age']); ?>" required>
                                        <label for="age">Age</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-control" id="gender" name="gender" required>
                                            <option value="<?php echo htmlspecialchars(string: $row['gender']); ?>" disabled
                                                selected><?php echo htmlspecialchars(string: $row['gender']); ?></option>

                                        </select>
                                        <label for="gender">Gender</label>
                                    </div>
                                </div>

                                <p style="font-size: 1.5rem; font-weight: bold; font-family: italic; margin-bottom: -10px;">
                                    Event Details:
                                </p>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="time" class="form-control" id="start_time" name="start_time" disabled
                                            value="<?php echo htmlspecialchars(string: $row['start_time']); ?>"
                                            placeholder="Start Time" required>
                                        <label for="start_time">Start Time</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="time" class="form-control" id="end_time" name="end_time" disabled
                                            value="<?php echo htmlspecialchars(string: $row['end_time']); ?>"
                                            placeholder="End Time" required>
                                        <label for="end_time">End Time</label>
                                    </div>
                                </div>

                                <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($row['event_id']); ?>">
                                <input type="hidden" name="event_type"
                                    value="<?php echo htmlspecialchars($row['event_type']); ?>">
                                <input type="hidden" name="organizer_id"
                                    value="<?php echo htmlspecialchars($row['organizer_id']); ?>">
                                <input type="hidden" name="date_start"
                                    value="<?php echo htmlspecialchars($row['date_start']); ?>">
                                <input type="hidden" name="date_end" value="<?php echo htmlspecialchars($row['date_end']); ?>">
                                <input type="hidden" name="client_id"
                                    value="<?php echo htmlspecialchars($row['client_id']); ?>">

                            </div>
                        </form>

                    <?php endwhile; ?>
                <?php else: ?>

                    <h1 class="display-5 mb-5">No data available</h1>

                <?php endif; ?>

            </div>
        </div>

        <?php
        if ($package_id > 0) {
            $query_id = $package_id;
            
            ?>
            <div class="col-12">
            <div class="card" style="background-color: #FFFFFFFF;">
                <div class="card-body">
                    <?php
                    $sql = "SELECT ot.event_name, e.supplier_location, s.business_name, e.supplier_venue, e.participants, e.price, e.theme, e.theme_photo, ot.event_name, e.event_package_name, e.event_id 
                    FROM events AS e 
                    INNER JOIN event_types AS ot ON ot.event_type_id = e.event_type
                    INNER JOIN supplier AS s ON s.supplier_id = e.supplier_venue
                    WHERE e.event_id = '$query_id'";

                    $result = mysqli_query($conn, $sql);

                    $disable_button = mysqli_num_rows($result) === 0;

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $participants = $row['participants'];
                            $price = $row['price'];
                            $event_package_name = $row['event_package_name'];
                            $event_id = $row['event_id'];
                            $theme = $row['theme'];
                            $supplier_venue = $row['supplier_venue'];
                            $business_name = $row['business_name'];
                            $supplier_location = $row['supplier_location'];
                            $event_name = $row['event_name'];
                            $theme_photo = $row['theme_photo'];
                            ?>

                            <div class="row g-4 form">


                                <center>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="overflow-hidden rounded" style="height: 300px;">
                                            <img src="../uploads/products/<?= $theme_photo ?>"
                                                class="img-fluid w-100 h-100 object-cover" alt="">
                                        </div>
                                    </div>
                                </center>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="event_package_name"
                                            name="event_package_name" disabled value="<?php echo $event_package_name; ?>"
                                            placeholder="Full Name" required>
                                        <label for="event_package_name">Package Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="event_name" name="event_name" disabled
                                            value="<?php echo $event_name; ?>" placeholder="Full Name" required>
                                        <label for="event_name">Event Type</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="theme" name="theme" disabled
                                            value="<?php echo $theme; ?>" placeholder="Full Name" required>
                                        <label for="theme">Theme</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="participants" name="participants" disabled
                                            value="<?php echo $participants; ?>" placeholder="Full Name" required>
                                        <label for="participants">Participants</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="price" name="price" disabled
                                            value="<?php echo $price; ?>" placeholder="Full Name" required>
                                        <label for="price">Price</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="event_name" name="event_name" disabled
                                            value="<?php echo $event_name; ?>" placeholder="Full Name" required>
                                        <label for="event_name">Event Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="supplier_location" name="supplier_location"
                                            disabled value="<?php echo $supplier_location; ?>" placeholder="Full Name" required>
                                        <label for="supplier_location">Location</label>
                                    </div>
                                </div>


                            </div>


                            <?php

                        }
                    } else {
                        echo 'No events found.';
                    }
                    ?>
                </div>
            </div>
        </div>

            <?php 
        } else {
            $query_id = $event_id;

            ?>
            <div class="col-12">
            <div class="card" style="background-color: #FFFFFFFF;">
                <div class="card-body">
                    <?php
                    $sql = "SELECT cce.participants, cce.budget, cce.event_package_name, cce.theme, cce.supplier_venue, cce.reference_photo, cce.supplier_location, s.business_name, et.event_name
                    FROM client_customized_event AS cce
                    INNER JOIN event_types AS et ON et.event_type_id = cce.event_type
                    INNER JOIN supplier AS s ON s.supplier_id = cce.supplier_venue
                    WHERE cce.id = '$query_id'";

                    $result = mysqli_query($conn, $sql);

                    $disable_button = mysqli_num_rows($result) === 0;

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $participants = $row['participants'];
                            $price = $row['budget'];
                            $event_package_name = $row['event_package_name'];
                            $theme = $row['theme'];
                            $supplier_venue = $row['supplier_venue'];
                            $business_name = $row['business_name'];
                            $supplier_location = $row['supplier_location'];
                            $theme_photo = $row['reference_photo'];
                            $event_name = $row['event_name'];
                            ?>

                            <div class="row g-4 form">


                                <center>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="overflow-hidden rounded" style="height: 300px;">
                                            <img src="../uploads/client/<?php echo $theme_photo; ?>"
                                                class="img-fluid w-100 h-100 object-cover" alt="">
                                        </div>
                                    </div>
                                </center>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="event_package_name"
                                            name="event_package_name" disabled value="<?php echo $event_package_name; ?>"
                                            placeholder="Full Name" required>
                                        <label for="event_package_name">Package Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="event_name" name="event_name" disabled
                                            value="<?php echo $event_name; ?>" placeholder="Full Name" required>
                                        <label for="event_name">Event Type</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="theme" name="theme" disabled
                                            value="<?php echo $theme; ?>" placeholder="Full Name" required>
                                        <label for="theme">Theme</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="participants" name="participants" disabled
                                            value="<?php echo $participants; ?>" placeholder="Full Name" required>
                                        <label for="participants">Participants</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="price" name="price" disabled
                                            value="<?php echo $price; ?>" placeholder="Full Name" required>
                                        <label for="price">Price</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="event_name" name="event_name" disabled
                                            value="<?php echo $business_name; ?>" placeholder="Full Name" required>
                                        <label for="event_name">Event Venue</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="supplier_location" name="supplier_location"
                                            disabled value="<?php echo $supplier_location; ?>" placeholder="Full Name" required>
                                        <label for="supplier_location">Location</label>
                                    </div>
                                </div>


                            </div>


                            <?php

                        }
                    } else {
                        echo 'No events found.';
                    }
                    ?>
                </div>
            </div>
        </div>
            <?php
        }
        ?>

        


    </div>
</div>