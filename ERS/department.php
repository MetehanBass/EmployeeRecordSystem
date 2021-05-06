<?php include "db_conn.php"; ?>
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
              </span> Departments
            </h3>
          </div>
          <div class="row" style="margin-top:2%;">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Details of Departments</h4>

                  </p>
                  <div class="row">
                    <div class="search-field d-none d-md-block">
                      <form class="d-flex align-items-center h-100" style="margin-left:10%;" action="#">
                        <div class="input-group">
                          <div class="input-group-prepend">

                          </div>

                        </div>
                      </form>
                    </div>
                  </div>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th> Department Name </th>
                        <th> Location </th>
                        <th> Number of Employee </th>
                        <th> Number of Project </th>
                        <th> Edit </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $ret=mysqli_query($conn,"select * from department");

                  while($row=mysqli_fetch_array($ret))
                  {
                    $qry=mysqli_query($conn,"SELECT DepartmentId FROM project WHERE DepartmentId = $row[DepartmentId]");
                    $noproj = mysqli_num_rows($qry);

                    $qry1=mysqli_query($conn,"SELECT DepartmentId FROM employee WHERE DepartmentId = $row[DepartmentId]");
                    $noemployee = mysqli_num_rows($qry1);
                    ?>
                      <tr>

                          <td><?php echo $row['DeptName'];?></td>
                          <td><?php echo $row['Location'];?></td>
                          <td><?php echo $noemployee;?></td>
                          <td><?php echo $noproj;?></td>

                          <td>
                            <a href="department_update.php?id=<?php echo $row['DepartmentId'];?>">
                             <button type="button" class="btn btn-gradient-dark btn-icon-text"> Edit <i class="mdi mdi-account-edit btn-icon-append"></i>
                               </button></a>
                          </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
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
