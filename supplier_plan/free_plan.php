<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Free-Plan Form</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE 4 | Login Page">
    <meta name="author" content="ColorlibHQ">
    <meta name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard">
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css"
        integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
        integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../css/adminlte.css">
    <!--end::Required Plugin(AdminLTE)-->
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .note {
            color: #6728289E;
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .titleform {
            align-items: center;
            display: flex;
            justify-content: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: #0000009e;
        }

        video#bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .card {
            max-width: 50%;
            width: 100%;
        }

        @media (max-width: 768px) {
            .card-container {
                justify-content: center;
            }

            .card {
                margin: 0 auto;
            }
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body>
    <!-- Video Background -->
    <video id="bg-video" autoplay muted loop>
        <source src="bg-video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Your content goes here -->

    <!-- Card Section -->
    <div class="card-container">
        <div class="card">
            <div class="card-body">

                <h1 class="titleform">Avail Free Plan Form</h1>
                <p class="note">Please note that this is for first-time users only. Additional charges will be applied
                    to next month's payment.</p>

                <form action="free_Plan_ctrl.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputValue" name="firstname"
                            placeholder="name@example.com" required>
                        <label for="floatingInputValue">First Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputValue" name="middlename"
                            placeholder="name@example.com" required>
                        <label for="floatingInputValue">Middle Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputValue" name="lastname"
                            placeholder="name@example.com" required>
                        <label for="floatingInputValue">Last Name</label>
                    </div>
                    <?php
                    if (isset($_GET['error']) && $_GET['error'] === 'UserAlreadyExists') {
                        echo "<p style='color: red;'>A user with this email already has an active plan.</p>";
                    }
                    ?>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInputValue" name="email"
                            placeholder="name@example.com" required>
                        <label for="floatingInputValue">Email</label>
                    </div>
                    
                    <div class=" d-flex justify-content-center align-items-center ">
                        <button
                            class="btn btn-primary d-flex justify-content-center align-items-center ">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
    <script src="../js/adminlte.js"></script>
</body>
<!--end::Body-->

</html>