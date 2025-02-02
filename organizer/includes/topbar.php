<!--begin::Header-->
<nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
  <div class="container-fluid"> <!--begin::Start Navbar Links-->
    <ul class="navbar-nav">
      <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i
            class="bi bi-list"></i> </a> </li>
    </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
    <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
    
      <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <img src="<?php echo htmlspecialchars($_SESSION['profile']) ?> " class="user-image rounded-circle shadow"
            alt="User Image">
          <span class="d-none d-md-inline"><?php echo htmlspecialchars($_SESSION['name']) ?></span> </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
          <li class="user-header text-bg-primary"> <img src="<?php echo htmlspecialchars($_SESSION['profile']) ?> "
              class="rounded-circle shadow" alt="User Image">
            <p>
              <?php echo htmlspecialchars($_SESSION['name']) ?> - <?php echo htmlspecialchars($_SESSION['user_type']) ?>
            </p>
            <script>
              document.addEventListener('DOMContentLoaded', function () {
                fetch('get_user_data.php')
                  .then(response => response.json())
                  .then(data => {
                    if (data.error) {
                      document.getElementById('user-plan-info').innerText = data.error;
                    } else {
                      const planInfo = `Plan Type: ${data.plan_type} \n Status: ${data.status}`;
                      document.getElementById('user-plan-info').innerText = planInfo;
                    }
                  })
                  .catch(error => console.error('Error fetching user data:', error));
              });
            </script>

            <p id="user-plan-info">Loading...</p>

          </li> <!--end::User Image--> <!--begin::Menu Body-->
          <!--begin::Menu Footer-->
          <li class="user-footer">
            <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
            <a href="../registration_functions/signout.php" class="btn btn-default btn-flat float-end">Sign out</a>
          </li> <!--end::Menu Footer-->
        </ul>
      </li> <!--end::User Menu Dropdown-->
    </ul> <!--end::End Navbar Links-->
  </div> <!--end::Container-->
</nav> <!--end::Header--> <!--begin::Sidebar-->