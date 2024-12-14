<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
  <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./dashboard.php" class="brand-link">
      <!--begin::Brand Image--> <img src="../images/logo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
      <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">Ipil Event Planner</span>
      <!--end::Brand Text--> </a> <!--end::Brand Link--> </div>
  <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
  <div class="sidebar-wrapper">
    <nav class="mt-2"> <!--begin::Sidebar Menu-->

      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

        <li class="nav-item"> <a href="dashboard.php" class="nav-link"> <i class="nav-icon bi bi-house"></i>
            <p>dashboard</p>
          </a> </li>

        <li class="nav-item menu"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-person"></i>
            <p>
              Organizer Request
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"> <a href="pending_request.php" class="nav-link"> <i
                  class="nav-icon bi bi-person-fill-exclamation"></i>
                <p>Pending Request</p>
              </a> </li>
            <li class="nav-item"> <a href="approved_request.php" class="nav-link"> <i
                  class="nav-icon bi bi-person-fill-check"></i>
                <p>Approved Request</p>
              </a> </li>
            <li class="nav-item"> <a href="denied_request.php" class="nav-link"> <i
                  class="nav-icon bi bi-person-fill-slash"></i>
                <p>Denied Request</p>
              </a> </li>
          </ul>
        </li>


        <?php
         // Include database connection
        
        // Get supplier_id from session
        $supplier_id_sidebar = $_SESSION['id'] ?? null;
      
        if ($supplier_id_sidebar) {
          // Query to get supplier_type based on supplier_id
          $query = "SELECT supplier_type FROM supplier WHERE supplier_id = ?";
          $stmt = $conn->prepare($query);
          $stmt->bind_param('i', $supplier_id_sidebar);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
            // Fetch supplier_type and set it to user_type
            $row = $result->fetch_assoc();
            $user_type_side = $row['supplier_type'];
          } else {
            $user_type = null; // Or handle no matching supplier_id as needed
          }
          $stmt->close();
        } else {
          $user_type = null; // Handle no session id
        }

        // Conditional menu items based on user_type
        if (in_array($user_type_side, ['catering', 'dress', 'decor'])): ?>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-bag"></i>
              <p>
                Products
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="product_list.php" class="nav-link">
                  <i class="nav-icon bi bi-bag-plus-fill"></i>
                  <p>Product List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="package_list.php" class="nav-link">
                  <i class="nav-icon bi bi-boxes"></i>
                  <p>Package List</p>
                </a>
              </li>
            </ul>
          </li>
        <?php elseif ($user_type_side === 'venue' OR $user_type_side === 'photo_video'): ?>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-bag"></i>
              <p>
                Products
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="product_list.php" class="nav-link">
                  <i class="nav-icon bi bi-bag-plus-fill"></i>
                  <p>Product List</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>



      </ul> <!--end::Sidebar Menu-->
    </nav>
  </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->