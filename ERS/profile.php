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
              </span> <?php echo $_SESSION['name']; ?>'s Details
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
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Admin Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="Name" value="<?php echo $_SESSION['name'];  ?>" class="form-control" id="exampleInputUsername2" placeholder="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Admin Username</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="Username" value="<?php echo $_SESSION['username']; ?>" id="exampleInputUsername2" placeholder="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Admin Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="Password" value="" id="exampleInputUsername2" placeholder="Enter New Password">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2" name="submit">Update Details</button>
                  </form>
                </div>
                <?php if (isset($_GET['error'])) { ?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
              </div>
            </div>
</div>
            <?php

              if (isset($_POST['submit']) && !empty($_POST['Username']) && !empty($_POST['Name']) && !empty($_POST['Password'])) {
                $username = $_POST['Username'];
                $name = $_POST['Name'];
                $password = $_POST['Password'];

                $sql = "UPDATE admin SET AdminName = '$name' , Username ='$username' , Password = '$password'";


                  if ($conn->query($sql) === TRUE) {
                    echo "Details has been updated.!<br />";
                  } else {
                    echo "Details could not be updated .<br />";
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
