<!-- birthday form -->
<div class="container">
    <div style="margin-top: -10px; margin-bottom: 20px;">
        <a href="javascript:history.back()">
            <img src="back.png" alt="Back Button" width="30px" height="30px">
        </a>
    </div>
    <div class="row g-0">
        <div class="col-1">
            <div class="img-fluid h-100 w-100 rounded-start"
                style="object-fit: cover; opacity: 0.7; background-color: #d4a762; "> </div>
        </div>

        <div class="col-10">
            <div class="border-bottom border-top border-primary bg-light py-5 px-4">
                <div class="text-center">
                    <h1 class="display-5 mb-5">Birthday Party Client Information Form</h1>
                </div>
                <form action="functions/birthday_form.php" method="post" enctype="multipart/form-data">
                    <div class="row g-4 form">
                        <p style="font-size: 1.5rem; font-weight: bold; font-family: italic; margin-bottom: -10px;">
                            Client Information:
                        </p>

                        <input type="hidden" name="event_id" value="<?php echo $_GET['event_id']; ?>">

                        <div class="col-lg-8 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="contact_name" name="contact_name"
                                    value="<?php echo $_SESSION['name'] ?>" placeholder="Full Name" required>
                                <label for="contact_name">Full Name of Contact Person</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="relationship" name="relationship"
                                    placeholder="Relationship" required>
                                <label for="relationship">Relationship to the Celebrant</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="contact_number" name="contact_number"
                                    value="<?php echo $_SESSION['contact'] ?>" placeholder="Contact Number" required>
                                <label for="contact_number">Contact Number</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    value="<?php echo $_SESSION['email'] ?>" required>
                                <label for="email">Email</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="address" name="address"
                                    value="<?php echo $_SESSION['address'] ?>" placeholder="Address" required>
                                <label for="address">Address</label>
                            </div>
                        </div>

                        <p style="font-size: 1.5rem; font-weight: bold; font-family: italic; margin-bottom: -10px;">
                            Celebrant’s Information:
                        </p>

                        <div class="col-lg-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="celebrant_name" name="celebrant_name"
                                    placeholder="Celebrant Name" required>
                                <label for="celebrant_name">Full Name of the Celebrant</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth"
                                    required>
                                <label for="dob">Date of Birth</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="age" name="age" placeholder="Age"
                                    required>
                                <label for="age">Age</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-control" id="gender" name="gender" required
                                    style="background-color: #14213d;">
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <label for="gender">Gender</label>
                            </div>
                        </div>

                        <p style="font-size: 1.5rem; font-weight: bold; font-family: italic; margin-bottom: -10px;">
                            Event Details:
                        </p>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" id="start_time" name="start_time"
                                    placeholder="Start Time" required>
                                <label for="start_time">Start Time</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" id="end_time" name="end_time"
                                    placeholder="End Time" required>
                                <label for="end_time">End Time</label>
                            </div>
                        </div>



                        <input type="hidden" name="event_id" value="<?php echo $_GET['event_id'] ?>">
                        <input type="hidden" name="event_type" value="<?php echo $_GET['event_type'] ?>">
                        <input type="hidden" name="organizer_id" value="<?php echo $_GET['organizer_id'] ?>">
                        <input type="hidden" name="date_start" value="<?php echo $_GET['date_start'] ?>">
                        <input type="hidden" name="date_end" value="<?php echo $_GET['date_end'] ?>">
                        <input type="hidden" name="client_id" value="<?php echo $_SESSION['id'] ?>">

                        <div class="col-6 text-center">
                            <a href="javascript:history.back()" class="btn btn-secondary py-3 rounded-pill">Cancel</a>
                        </div>
                        <div class="col-6 text-center">
                            <button type="submit" class="btn btn-primary py-3 rounded-pill">Submit Now</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="col-1">
            <div class="img-fluid h-100 w-100 rounded-end"
                style="object-fit: cover; opacity: 0.7;  background-color: #d4a762;"></div>
        </div>
    </div>
</div>

<!-- end of birthday form -->