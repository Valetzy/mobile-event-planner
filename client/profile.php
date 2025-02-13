<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php"); // Redirect to login if not logged in
    exit();
}
include '../connection/conn.php';

$user_id = $_SESSION['id'];

// Fetch user data
$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    die("User not found.");
}

?>

<!DOCTYPE html>
<html lang="en" style=" background-color: #14213d;">


<?php include 'includes/head.php'; ?>
<style>
    #profilePic {
        width: 200px;
        height: 200px;
        /* Ensure the height is equal to width */
        border-radius: 50%;
        object-fit: cover;
        /* Ensures the image maintains aspect ratio */
    }
</style>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <?php include 'includes/topbar.php'; ?>

    <!-- Hero Start -->
    <div class="container-fluid bg-light py-6 my-6 mt-0">
        <div class="container">
            <div class="row g-5 align-items-center" style="margin-top: -100px;">
                <form action="edit_profile.php" method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-center align-items-center position-relative mb-5">
                        <img src="<?= !empty($user['profile_pic']) ? htmlspecialchars($user['profile_pic']) : 'img/pfp.png' ?>"
                            alt="profile" width="200px" id="profilePic" class="rounded-circle border shadow">
                        <!-- Pencil Icon Button -->
                        <button type="button"
                            class="btn btn-light position-absolute bottom-0 start-50 translate-middle-x rounded-circle shadow"
                            style="width: 40px; height: 40px; border: 2px solid #ddd; margin-left: 60px; background-color: #d4a762;"
                            onclick="document.getElementById('profileInput').click();">
                            <i class="fas fa-pencil-alt"></i>
                        </button>

                        <input type="file" name="profile_picture" id="profileInput" class="d-none" accept="image/*">
                    </div>

                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <div class="row w-100">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="username" placeholder="root"
                                        value="<?= htmlspecialchars($user['username']) ?>" required>
                                    <label>Username</label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="">
                                    <label>Password</label>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="full_name"
                                        value="<?= htmlspecialchars($user['full_name']) ?>" placeholder="Enter Fullname"
                                        required>
                                    <label>Fullname</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="birthday" id="birthday"
                                        value="<?= htmlspecialchars($user['birthday']) ?>" required>
                                    <label>Birthday</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" name="age" id="age" placeholder="Age"
                                        value="<?= htmlspecialchars($user['age']) ?>" required readonly>
                                    <label>Age</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="gender">
                                        <option selected value="<?= htmlspecialchars($user['gender']) ?>">
                                            <?= htmlspecialchars($user['gender']) ?>
                                        </option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label>Sex</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="civil_status">
                                        <option selected value="<?= htmlspecialchars($user['civil_status']) ?>">
                                            <?= htmlspecialchars($user['civil_status']) ?>
                                        </option>
                                        <option value="married">Married</option>
                                        <option value="single">Single</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="widowed">Widowed</option>
                                    </select>
                                    <label>Civil Status</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="address" placeholder="Address"
                                        value="<?= htmlspecialchars($user['address']) ?>" required>
                                    <label>Address</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="contact" placeholder="Contact"
                                        value="<?= htmlspecialchars($user['contact']) ?>" required>
                                    <label>Contact</label>
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>" >

                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-danger m-3">Cancel</button>
                                <button class="btn btn-info m-3">Edit</button>
                                <button type="submit" class="btn btn-primary m-3">Save</button>
                            </div>
                        </div>
                    </div>
                </form>

                <script>
                    document.getElementById('profileInput').addEventListener('change', function (event) {
                        const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                document.getElementById('profilePic').src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                </script>
                <script>
                    document.getElementById('birthday').addEventListener('change', function () {
                        const birthDate = new Date(this.value);
                        const today = new Date();
                        let age = today.getFullYear() - birthDate.getFullYear();
                        const monthDiff = today.getMonth() - birthDate.getMonth();

                        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                            age--;
                        }

                        document.getElementById('age').value = age;
                    });
                </script>

                <!-- FontAwesome for the Pencil Icon -->
                <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



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