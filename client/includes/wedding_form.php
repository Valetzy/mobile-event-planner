<!-- wedding form -->

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
                    <h1 class="display-5 mb-5">Wedding Event Client Information Form</h1>
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
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Name of Bride</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="brides_mother_name"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Bride's Mother Name</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="brides_father_name"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Bride's Father Name</label>
                            </div>
                        </div>

                        <p style="font-size: 1rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                            Groom's Information </p>

                        <div class="col-lg-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="groom_name"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Name of Groom</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="groom_mother_name"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Groom's Mother Name</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="groom_father_name"
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
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Maid of Honor Name:</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="best_man_name"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Best Man Name:</label>
                            </div>
                        </div>

                        <p style="font-size: 1rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                            Brides Maid </p>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="brides_maid_1"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput"> Brides Maid 1</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="brides_maid_2"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput"> Brides Maid 2</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="brides_maid_3"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput"> Brides Maid 3</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="brides_maid_4"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput"> Brides Maid 4</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="brides_maid_5"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput"> Brides Maid 5</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="brides_maid_6"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput"> Brides Maid 6</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="brides_maid_7"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput"> Brides Maid 7</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="brides_maid_8"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput"> Brides Maid 8</label>
                            </div>
                        </div>

                        <p style="font-size: 1rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                            Grooms Men </p>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="grooms_men_1"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Grooms Men 1</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="grooms_men_2"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Grooms Men 2</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="grooms_men_3"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Grooms Men 3</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="grooms_men_4"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Grooms Men 4</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="grooms_men_5"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Grooms Men 5</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="grooms_men_6"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Grooms Men 6</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="grooms_men_7"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Grooms Men 7</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="grooms_men_8"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Grooms Men 8</label>
                            </div>
                        </div>


                        <div class="col-6 text-center">
                            <a href="javascript:history.back()" class="btn btn-secondary py-3 rounded-pill">Cancel</a>
                        </div>
                        <div class="col-6 text-center">
                            <button type="submit" class="btn btn-primary py-3 rounded-pill">Submit Now</button>
                        </div>

                        <input type="hidden" name="event_id" value="<?php echo $_GET['event_id'] ?>">
                        <input type="hidden" name="event_type" value="<?php echo $_GET['event_type'] ?>">
                        <input type="hidden" name="organizer_id" value="<?php echo $_GET['organizer_id'] ?>">
                        <input type="hidden" name="date_start" value="<?php echo $_GET['date_start'] ?>">
                        <input type="hidden" name="date_end" value="<?php echo $_GET['date_end'] ?>">
                        <input type="hidden" name="client_id" value="<?php echo $_SESSION['id'] ?>">
                        <input type="hidden" name="package_id" value="<?php echo $_GET['package_id']; ?>">
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


<!-- end of weddinf form -->