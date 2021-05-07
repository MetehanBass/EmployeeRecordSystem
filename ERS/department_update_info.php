<?php
include "db_conn.php";

  $id = $_POST['update_id'];

  $query4 = "SELECT * FROM department where DepartmentId='".$id."'";
  $result = mysqli_query($conn, $query4) or die ( mysqli_error());
  $row = mysqli_fetch_assoc($result);

  $deptname = $_POST['DeptName'];
  $location = $_POST['Location'];


  $querydept = "UPDATE department SET DeptName = '$deptname',Location ='$location' WHERE DepartmentId = '".$id."'";
  $query_run2 = mysqli_query($conn,$querydept);



    if($querydept){
        header('Location:department_update.php?id='.$id.'');
      }else{
        header('Location:employee_update.php?Error');
      }





 ?>
