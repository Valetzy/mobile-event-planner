<!--begin::Header-->
<nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
  <div class="container-fluid"> <!--begin::Start Navbar Links-->
    <ul class="navbar-nav">
      <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i
            class="bi bi-list"></i> </a> </li>
    </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
    <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
      <li class="nav-item"> <a class="nav-link" data-widget="navbar-search" href="#" role="button"> <i
            class="bi bi-search"></i> </a> </li> <!--end::Navbar Search-->
      <!--begin::Notifications Dropdown Menu-->
      <li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i
            class="bi bi-bell-fill"></i> <span class="navbar-badge badge text-bg-warning">15</span> </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <span class="dropdown-item dropdown-header">15
            Notifications</span>
          <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i class="bi bi-envelope me-2"></i> 4
            new
            messages
            <span class="float-end text-secondary fs-7">3 mins</span> </a>
          <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i class="bi bi-people-fill me-2"></i>
            8
            friend requests
            <span class="float-end text-secondary fs-7">12 hours</span> </a>
          <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i
              class="bi bi-file-earmark-fill me-2"></i> 3 new reports
            <span class="float-end text-secondary fs-7">2 days</span> </a>
          <div class="dropdown-divider"></div> <a href="#" class="dropdown-item dropdown-footer">
            See All Notifications
          </a>
        </div>
      </li> <!--end::Notifications Dropdown Menu--> <!--begin::User Menu Dropdown-->
      <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <img src="../uploads/suppliers/<?php echo htmlspecialchars($_SESSION['profile']) ?> " class="user-image rounded-circle shadow" alt="User Image">
          <span class="d-none d-md-inline"><?php echo htmlspecialchars($_SESSION['name']) ?></span> </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
          <li class="user-header text-bg-primary"> <img src="../uploads/suppliers/<?php echo htmlspecialchars($_SESSION['profile']) ?> "
              class="rounded-circle shadow" alt="User Image">
            <p>
              <?php echo htmlspecialchars($_SESSION['name']) ?> - <?php echo htmlspecialchars($_SESSION['user_type']) ?>
            </p>
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