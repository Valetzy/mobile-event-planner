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
                                wf.package_id, wf.event_id, wf.primary_contact_person, wf.contact_person, 
                                wf.email, wf.address, wf.bride_name, wf.brides_mother_name, 
                                wf.brides_father_name, wf.groom_name, wf.groom_mother_name, 
                                wf.groom_father_name, wf.wedding_date, wf.ceremony_start, 
                                wf.reception_start, wf.ceremony_name, wf.ceremony_location, 
                                wf.reception_name, wf.reception_location, wf.maid_honor_name, 
                                wf.best_man_name, wf.brides_maid_1, wf.brides_maid_2, 
                                wf.brides_maid_3, wf.brides_maid_4, wf.brides_maid_5, 
                                wf.brides_maid_6, wf.brides_maid_7, wf.brides_maid_8, 
                                wf.grooms_men_1, wf.grooms_men_2, wf.grooms_men_3, 
                                wf.grooms_men_4, wf.grooms_men_5, wf.grooms_men_6, 
                                wf.grooms_men_7, wf.grooms_men_8, wf.caterer, 
                                wf.caterer_contact, wf.photo_video, wf.photo_video_contact,
                                crf.client_form_id, crf.client_id, crf.organizer_id, 
                                crf.event_type, crf.status, crf.date_start, crf.date_end
                            FROM client_request_form AS crf
                            LEFT JOIN birthday_client_form AS bcf ON crf.client_form_id = bcf.id
                            LEFT JOIN wedding_form AS wf ON crf.client_form_id = wf.id
                            LEFT JOIN christening_form AS cf ON crf.client_form_id = cf.id
                            INNER JOIN event_types AS et ON crf.event_type = et.event_type_id
                            INNER JOIN users AS u ON crf.organizer_id = u.user_id
                            WHERE crf.id = '$id' 
                            AND (bcf.id IS NOT NULL OR wf.id IS NOT NULL OR cf.id IS NOT NULL);
                            
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



                        <form action="functions/wedding_form.php" method="post" enctype="multipart/form-data">
                            <div class="row g-4 form">

                                <p style="font-size: 1.5rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                                    Client Information: </p>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="primary_contact_person"
                                            value="<?php echo $_SESSION['name'] ?>" placeholder="name@example.com" required>
                                        <label for="floatingInput">Primary Contact Person</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput" name="contact_person"
                                            value="<?php echo $_SESSION['contact'] ?>" placeholder="name@example.com" required>
                                        <label for="floatingInput">Contact Number</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" name="email"
                                            value="<?php echo $_SESSION['email'] ?>" placeholder="name@example.com" required>
                                        <label for="floatingInput">Email Address</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="address"
                                            value="<?php echo $_SESSION['address'] ?>" placeholder="name@example.com" required>
                                        <label for="floatingInput">Address</label>
                                    </div>
                                </div>

                                <p style="font-size: 1rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                                    Brides Information </p>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="bride_name"
                                            value="<?php echo htmlspecialchars($row['bride_name']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Name of Bride</label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="brides_mother_name"
                                            value="<?php echo htmlspecialchars($row['brides_mother_name']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Bride's Mother Name</label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="brides_father_name"
                                            value="<?php echo htmlspecialchars($row['brides_father_name']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Bride's Father Name</label>
                                    </div>
                                </div>

                                <p style="font-size: 1rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                                    Groom's Information </p>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="groom_name"
                                            value="<?php echo htmlspecialchars($row['groom_name']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Name of Groom</label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="groom_mother_name"
                                            value="<?php echo htmlspecialchars($row['groom_mother_name']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Groom's Mother Name</label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="groom_father_name"
                                            value="<?php echo htmlspecialchars($row['groom_father_name']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Groom's Father Name</label>
                                    </div>
                                </div>


                                <p style="font-size: 1.5rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                                    Wedding Party Information: </p>

                                <p style="font-size: 1rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                                    Maid of Honor / Best Man </p>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="maid_honor_name"
                                            value="<?php echo htmlspecialchars($row['maid_honor_name']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Maid of Honor Name:</label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="best_man_name"
                                            value="<?php echo htmlspecialchars($row['best_man_name']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Best Man Name:</label>
                                    </div>
                                </div>

                                <p style="font-size: 1rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                                    Brides Maid </p>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="brides_maid_1"
                                            value="<?php echo htmlspecialchars($row['brides_maid_1']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput"> Brides Maid 1</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="brides_maid_2"
                                            value="<?php echo htmlspecialchars($row['brides_maid_2']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput"> Brides Maid 2</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="brides_maid_3"
                                            value="<?php echo htmlspecialchars($row['brides_maid_3']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput"> Brides Maid 3</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="brides_maid_4"
                                            value="<?php echo htmlspecialchars($row['brides_maid_4']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput"> Brides Maid 4</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="brides_maid_5"
                                            value="<?php echo htmlspecialchars($row['brides_maid_5']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput"> Brides Maid 5</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="brides_maid_6"
                                            value="<?php echo htmlspecialchars($row['brides_maid_6']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput"> Brides Maid 6</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="brides_maid_7"
                                            value="<?php echo htmlspecialchars($row['brides_maid_7']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput"> Brides Maid 7</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="brides_maid_8"
                                            value="<?php echo htmlspecialchars($row['brides_maid_8']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput"> Brides Maid 8</label>
                                    </div>
                                </div>

                                <p style="font-size: 1rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                                    Grooms Men </p>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="grooms_men_1"
                                            value="<?php echo htmlspecialchars($row['grooms_men_1']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Grooms Men 1</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="grooms_men_2"
                                            value="<?php echo htmlspecialchars($row['grooms_men_2']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Grooms Men 2</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="grooms_men_3"
                                            value="<?php echo htmlspecialchars($row['grooms_men_3']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Grooms Men 3</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="grooms_men_4"
                                            value="<?php echo htmlspecialchars($row['grooms_men_4']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Grooms Men 4</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="grooms_men_5"
                                            value="<?php echo htmlspecialchars($row['grooms_men_5']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Grooms Men 5</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="grooms_men_6"
                                            value="<?php echo htmlspecialchars($row['grooms_men_6']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Grooms Men 6</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="grooms_men_7"
                                            value="<?php echo htmlspecialchars($row['grooms_men_7']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Grooms Men 7</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="grooms_men_8"
                                            value="<?php echo htmlspecialchars($row['grooms_men_8']); ?>"
                                            placeholder="name@example.com" required>
                                        <label for="floatingInput">Grooms Men 8</label>
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
                    LEFT JOIN event_types AS ot ON ot.event_type_id = e.event_type
                    LEFT JOIN supplier AS s ON s.supplier_id = e.supplier_venue
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
                    LEFT JOIN event_types AS et ON et.event_type_id = cce.event_type
                    LEFT JOIN supplier AS s ON s.supplier_id = cce.supplier_venue
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

<?php endwhile; ?>
                <?php else: ?>

                    <h1 class="display-5 mb-5">No data available</h1>

                <?php endif; ?>
    </div>
</div>