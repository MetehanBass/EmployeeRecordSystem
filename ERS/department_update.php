<?php
include "db_conn.php";
session_start();

$gid=$_GET['id'];
$query = "SELECT * FROM department where DepartmentId='".$gid."'";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

 ?>
<html lang="en">

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
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-contacts"></i>
              </span>Edit Department
            </h3>
          </div>
          <div class="row" style="margin-top:2%;">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $row['DeptName'];?>'s Details</h4>
                  <form class="form-sample" method="post" action="department_update_info.php">
                    <p class="card-description"> Department info </p>
                    <input type="hidden" name="update_id" id="update_id" value="<?php echo $gid; ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Department Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="DeptName" value="<?php echo $row['DeptName'];?>"class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Department Locationn</label>
                          <div class="col-sm-9">
                            <input type="text" name="Location" value="<?php echo $row['Location']; ?>" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">

                    </div>
                    <div class="row">

                    </div>
                    <div class="row">

                    </div>
                    <div class="row">

                    </div>
                    <div class="row">

                    </div>
                    <div class="row">
                    </div>
                    <button style="margin-top:3%;" type="submit" name="submit" class="btn btn-gradient-primary mr-2">Edit Department</button>
                  </form>
                </div>
              </div>
            </div>

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
