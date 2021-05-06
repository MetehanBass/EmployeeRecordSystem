<?php
ob_start();
include "db_conn.php";
?>
<!DOCTYPE html>
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
              </span>Create a Employee
            </h3>
          </div>
          <div class="row" style="margin-top:2%;">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Fields are Required</h4>
                  <form class="form-sample" role = "form" onsubmit="false"
                     action = "" method = "post">
                    <p class="card-description"> Personal info </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" value="" name="Name" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone Type</label>
                          <div class="col-sm-9">
                            <select name="Phonetype" value="Cell" class="form-control">
                              <option>Cell</option>
                              <option>Home</option>
                              <option>Business</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-9">
                            <select name="Gender" value="Male" class="form-control">
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone Number</label>
                          <div class="col-sm-9">
                            <input type="text" value="" name="Phonenum" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="text" value="" name="Email" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date of Birth</label>
                          <div class="col-sm-9">
                            <input class="form-control" name="DOB" value="" placeholder="yyyy-mm-dd" />
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
                            <input type="text" name="Country" value=""class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <p class="card-description"> Job Details</p>
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
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">City</label>
                          <div class="col-sm-9">
                            <input type="text" name="City" value="" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Job</label>
                          <div class="col-sm-9">
                            <select name="Job" value="" class="form-control">
                              <option>Select a Job</option>
                              <?php
                              $joblist = $conn->query("SELECT JobTitle FROM Job");
                              while($row=$joblist->fetch_assoc()):
                               ?>
                              <option><?php echo ($row['JobTitle']) ?></option>

                            <?php endwhile; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Street</label>
                          <div class="col-sm-9">
                            <input type="text" name="Street" value="" class="form-control" />
                          </div>
                        </div>
                      </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Salary</label>
                                <div class="col-sm-9">
                                    <input type="text" name="Salary" value="" class="form-control" placeholder="AS $" />
                                  </div>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Postcode</label>
                          <div class="col-sm-9">
                            <input type="text" name="Postcode" value="" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Apartment No</label>
                          <div class="col-sm-9">
                            <input type="text" name="ApartmentNo" value="" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <button style="margin-top:3%;" type="submit" name="submit" class="btn btn-gradient-primary mr-2">+ Create Employee</button>
                  </form>
                </div>
              </div>
            </div>

            <?php

              if (isset($_POST['submit']) && !empty($_POST['Name']) && !empty($_POST['Phonenum']) && !empty($_POST['Gender']) && !empty($_POST['DOB']) && !empty($_POST['DepartmentName'])
                                          && !empty($_POST['Salary']) && !empty($_POST['Country']) && !empty($_POST['City']) && !empty($_POST['Street']) && !empty($_POST['Postcode'])
                                          && !empty($_POST['Email']) && !empty($_POST['ApartmentNo'])) {
                $name = $_POST['Name'];
                $phonenum = $_POST['Phonenum'];
                $phonetype = $_POST['Phonetype'];
                $gender = $_POST['Gender'];
                $email = $_POST['Email'];
                $DOB=$_POST['DOB'];
                $job=$_POST['Job'];
                $deptname =$_POST['DepartmentName'];
                $salary = $_POST['Salary'];
                $country = $_POST['Country'];
                $city = $_POST['City'];
                $street = $_POST['Street'];
                $postcode = $_POST['Postcode'];
                $apptno = $_POST['ApartmentNo'];
                $date = date('Y-m-d H:i:s');


                $sql1 = $conn->query("INSERT INTO phone (Type,PhoneNumber)
                        VALUES ('$phonetype', '$phonenum')");

                $sql2 = $conn->query("INSERT INTO address(Country, City, Street, Postcode,ApptNo)
                        VALUES ('$country', '$city', '$street', '$postcode', '$apptno')");



                $phoneid = $conn->query("SELECT PhoneId FROM phone WHERE PhoneNumber = '$phonenum'");
                $row1 = mysqli_fetch_array($phoneid);


                $addressid = $conn->query("SELECT AddressId FROM address WHERE City = '$city' AND Street = '$street'");
                $row2 = mysqli_fetch_array($addressid);


              $jobid = $conn->query("SELECT JobId FROM job WHERE JobTitle = '$job'");
              $row3 = mysqli_fetch_array($jobid);

              $deptid = $conn->query("SELECT DepartmentId FROM department WHERE DeptName = '$deptname'");
              $row4 = mysqli_fetch_array($deptid);


                $sql = $conn->query("INSERT INTO employee (Name, Gender, Email, DOB, Salary, StartingDate, JobId,DepartmentId,AddressId,PhoneId)
                        VALUES ('$name', '$gender', '$email', '$DOB', '$salary', '$date', '$row3[JobId]', '$row4[DepartmentId]', '$row2[AddressId]', '$row1[PhoneId]')");


                        if ($conn->query($sql) === TRUE) {
                          echo "Project has been created.!<br />";
                        } else {
                          echo "Project could not be created .<br />";
                        }
                        header("location: index.html");  exit;
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
