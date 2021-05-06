<?php
$connect = mysqli_connect("localhost", "root", "", "employeemanagementsystem");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM project
  WHERE ProjName LIKE '%".$search."%'
 ";
}
else
{

$query = "
 SELECT * FROM project ORDER BY ProjectId";
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
   $deptname = $connect->query("SELECT d.*,p.ProjectId from department d inner join project p on p.ProjectId = d.DepartmentId");
   while($row1 = mysqli_fetch_array($deptname))
  {

   $output .= '
   <tr>
   <td>'.$row["ProjName"].'</td>
   <td>'.$row1['DeptName'].'</td>
   

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
