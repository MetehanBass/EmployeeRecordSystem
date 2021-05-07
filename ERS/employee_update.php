<?php
include "db_conn.php";
session_start();

$gid=$_GET['id'];
$query = "SELECT * FROM employee where EmployeeId='".$gid."'";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

$query = "SELECT PhoneNumber FROM phone where PhoneId='".$row['PhoneId']."'";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$rowphone = mysqli_fetch_assoc($result);

$query1 = "SELECT DeptName FROM department where DepartmentId='".$row['DepartmentId']."'";
$result1 = mysqli_query($conn, $query1) or die ( mysqli_error());
$rowdept = mysqli_fetch_assoc($result1);

$query1 = "SELECT * FROM address where AddressId='".$row['AddressId']."'";
$result1 = mysqli_query($conn, $query1) or die ( mysqli_error());
$rowaddress = mysqli_fetch_assoc($result1);
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
              </span>Edit Employee
            </h3>
          </div>
          <div class="row" style="margin-top:2%;">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $row['Name'];?>'s Informations</h4>
                  <form class="form-sample" method="post" action="employee_update_info.php">
                    <p class="card-description"> Personal info </p>
                    <input type="hidden" name="update_id" id="update_id" value="<?php echo $gid; ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="Name" value="<?php echo $row['Name'];?>"class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone Number</label>
                          <div class="col-sm-9">
                            <input type="text" name="Phonenum" value="<?php echo $rowphone['PhoneNumber']; ?>" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-9">
                            <select value="<?php echo $row['Gender'];?>" name="Gender" class="form-control">
                              <option value="Male"<?php if($row['Gender'] == 'Male'): ?> selected="selected"<?php endif; ?>>Male</option>
                              <option value="Female"<?php if($row['Gender'] == 'Female'): ?> selected="selected"<?php endif; ?>>Female</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date of Birth</label>
                          <div class="col-sm-9">
                            <input class="form-control" name="DOB" placeholder="" value="<?php echo $row['DOB']; ?>" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Department</label>
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
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Current Salary</label>
                          <div class="col-sm-9">
                            <input class="form-control" name="Salary" placeholder="" value="<?php echo $row['Salary']; ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p class="card-description"> Address</p>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Country</label>
                          <div class="col-sm-9">
                            <input type="text" name="Country" value="<?php echo $rowaddress['Country']; ?>" class="form-control"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">City</label>
                          <div class="col-sm-9">
                            <input type="text" name="City" value="<?php echo $rowaddress['City']; ?>" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Street</label>
                          <div class="col-sm-9">
                            <input type="text" name="Street" value="<?php echo $rowaddress['Street']; ?>" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Postcode</label>
                          <div class="col-sm-9">
                            <input type="text" name="Postcode" value="<?php echo $rowaddress['Postcode']; ?>" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <button style="margin-top:3%;" type="submit" name="submit" class="btn btn-gradient-primary mr-2">Edit Employee</button>
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
