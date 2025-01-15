 <!-- Navbar start -->
 <div class="container-fluid nav-bar">
            <div class="container">
                <nav class="navbar navbar-light navbar-expand-lg py-4">
                    <a href="index.php" class="navbar-brand">
                        <img src="img/logo.png" alt="" width="80" height="80"><span class="text-primary">Ipil Event Planner</span>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="about.php" class="nav-item nav-link">About</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Request</a>
                                <div class="dropdown-menu bg-light">
                                    <a href="request.php" class="dropdown-item">Approved</a>
                                    <a href="request_pending.php" class="dropdown-item">Pending</a>
                                    <a href="request_cancelled.php" class="dropdown-item">Cancelled / Denied</a>
                                    <a href="request_done.php" class="dropdown-item">Done</a>
                                    
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo $_SESSION['email'] ?></a>
                                <div class="dropdown-menu bg-light">
                                    <a href="../registration_functions/signout.php" class="dropdown-item">Sign Out</a>
                                    <!-- <a href="team.html" class="dropdown-item">Our Team</a>
                                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                    <a href="404.html" class="dropdown-item">404 Page</a> -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->
