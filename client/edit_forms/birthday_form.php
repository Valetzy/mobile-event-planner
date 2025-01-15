<div class="container">
    <div style="margin-top: -10px; margin-bottom: 20px;">
        <a href="javascript:history.back()">
            <img src="back.png" alt="Back Button" width="30px" height="30px">
        </a>
    </div>
    <div class="row g-0">
        <div class="col-1">
            <div class="img-fluid h-100 w-100 rounded-start"
                style="object-fit: cover; opacity: 0.7; background-color: #d4a762;"></div>
        </div>
        <div class="col-10">
            <div class="border-bottom border-top border-primary bg-light py-5 px-4">


                <?php
                // Validate and sanitize GET parameter
                $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';

                // Query to combine data from all forms
                $query = "
                        SELECT 
                                bcf.event_id, bcf.contact_name, bcf.relationship, bcf.contact_number, bcf.email, bcf.address, bcf.celebrant_name,
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

                            // Query to select the event
                            $query_ev = "SELECT * FROM events WHERE event_id = $event_id";

                            // Execute the query
                            $result_ev = mysqli_query($conn, $query_ev);

                            // Check if the query was successful
                            if ($result_ev && mysqli_num_rows($result_ev) > 0) {
                                while ($row_ev = mysqli_fetch_assoc($result_ev)) {
                                    echo '<h1 class="display-5 mb-5">' . htmlspecialchars($row_ev['event_package_name']) . '</h1>';
                                }
                            } else {
                                echo '<h1 class="display-5 mb-5">Customized Package Event</h1>';
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
                                        <label for="relationship">Relationship to the Celebrant</label>
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
        <div class="col-1">
            <div class="img-fluid h-100 w-100 rounded-end"
                style="object-fit: cover; opacity: 0.7; background-color: #d4a762;"></div>
        </div>
    </div>
</div>