<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php"); // Redirect to login if not logged in
    exit();
}

include 'functions/function.php'; ?>
<?php include '../connection/conn.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <?php include 'includes/topbar.php'; ?>

    <div class="container">
        <div class="row g-0">
            <div class="col-1">
                <img src="img/background-site.jpg" class="img-fluid h-100 w-100 rounded-start"
                    style="object-fit: cover; opacity: 0.7;" alt="">
            </div>
            <div class="col-10">
                <div class="border-bottom border-top border-primary bg-light py-5 px-4">
                    <div class="text-center">
                        <h1 class="display-5 mb-5">Birthday Party Client Information Form</h1>
                    </div>
                    <form action="">
                        <div class="row g-4 form">

                            <p
                                style="font-size: 1.5rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                                Client Information: </p>

                            <div class="col-lg-8 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" required>
                                    <label for="floatingInput">Full Name of Contact Person</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" required>
                                    <label for="floatingInput">Relationship to the Celebrant </label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" required>
                                    <label for="floatingInput">Contact Number</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" required>
                                    <label for="floatingInput">Email </label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" required>
                                    <label for="floatingInput">Address </label>
                                </div>
                            </div>

                            <p
                                style="font-size: 1.5rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                                Celebrant’s Information: </p>

                            <div class="col-lg-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" required>
                                    <label for="floatingInput">Full Name of the Celebrant </label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" required>
                                    <label for="floatingInput">Date of Birth </label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" required>
                                    <label for="floatingInput">Age </label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="floatingGender" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label for="floatingGender">Gender</label>
                                </div>
                            </div>

                            <p
                                style="font-size: 1.5rem; font-weight: bold; font-family: italic; margin-bottom: -10px; ">
                                Event Details: </p>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" required>
                                    <label for="floatingInput">Date of Party </label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="time" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" required>
                                    <label for="floatingInput">Start Time</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="time" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" required>
                                    <label for="floatingInput">End Time</label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" required>
                                    <label for="floatingInput">Venue/Location of Party </label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" required>
                                    <label for="floatingInput">Number of Guests</label>
                                </div>
                            </div>


                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill"
                                    fdprocessedid="o2nolj">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-1">
                <img src="img/background-site.jpg" class="img-fluid h-100 w-100 rounded-end"
                    style="object-fit: cover; opacity: 0.7;" alt="">
            </div>
        </div>
    </div>


    <?php include 'includes/footer.php'; ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <?php include 'includes/script.php'; ?>
</body>

</html>