<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="profile.php" class="nav-link">
        <div class="nav-profile-image">
          <img src="assets/images/faces-clipart/pic-1.png" alt="image">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2"><?php echo $_SESSION['name']; ?></span>
          <span class="text-secondary text-small">Admin</span>
        </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="home.php">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="employee.php" aria-expanded="false">
        <span class="menu-title">All Employees</span>
        <i class="mdi mdi-contacts menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="department.php">
        <span class="menu-title">Departments</span>
        <i class="mdi mdi-home-group menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="project.php">
        <span class="menu-title">Projects</span>
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
      </a>
    </li>
    <li class="nav-item sidebar-actions">
      <span class="nav-link">
        <a href="add_employee.php" style="text-decoration:none;"><button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a Employee</button></a>
        <a href="add_project.php" style="text-decoration:none;"><button class="btn btn-block btn-lg btn-gradient-primary mt-2">+ Add a Project</button></a>
        <a href="add_department.php" style="text-decoration:none;"><button class="btn btn-block btn-lg btn-gradient-primary mt-2">+ Add a Department</button></a>
        <div class="mt-2">
          <div class="border-bottom">
          </div>

        </div>
      </span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="employee_old.php" aria-expanded="false">
        <span class="menu-title">Old Employees</span>
        <i class="mdi mdi-contacts menu-icon"></i>
      </a>
    </li>
  </ul>
</nav>
