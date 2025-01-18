<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  header("Location: ../index.php"); // Redirect to login if not logged in
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" style=" background-color: #14213d;">

<?php include 'includes/head.php'; ?>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <?php include 'includes/topbar.php'; ?>


        <!-- Hero Start -->
        <div class="container-fluid bg-light py-6 my-6 mt-0">
            <div class="container">
                <div class="row g-5 align-items-center" style="margin-top: -100px;">
                  <center>
                    <div class="col-lg-12 col-md-12">
                        <img src="img/logo.png" class="img-fluid rounded animated zoomIn" alt="" width="300px" ><br>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <h1 class="display-1 mb-4 animated bounceInDown">Create Your Dream Event</h1>
                        <!-- <a href="" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated bounceInLeft">Book Now</a> -->
                        <a href="event_types.php" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 animated bounceInLeft">Create Event</a>
                        
                        <!-- <img src="img/hero.png" class="img-fluid rounded animated zoomIn" alt=""> -->
                    </div>
                    </center> 
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Date of Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <label><h1>Start Date of Event</h1> </label><br>
                                        <input type="date" name="email" id="email" class="w-100 form-control p-3 mb-4 border-primary bg-light" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="YYYY-MM-DD"><br>
                                        <label>
                                            <h1>End Date of Event</h1>
                                        </label><br>
                                        <input type="date" name="email" id="email" class="w-100 form-control p-3 mb-4 border-primary bg-light"
                                            placeholder="Enter your Email"><br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="event_organizer.html" type="button" class="btn btn-outline-primary">Check Now</a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->



        <?php include 'includes/footer.php'; ?>


        <!-- Back to Top -->
        <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
<body>   
    
</body>