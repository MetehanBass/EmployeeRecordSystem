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
  OR Email LIKE '%".$search."%') AND LeavingDate IS NOT NULL";
}
else
{

$query = "
 SELECT * FROM employee WHERE LeavingDate IS NOT NULL ORDER BY EmployeeId";
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
      <th> Leaving Date </th>

    </tr>
  </thead>

  ';
  while($row = mysqli_fetch_array($result))
 {
   $output .= '
   <tr>
   <td>'.$row["Name"].'</td>
   <td>'.$row["Gender"].'</td>
   <td>'.$row["Email"].'</td>
   <td>'.$row["DOB"].'</td>
   <td>'.$row["Salary"].'</td>
   <td>'.$row["StartingDate"].'</td>
   <td>'.$row["LeavingDate"].'</td>

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
