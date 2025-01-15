<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Mobile Event Planner</title><!--begin::Primary Meta Tags-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="title" content="AdminLTE 4 | Register Page v2">
  <meta name="author" content="ColorlibHQ">
  <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
  <meta name="keywords"
    content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard">
  <!--end::Primary Meta Tags--><!--begin::Fonts-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">
  <!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css"
    integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
    integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
  <!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="css/adminlte.css"><!--end::Required Plugin(AdminLTE)-->
</head> <!--end::Head--> <!--begin::Body-->

<body class="register-page bg-body-secondary">
  <div class="register-box"> <!-- /.register-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header"> <a href="#" style="text-decoration: none;"
          class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
          <h1 style="font-size: xx-large;" class="mb-0"> <b>Mobile Event Planner</b>
          </h1>
        </a> </div>
      <div class="card-body register-card-body">
        <p class="register-box-msg">Register a new membership</p>

        <h1 class="d-flex justify-content-center align align-items-center" >Supplier</h1>

        <form action="registration_functions/register_supplier.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
          <input type="hidden" name="user_type" id="user_type" value="supplier">

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="business_name" name="business_name" type="text" class="form-control" placeholder="" required>
              <label for="business_name">Business Name</label>
            </div>
          </div>

          <div class="input-group mb-1">
            <select class="form-select" name="supplier_types" id="supplier_types" required>
              <option selected disabled value="">Supplier Types</option>
              <option value="catering">Catering</option>
              <option value="dress">Dress</option>
              <option value="decor">Decor</option>
              <option value="venue">Venue</option>
              <option value="photographer_and_videographer">Photographer and Videographer</option>
            </select>
          </div>

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="address" name="address" type="text" class="form-control" placeholder="" required>
              <label for="address">Address</label>
            </div>
          </div>

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="contact" name="contact" type="text" class="form-control" placeholder="" maxlength="11"
                inputmode="numeric" pattern="[0-9]*" required>
              <label for="contact">Contact</label>
            </div>
          </div>

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="email" name="email" type="email" class="form-control" placeholder=""  value="<?= $_GET['email'] ?>"  required>
              <label for="email">Email</label>
            </div>
          </div>

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
              <label for="password">Password</label>
            </div>
          </div>
          <div id="passwordError" class="text-danger invalid-feedback">Minimum passward is 8 maximum is 10 and it has to be alphanumeric.</div>

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="confirmPassword" name="confirm_password" type="password" class="form-control" placeholder="Confirm Password" required>
              <label for="confirmPassword">Confirm Password</label>
            </div>
          </div>
          <div id="confirmPasswordError" class="text-danger invalid-feedback">Passwords do not match.</div>
          

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="business_permit" name="business_permit" type="file" class="form-control" placeholder=""
                required>
              <label for="business_permit">Business Permit</label>
            </div>
          </div>
          <div class="text-primary mb-1">Upload a clear photo of your Business Permit.</div>

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="dti_permit" name="dti_permit" type="file" class="form-control" placeholder="" required>
              <label for="dti_permit">DTI Permit</label>
            </div>
          </div>
          <div class="text-primary mb-1">Upload a clear photo of your DTI Permit.</div>

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="bir_permit" name="bir_permit" type="file" class="form-control" placeholder="" required>
              <label for="bir_permit">BIR Permit</label>
            </div>
          </div>
          <div class="text-primary mb-1">Upload a clear photo of your BIR Permit.</div>

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="business_picture" name="business_picture" type="file" class="form-control" placeholder=""
                required>
              <label for="business_picture">Business Picture</label>
            </div>
          </div>
          <div class="text-primary mb-3">Upload a clear photo of yourself holding all the required documents.</div>

          <div class="row">
            <div class="col-8 d-inline-flex align-items-center">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                <label class="form-check-label" for="flexCheckDefault">
                  I agree to the <a href="term.php">terms</a>
                </label>
              </div>
            </div>
            <div class="col-4">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </div>
          </div>
        </form>


        <p class="mb-0"> <a href="index.php" class="link-primary text-center">
            I already have a membership
          </a> </p>
      </div> <!-- /.register-card-body -->
    </div>
  </div> <!-- /.register-box --> <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
  <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
  <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
  <script src="js/adminlte.js"></script>
  <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
  <script>
    const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
    const Default = {
      scrollbarTheme: "os-theme-light",
      scrollbarAutoHide: "leave",
      scrollbarClickScroll: true,
    };
    document.addEventListener("DOMContentLoaded", function() {
      const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
      if (
        sidebarWrapper &&
        typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
      ) {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
          scrollbars: {
            theme: Default.scrollbarTheme,
            autoHide: Default.scrollbarAutoHide,
            clickScroll: Default.scrollbarClickScroll,
          },
        });
      }
    });
  </script> <!--end::OverlayScrollbars Configure--> <!--end::Script-->
  <script>
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const passwordError = document.getElementById('passwordError');
    const confirmPasswordError = document.getElementById('confirmPasswordError');

    function validatePassword() {
      const password = passwordInput.value;
      const passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{8,10}$/;

      if (passwordRegex.test(password)) {
        passwordInput.classList.remove('is-invalid');
        passwordError.style.display = 'none';
        return true;
      } else {
        passwordInput.classList.add('is-invalid');
        passwordError.style.display = 'block';
        return false;
      }
    }

    function validateConfirmPassword() {
      const password = passwordInput.value;
      const confirmPassword = confirmPasswordInput.value;

      if (confirmPassword === '') {
        confirmPasswordInput.classList.remove('is-invalid');
        confirmPasswordError.style.display = 'none';
        return true; // Do not trigger error if confirm password is empty.
      }

      if (password === confirmPassword) {
        confirmPasswordInput.classList.remove('is-invalid');
        confirmPasswordError.style.display = 'none';
        return true;
      } else {
        confirmPasswordInput.classList.add('is-invalid');
        confirmPasswordError.style.display = 'block';
        return false;
      }
    }

    function validateForm() {
      const isPasswordValid = validatePassword();
      const isConfirmPasswordValid = validateConfirmPassword();

      return isPasswordValid && isConfirmPasswordValid; // Prevent submission if either validation fails
    }

    passwordInput.addEventListener('input', () => {
      validatePassword();
      if (confirmPasswordInput.value !== '') {
        validateConfirmPassword(); // Only check confirm password if it has input.
      }
    });

    confirmPasswordInput.addEventListener('input', validateConfirmPassword);
  </script>
</body><!--end::Body-->

</html>