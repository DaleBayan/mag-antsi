  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="fa-solid fa-chart-pie"></i>
          <span>Dashboard</span>
        </a>
      </li>

      
      {{-- [START] - File Maintenance --}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#collapseFileMaintenance" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-folder"></i><span>File Maintenance</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="collapseFileMaintenance" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="fa-solid fa-photo-film"></i><span>Content Type</span>
            </a>
          </li>
        </ul>
      </li>
      {{-- [END] - File Maintenance --}}

      {{-- [START] - Page --}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#collapsePage" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-file"></i><span>Page</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="collapsePage" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="fa-solid fa-image"></i><span>Contents</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="fa-solid fa-book"></i><span>Glossary</span>
            </a>
          </li>
          
        </ul>
      </li>
      {{-- [END] - Page --}}

      {{-- [START] - System Setup --}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#collapseSystemSetup" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-sliders"></i><span>System Setup</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="collapseSystemSetup" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="fa-solid fa-address-book"></i><span>Contact Page</span>
            </a>
          </li>
          <li>
            <a href="{{ route('user_roles.index') }}">
              <i class="fa-solid fa-user-gear"></i><span>User Role</span>
            </a>
          </li>
          <li>
            <a href="{{ route('users.index') }}">
              <i class="fa-solid fa-user-group"></i><span>System Users</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="fa-solid fa-hourglass-start"></i><span>Audit Trail</span>
            </a>
          </li>
          <li>
            <a href="{{ route('change_password.index') }}">
              <i class="fa-solid fa-lock"></i><span>Change Password</span>
            </a>
          </li>
          
        </ul>
      </li>
      {{-- [END] - System Setup --}}
      

      

  </aside><!-- End Sidebar-->