<?php
include "db_conn.php";
session_start();


$query = "SELECT EmployeeId FROM employee WHERE LeavingDate IS NULL";
$query_run = mysqli_query($conn, $query);
$row = mysqli_num_rows($query_run);

$query = "SELECT ProjectId FROM Project";
$query_run = mysqli_query($conn, $query);
$row1 = mysqli_num_rows($query_run);

$result = mysqli_query($conn, 'SELECT SUM(Salary) AS Salary FROM employee');
$row2 = mysqli_fetch_assoc($result);
$sum = $row2['Salary'];

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
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <?php include "sidebar.php" ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
              </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
              </ul>
            </nav>
          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Monthly Total Salary <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php echo $sum.' $'  ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Number of Projects <i class="mdi mdi-book-check-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php echo $row1 ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Number of Employees<i class="mdi mdi-emoticon-excited-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php echo $row ?></h2>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="clearfix">
                    <h4 class="card-title float-left">Department Chart </h4>
                    <div class="DeptChart" id="DeptChart">

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Job Chart</h4>
                  <div class="GenderChart" id="JobChart">

                  </div>
                </div>
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


            <?php
            $qry=mysqli_query($conn,"SELECT DepartmentId FROM employee WHERE DepartmentId = 1");
            $noadministration = mysqli_num_rows($qry);
            $qry1=mysqli_query($conn,"SELECT DepartmentId FROM employee WHERE DepartmentId = 2");
            $nosales = mysqli_num_rows($qry1);
            $qry2=mysqli_query($conn,"SELECT DepartmentId FROM employee WHERE DepartmentId = 3");
            $nosocial = mysqli_num_rows($qry2);
            $qry3=mysqli_query($conn,"SELECT DepartmentId FROM employee WHERE DepartmentId = 4");
            $nomobile = mysqli_num_rows($qry3);
            $qry4=mysqli_query($conn,"SELECT DepartmentId FROM employee WHERE DepartmentId = 5");
            $noweb = mysqli_num_rows($qry4);


                        ?>

<script type = 'text/javascript' src = 'https://www.gstatic.com/charts/loader.js'>
           </script>
           <script type = 'text/javascript'>
              google.charts.load('current', {packages: ['corechart']});

           </script>


           <script language = 'JavaScript'>
             var admin = <?php echo $noadministration ?>;
             var sales = <?php echo $nosales ?>;
             var social = <?php echo $nosocial?>;
             var mobile = <?php echo $nomobile?>;
             var web = <?php echo $noweb?>;

              function drawChart() {
                 // Define the chart to be drawn.
                 var data = new google.visualization.DataTable();
                 data.addColumn('string', 'Browser');
                 data.addColumn('number', 'Percentage');
                 data.addRows([
                    ['No Of Employee at Social Media D.',social],
                    ['No Of Employee at Administration', admin],
                    ['No Of Employee at WEB Department',web],
                    ['No Of Employee at Sales Department', sales],
                    ['No Of Employee at Mobile Department', mobile],
                    ['Others', 0]
                 ]);

                 // Set chart options
                 var options = {
                    'title':'',
                    'width':800,
                    'height':300,
                    pieHole: 0.350,
                    'backgroundColor':'transparent'
                 };

                 // Instantiate and draw the chart.
                 var chart = new google.visualization.PieChart(document.getElementById('DeptChart'));
                 chart.draw(data, options);
              }
               google.charts.setOnLoadCallback(drawChart);
           </script>

            <?php
            $qry5=mysqli_query($conn,"SELECT JobId FROM employee WHERE JobId = 1");
            $nowebdev = mysqli_num_rows($qry5);
            $qry6=mysqli_query($conn,"SELECT JobId FROM employee WHERE JobId = 2");
            $noiosdev = mysqli_num_rows($qry6);
            $qry7=mysqli_query($conn,"SELECT JobId FROM employee WHERE JobId = 3");
            $noandroiddev = mysqli_num_rows($qry7);
            $qry8=mysqli_query($conn,"SELECT JobId FROM employee WHERE JobId = 4");
            $nograpartist = mysqli_num_rows($qry8);
            $qry9=mysqli_query($conn,"SELECT JobId FROM employee WHERE JobId = 5");
            $nomanager = mysqli_num_rows($qry9);
            $qry10=mysqli_query($conn,"SELECT JobId FROM employee WHERE JobId = 6");
            $nocleaner = mysqli_num_rows($qry10);
            $qry11=mysqli_query($conn,"SELECT JobId FROM employee WHERE JobId = 7");
            $noaccountant = mysqli_num_rows($qry11);
            $qry12=mysqli_query($conn,"SELECT JobId FROM employee WHERE JobId = 8");
            $nosecretary = mysqli_num_rows($qry12);

             ?>

                      <script language = 'JavaScript'>
                        var iosdev = <?php echo $noiosdev ?>;
                        var webdev = <?php echo $nowebdev ?>;
                        var androiddev = <?php echo $noandroiddev?>;
                        var grapartist = <?php echo $nograpartist ?>;
                        var manager = <?php echo $nomanager ?>;
                        var cleaner = <?php echo $nocleaner ?>;
                        var accountant = <?php echo $noaccountant ?>;
                        var secretary = <?php echo $nosecretary ?>;

                         function drawChart() {
                            // Define the chart to be drawn.
                            var data = new google.visualization.DataTable();
                            data.addColumn('string', 'Browser');
                            data.addColumn('number', 'Percentage');
                            data.addRows([
                               ['Number of Web Developer',webdev],
                               ['Number of IOS Developer', iosdev],
                               ['Number of Android Developer',androiddev],
                               ['Number of Graphic Artist',grapartist],
                               ['Number of Manager',manager],
                               ['Number of Cleaner',cleaner],
                               ['Number of Accountant',accountant],
                               ['Number of Secretary',secretary],

                               ['Others', 0]
                            ]);

                            // Set chart options
                            var options = {
                               'title':'',
                               'width':550,
                               'height':230,
                               pieHole: 0.350,
                               'backgroundColor':'transparent'
                            };

                            // Instantiate and draw the chart.
                            var chart = new google.visualization.PieChart(document.getElementById('JobChart'));
                            chart.draw(data, options);
                         }
                          google.charts.setOnLoadCallback(drawChart);
                      </script>
