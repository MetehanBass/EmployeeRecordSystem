<?php
$connect = mysqli_connect("localhost", "root", "", "employeemanagementsystem");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "SELECT * FROM project
  WHERE ProjName LIKE '%".$search."%'
 ";
}
else
{

$query = "
 SELECT * FROM project ORDER BY status desc";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  $output .='<table class="table table-striped">

  <thead>
    <tr>
      <th> Project Name </th>
      <th> Project Department Name </th>
      <th> Number of Employees </th>
      <th> Edit </th>
    </tr>
  </thead>

  ';
  while($row = mysqli_fetch_array($result))
 {
   $query1 = "SELECT DeptName FROM department WHERE DepartmentId='".$row["DepartmentId"]."'";
   $result1 = mysqli_query($connect, $query1) or die ( mysqli_error());
   $rowdept = mysqli_fetch_assoc($result1);

   $query2 = "SELECT EmployeeId FROM employee WHERE ProjectId = '".$row["ProjectId"]."' ";
   $query_run2 = mysqli_query($connect, $query2);
   $row2 = mysqli_num_rows($query_run2);


   $output .= '
   <tr>
   <td>'.$row["ProjName"].'</td>
   <td>'.$rowdept['DeptName'].'</td>
   <td>'.$row2.'</td>

        <td>

        <a href="project_update.php?id='.$row["ProjectId"].'">
         <button type="button" class="btn btn-gradient-dark btn-icon-text"> Edit <i class="mdi mdi-account-edit btn-icon-append"></i>
           </button></a>
            </td>
               <td>
               <?php
       </td>

   </tr>
   ';

 }
echo $output;
}
else
{
  $output .= '
   <tr>
    <td colspan="12">No Data Found</td>
   </tr>
   ';
  }


?>
