<?php
ob_start();
include "db_conn.php";
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Employee Management System</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <?php include "nav.php" ?>
    <div class="container-fluid page-body-wrapper">
      <?php include "sidebar.php" ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-contacts"></i>
              </span>Create a Project
            </h3>
          </div>
          <div class="row" style="margin-top:2%;">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"></h4>
                  <p class="card-description"> </p>
                  <form class="forms-sample" role = "form" onsubmit="false"
                     action = "" method = "post">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Project Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="ProjName" value="" class="form-control" id="exampleInputUsername2" placeholder="Project Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department Name</label>
                      <div class="col-sm-9">
                        <select name="DepartmentName" value="" class="form-control">
                          <option>Select a Department</option>
                          <?php
                          $deptlist = $conn->query("SELECT DeptName FROM Department");
                          while($row=$deptlist->fetch_assoc()):
                           ?>
                          <option><?php echo ($row['DeptName']) ?></option>

                        <?php endwhile; ?>
                        </select>

                      </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-gradient-primary mr-2">Create Project</button>
                  </form>
                </div>
              </div>
            </div>
            <?php

              if (isset($_POST['submit']) && !empty($_POST['ProjName']) && !empty($_POST['DepartmentName'])) {
                $deptname = $_POST['DepartmentName'];
                $projname = $_POST['ProjName'];
                $date = date('Y-m-d H:i:s');

                $deptid = $conn->query("SELECT DepartmentId FROM department WHERE DeptName = '$deptname'");
                $row = mysqli_fetch_array($deptid);

                $sql = "INSERT INTO Project (ProjName, DepartmentId, StartingDate) VALUES ('$projname', '$row[DepartmentId]' , '$date')";

                  if ($conn->query($sql) === TRUE) {
                    echo "Project has been created.!<br />";
                  } else {
                    echo "Project could not be created .<br />";
                  }
                  header("location: add_project_employee.php");  exit;



              }

              ?>

            <footer class="footer">
              <div class="container-fluid clearfix">
              </div>
            </footer>
          </div>
        </div>
      </div>
      <script src="assets/vendors/js/vendor.bundle.base.js"></script>
      <script src="assets/vendors/chart.js/Chart.min.js"></script>
      <script src="assets/js/off-canvas.js"></script>
      <script src="assets/js/hoverable-collapse.js"></script>
      <script src="assets/js/misc.js"></script>
      <script src="assets/js/dashboard.js"></script>
      <script src="assets/js/todolist.js"></script>
</body>

</html>

 <?php ob_flush();  ?>
