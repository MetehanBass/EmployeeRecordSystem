<?php
ob_start();
include "db_conn.php";
session_start();



if(isset($_GET['id'])) {
  $projid=$_GET['id'];

  $query = "SELECT * FROM project WHERE ProjectId='".$projid."'";
  $result = mysqli_query($conn, $query) or die ( mysqli_error());
  $row = mysqli_fetch_assoc($result);
}

$query1 = "SELECT DeptName FROM department where DepartmentId='".$row['DepartmentId']."'";
$result1 = mysqli_query($conn, $query1) or die ( mysqli_error());
$rowdept = mysqli_fetch_assoc($result1);


$query2 = "SELECT EmployeeId FROM employee WHERE ProjectId = '".$row["ProjectId"]."' ";
$query_run2 = mysqli_query($conn, $query2);
$row2 = mysqli_num_rows($query_run2);
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
              </span><?php echo $row['ProjName']; ?> Details
            </h3>
            <h5><?php echo $row['StartingDate']; ?></h5> <br> <h5>Number of employees :<?php echo $row2; ?></h5>
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
                        <input type="text" name="ProjName" value="<?php echo $row['ProjName']; ?>" class="form-control" id="exampleInputUsername2" placeholder="Project Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department Name</label>
                      <div class="col-sm-9">
                        <select name="DeptName" class="form-control">
                          <option value="Administration"<?php if($rowdept['DeptName'] == 'Administration Department'): ?> selected="selected"<?php endif; ?>>Administration Department</option>
                          <option value="Sales Department"<?php if($rowdept['DeptName'] == 'Sales Department'): ?> selected="selected"<?php endif; ?>>Sales Department</option>
                          <option value="Social Media Department"<?php if($rowdept['DeptName'] == 'Social Media Department'): ?> selected="selected"<?php endif; ?>>Social Media Department</option>
                          <option value="Mobile Development Department"<?php if($rowdept['DeptName'] == 'Mobile Development Department'): ?> selected="selected"<?php endif; ?>>Mobile Developing Department</option>
                          <option value="WEB Development Department"<?php if($rowdept['DeptName'] == 'WEB Development Department'): ?> selected="selected"<?php endif; ?>>WEB Developing Department</option>
                        </select>

                      </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-gradient-primary mr-2">Edit Project</button>
                  </form>
                  <br>
                  <form class="forms-sample" role = "form" onsubmit="false"
                     action = "" method = "post">

                     <?php if($row['status'] == 1): ?>
                     <a href="">
                     <button class="btn btn-sm btn-outline-primary view_billing" name="finish" type="submit" onClick="return confirm('Are you sure?');">Finish Project</button> </a>
                     <?php else: ?>
                       <a href="">
                       <button class="btn btn-sm btn-outline-danger view_billing" type="button" style="background-color:red;color:white;" disabled>Project Finished</button> </a>
                       <?php endif; ?>

                      <?php
                      if (isset($_POST['finish'])) {
                        $date = date('Y-m-d H:i:s');

                        $queryy = "UPDATE project SET status = 0, FinishDate = '$date' WHERE ProjectId= '".$projid."'";
                        $query_run = mysqli_query($conn,$queryy);

                        $queryyy ="UPDATE employee SET ProjectId = 0 WHERE ProjectId= '".$projid."'";
                        $query_run1 = mysqli_query($conn,$queryyy);


                          if ($conn->query($queryy) === TRUE) {

                            echo "Project has been Finished.!<br />";
                          } else {
                            echo "Project could not be finished .<br />";
                          }
                          header('Location:project_update.php?id='.$projid.'');  exit;
                      }
                       ?>
                  </form>
                </div>
              </div>
            </div>
            <?php

              if (isset($_POST['submit']) && !empty($_POST['ProjName']) && !empty($_POST['DeptName'])) {
                $deptname = $_POST['DeptName'];
                $projname = $_POST['ProjName'];

                $deptid1 = $conn->query("SELECT DepartmentId FROM department WHERE DeptName = '$deptname'");
                $row = mysqli_fetch_array($deptid1);

                $deptid = $row['DepartmentId'];

                $queryy = "UPDATE project SET ProjName = '$projname', DepartmentId = '$deptid' WHERE ProjectId= '".$projid."'";
                $query_run = mysqli_query($conn,$queryy);

                  if ($conn->query($deptid) === TRUE) {

                    echo "Project has been updated.!<br />";
                  } else {
                    echo "Project could not be updated .<br />";
                  }
                  header('Location:project_update.php?id='.$projid.'');  exit;



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
