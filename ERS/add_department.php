<?php
include "db_conn.php";
session_start();


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
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-contacts"></i>
              </span>Create a Department
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
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Department Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="DeptName" value="" class="form-control" id="exampleInputUsername2" placeholder="Department Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Location Description</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="Location" value="" id="exampleInputUsername2" placeholder="Location Description">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2" name="submit">Create Department</button>
                  </form>
                </div>
                <?php if (isset($_GET['error'])) { ?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
              </div>
            </div>
</div>
            <?php

              if (isset($_POST['submit']) && !empty($_POST['DeptName']) && !empty($_POST['Location'])) {
                $deptname = $_POST['DeptName'];
                $location = $_POST['Location'];

                $sql = "INSERT INTO department (DeptName, Location) VALUES ('$deptname', '$location')";


                  if ($conn->query($sql) === TRUE) {
                    echo "Department has been created.!<br />";
                  } else {
                    echo "Department could not be created .<br />";
                  }



              }

              ?>

            <footer style="margin-top:3%;" class="footer">
              <div class="container-fluid clearfix">
              </div>
            </footer>

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
