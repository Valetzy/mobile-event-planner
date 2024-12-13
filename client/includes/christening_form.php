<!-- christening -->

<div class="container">
    <div class="row g-0">
        <div class="col-1">
            <div class="img-fluid h-100 w-100 rounded-start"
                style="object-fit: cover; opacity: 0.7; background-color: #d4a762; "> </div>
        </div>
        <div class="col-10">
            <div class="border-bottom border-top border-primary bg-light py-5 px-4">
                <div class="text-center">
                    <h1 class="display-5 mb-5">Christening Client Information Form</h1>
                </div>
                <form action="functions/christening_form.php" method="post" enctype="multipart/form-data">
                    <div class="row g-4 form">

                        <p style="font-size: 1.5rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                            Client Information: </p>

                        <div class="col-lg-8 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="full_name" value="<?php echo $_SESSION['name'] ?>"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Full Name of Contact Person</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="relationship" 
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Relationship to the Celebrant </label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3"> 
                                <input type="number" class="form-control" id="floatingInput" name="contact_number" value="<?php echo $_SESSION['contact'] ?>"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Contact Number</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email" value="<?php echo $_SESSION['email'] ?>"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Email </label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="address" value="<?php echo $_SESSION['address'] ?>"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Address </label>
                            </div>
                        </div>

                        <p style="font-size: 1.5rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                            Baby's Information: </p>

                        <div class="col-lg-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="baby_name"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Full Name of the Baby </label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="floatingInput" name="dob"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Date of Birth </label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-control" id="floatingGender" name="gender" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <label for="floatingGender">Gender</label>
                            </div>
                        </div>

                        <p style="font-size: 1.5rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                            Event Details: </p>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="floatingInput" name="baptism_date"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Date of Baptism </label>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" id="floatingInput" name="baptism_time"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Time of Baptism Ceremony</label>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="floatingInput" name="reception_date"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Date of Reception:</label>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" id="floatingInput" name="reception_time"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Time of Reception </label>
                            </div> 
                        </div>

                        <input type="hidden" name="event_id" value="<?php echo $_GET['event_id'] ?>">
                        <input type="hidden" name="event_type" value="<?php echo $_GET['event_type'] ?>">
                        <input type="hidden" name="organizer_id" value="<?php echo $_GET['organizer_id'] ?>">
                        <input type="hidden" name="date_start" value="<?php echo $_GET['date_start'] ?>">
                        <input type="hidden" name="date_end" value="<?php echo $_GET['date_end'] ?>">
                        <input type="hidden" name="client_id" value="<?php echo $_SESSION['id'] ?>">

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill"
                                fdprocessedid="o2nolj">Submit Now</button>
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


<!-- end of christening -->