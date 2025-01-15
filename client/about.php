<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  header("Location: ../index.php"); // Redirect to login if not logged in
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

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
                  
                    <div class="col-lg-12 col-md-12">
                    <div class="container">
                        <h1>Terms and Conditions of Mobile Event Planner</h1>
                        <p><strong>Effective Date:</strong> 2025-2026</p>
                        <p>Welcome to Mobile Event Planner! These Terms and Conditions govern your use of our web and
                            mobile application services for organizing events, purchasing products and packages, and
                            connecting with other users. By accessing or using our platform, you agree to these Terms.
                            If you do not agree, please refrain from using the platform.</p>

                        <div class="section">
                            <h2>1. Definitions</h2>
                            <ul>
                                <li><strong>Platform</strong>: Refers to the Mobile Event Planner web and mobile
                                    application.</li>
                                <li><strong>Users</strong>: Individuals or entities registered on the platform,
                                    including:
                                    <ul>
                                        <li><strong>Organizers</strong>: Users who plan and manage events.</li>
                                        <li><strong>Suppliers</strong>: Users who offer products or services for events.
                                        </li>
                                        <li><strong>Clients</strong>: Users who attend events or purchase
                                            packages/products.</li>
                                    </ul>
                                </li>
                                <li><strong>Products and Packages</strong>: Items and bundled services listed by
                                    Suppliers for purchase or rental on the platform.</li>
                                <li><strong>Services</strong>: All features provided by the platform, including event
                                    management, purchasing, and communication tools.</li>
                            </ul>
                        </div>

                        <div class="section">
                            <h2>2. User Responsibilities</h2>
                            <ul>
                                <li><strong>Account Registration</strong>: Users must provide accurate and complete
                                    information during registration and are responsible for maintaining the
                                    confidentiality of their login credentials.</li>
                                <li><strong>Eligibility</strong>: Users must be at least 18 years old or have the
                                    consent of a parent or legal guardian to use the platform.</li>
                                <li><strong>Prohibited Activities</strong>: Users agree not to:
                                    <ul>
                                        <li>Misrepresent information.</li>
                                        <li>Engage in fraudulent transactions.</li>
                                        <li>Use the platform for unlawful purposes.</li>
                                        <li>Interfere with the platform’s operation or security.</li>
                                    </ul>
                                </li>
                                <li><strong>Compliance</strong>: Users must comply with all applicable laws and
                                    regulations when using the platform.</li>
                            </ul>
                        </div>

                        <div class="section">
                            <h2>3. Organizer Terms</h2>
                            <ul>
                                <li><strong>Event Creation</strong>: Organizers are responsible for accurately
                                    describing their events, including dates, venues, and requirements.</li>
                                <li><strong>Payment Obligations</strong>: Organizers must honor payment agreements with
                                    Suppliers and ensure timely payments through the platform.</li>
                                <li><strong>Cancellation Policy</strong>: Organizers must specify their cancellation
                                    policies in event details and adhere to them.</li>
                            </ul>
                        </div>

                        <div class="section">
                            <h2>4. Supplier Terms</h2>
                            <ul>
                                <li><strong>Listing Accuracy</strong>: Suppliers must provide complete and truthful
                                    descriptions of products and services.</li>
                                <li><strong>Availability</strong>: Suppliers are responsible for ensuring listed items
                                    are available as described and for delivering them as agreed.</li>
                                <li><strong>Dispute Resolution</strong>: Suppliers agree to cooperate in resolving
                                    disputes with Organizers or Clients in good faith.</li>
                            </ul>
                        </div>

                        <div class="section">
                            <h2>5. Client Terms</h2>
                            <ul>
                                <li><strong>Purchases</strong>: Clients are responsible for verifying product and
                                    package details before purchasing.</li>
                                <li><strong>Event Attendance</strong>: Clients must follow event guidelines and respect
                                    Organizer instructions.</li>
                                <li><strong>Refunds</strong>: Refunds are subject to the Supplier’s policies and must be
                                    requested through the platform.</li>
                            </ul>
                        </div>

                        <div class="section">
                            <h2>6. Payments and Fees</h2>
                            <ul>
                                <li><strong>Payment Processing</strong>: All transactions are processed through secure
                                    third-party payment gateways. The platform does not store payment details.</li>
                                <li><strong>Service Fees</strong>: The platform may charge service fees for
                                    transactions, which will be disclosed before payment.</li>
                                <li><strong>Tax Obligations</strong>: Users are responsible for any applicable taxes
                                    related to their use of the platform.</li>
                            </ul>
                        </div>

                        <div class="section">
                            <h2>7. Disputes and Liability</h2>
                            <ul>
                                <li><strong>Disputes</strong>: Users are encouraged to resolve disputes amicably through
                                    the platform’s resolution tools.</li>
                                <li><strong>Liability</strong>: The platform is not liable for:
                                    <ul>
                                        <li>Errors in event planning or product descriptions.</li>
                                        <li>Losses resulting from misuse of the platform.</li>
                                    </ul>
                                </li>
                                <li><strong>Indemnification</strong>: Users agree to indemnify the platform against
                                    claims arising from their actions.</li>
                            </ul>
                        </div>

                        <div class="section">
                            <h2>8. Privacy Policy</h2>
                            <ul>
                                <li><strong>Data Collection</strong>: The platform collects and processes personal data
                                    in accordance with our Privacy Policy.</li>
                                <li><strong>Consent</strong>: By using the platform, Users consent to data collection
                                    and usage as described.</li>
                            </ul>
                        </div>

                        <div class="section">
                            <h2>9. Termination</h2>
                            <ul>
                                <li><strong>By User</strong>: Users may terminate their accounts at any time by
                                    contacting support.</li>
                                <li><strong>By Platform</strong>: The platform may suspend or terminate accounts for
                                    violations of these Terms.</li>
                            </ul>
                        </div>

                        <div class="section">
                            <h2>10. Amendments</h2>
                            <ul>
                                <li><strong>Updates</strong>: The platform reserves the right to update these Terms.
                                    Users will be notified of significant changes.</li>
                            </ul>
                        </div>

                        <div class="section">
                            <h2>11. Governing Law</h2>
                            <p><strong>Jurisdiction</strong>: These Terms are governed by the laws of  the Republic of the Philippines..</p>
                        </div>

                        <div class="section">
                            <h2>12. Contact Us</h2>
                            <p>If you have questions about these Terms, please contact us at mobile number 09606657499.</p>
                        </div>

                        <p>By using Mobile Event Planner, you acknowledge that you have read, understood, and agreed to
                            these Terms and Conditions.</p>
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