<?php
session_start();

// Destroy the session if the user navigates back to login.php after logging in
if (isset($_SESSION['email'])) {
    session_destroy();
    header("Location: index.php"); // Reload login page to enforce session reset
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Mobile Event Planner</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <style>
    .bg-body-secondary {
      background-image: url('bg.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
    }

    img {
      max-width: 100%;
      height: auto;
      filter: drop-shadow(4px 4px 10px rgba(0, 0, 0, 0.5));
    }

    .form-control {
      font-size: 1rem;
    }

    .btn {
      font-size: 1rem;
    }
  </style>
</head>

<body class="bg-body-secondary">
  <div class="container h-100 d-flex flex-column justify-content-center">
    <div class="row align-items-center">
      <!-- Logo Section -->
      <div class="col-lg-7 col-md-6 text-center mb-4 mb-md-0">
        <img src="images/logo.png" alt="Mobile Event Planner Logo">
      </div>
      <!-- Form Section -->
      <div class="col-lg-5 col-md-6">
        <div class="card shadow">
          <div class="card-header text-center">
            <h1 class="mb-0"><b>Mobile Event Planner</b></h1>
          </div>
          <div class="card-body">
            <p class="text-center">Sign in</p>
            <form action="registration_functions/login.php" method="post">
              <div class="mb-3">
                <div class="form-floating">
                  <input id="loginEmail" name="email" type="text" class="form-control" placeholder="Email" required>
                  <label for="loginEmail">Email</label>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-floating">
                  <input id="loginPassword" name="password" type="password" class="form-control" placeholder="Password" required>
                  <label for="loginPassword">Password</label>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary">Sign In</button>
              </div>
            </form>
            <div class="text-center d-flex justify-content-start align-items-start">
              <p><a href="register.php">Register a new membership</a></p>
            </div>
            <div class="text-center d-flex justify-content-start align-items-start">
            <p><a href="forgot_password.php">I forgot my password</a></p> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
  // Function to handle Remember Me
  document.addEventListener("DOMContentLoaded", function () {
    const emailInput = document.getElementById("loginEmail");
    const rememberMeCheckbox = document.getElementById("rememberMe");

    // Check if there's a saved email in local storage
    const savedEmail = localStorage.getItem("rememberedEmail");
    if (savedEmail) {
      emailInput.value = savedEmail;
      rememberMeCheckbox.checked = true;
    }

    // Save email to local storage when the form is submitted if "Remember Me" is checked
    const form = document.querySelector("form");
    form.addEventListener("submit", function () {
      if (rememberMeCheckbox.checked) {
        localStorage.setItem("rememberedEmail", emailInput.value);
      } else {
        localStorage.removeItem("rememberedEmail");
      }
    });
  });
</script>


</html>
