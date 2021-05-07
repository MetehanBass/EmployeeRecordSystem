<?php
ob_start();
include "db_conn.php";
session_start();

$gid=$_GET['id'];
$pid=$_GET['pid'];

$query1 = "SELECT * FROM employee WHERE DepartmentId='".$gid."' AND ProjectId = 0";
$result1 = mysqli_query($conn, $query1) or die (mysqli_error());
$query2 = "SELECT * FROM department WHERE DepartmentId='".$gid."'";
$result2 = mysqli_query($conn, $query2) or die (mysqli_error());
$deptrow = mysqli_fetch_array($result2);
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
              </span>Add Employees to Project
            </h3>
          </div>
          <div class="row" style="margin-top:2%;">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"></h4>
                  <p class="card-description"> </p>
                  <h4>Employees without a project belonging to the selected department </h4> <br>
                  <h5 class="text-primary">Choose from <?php echo $deptrow['DeptName']; ?> </h5>
                  <form style="margin-top:3%;" class="forms-sample" role = "form" onsubmit="false"
                     action = "add_project_employee_check.php" method = "post">
                     <input type="hidden" name="update_id" id="update_id" value="<?php echo $pid; ?>">

                    <?php
                    while($row=mysqli_fetch_array($result1))
                    {?>

                    <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" name="lang[]" value="<?php echo $row['EmployeeId']; ?>" class="form-check-input"> <?php echo $row['Name'];?> </label>
                  </div>
                    <?php }?>
                    <button style="margin-top:3%;" type="submit" name="submit" class="btn btn-gradient-primary mr-2">+ Add Employees to Project</button>
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
 <?php ob_flush();  ?>
