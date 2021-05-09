<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "employeemanagementsystem");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM employee
  WHERE (Name LIKE '%".$search."%'
  OR Gender LIKE '%".$search."%'
  OR Email LIKE '%".$search."%') AND LeavingDate IS NULL";

}
else
{

  $query = "
   SELECT * FROM employee WHERE LeavingDate IS NULL ORDER BY EmployeeId";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  $output .='<table class="table table-striped">

  <thead>
    <tr>
      <th> Name </th>
      <th> Gender </th>
      <th> Email </th>
      <th> Date of Birth </th>
      <th> Salary </th>
      <th> Date of Start </th>
      <th> Education </th>
      <th> Edit </th>
      <th> Remove </th>
    </tr>
  </thead>

  ';
  while($row = mysqli_fetch_array($result))
 {
   $query1 = "SELECT EducationStatus FROM education WHERE EducationId='".$row["EducationId"]."'";
   $result1 = mysqli_query($connect, $query1) or die (mysqli_error());
   $rowedu = mysqli_fetch_assoc($result1);

   $output .= '
   <tr>
   <td>'.$row["Name"].'</td>
   <td>'.$row["Gender"].'</td>
   <td>'.$row["Email"].'</td>
   <td>'.$row["DOB"].'</td>
   <td>'.$row["Salary"].'</td>
   <td>'.$row["StartingDate"].'</td>
   <td>'.$rowedu["EducationStatus"].'</td>


    <td>

        <a href="employee_update.php?id='.$row["EmployeeId"].'">
         <button type="button" class="btn btn-gradient-dark btn-icon-text"> Edit <i class="mdi mdi-account-edit btn-icon-append"></i>
           </button></a>
            </td>
               <td>
          <a href="employee.php?id='.$row["EmployeeId"].'"onclick="return confirmDel();">
          <button type="button" class="btn btn-danger btn-icon-text"> Remove <i class="mdi mdi-delete btn-icon-append"></i>
            </button></a> <?php
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
