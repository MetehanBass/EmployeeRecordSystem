<?php
include "db_conn.php";

  $id = $_POST['update_id'];

  $query4 = "SELECT * FROM employee where EmployeeId='".$id."'";
  $result = mysqli_query($conn, $query4) or die ( mysqli_error());
  $row = mysqli_fetch_assoc($result);

  $phoneId = $row['PhoneId'];

  $name = $_POST['Name'];
  $gender = $_POST['Gender'];
  $DOB = $_POST['DOB'];
  $salary = $_POST['Salary'];

  $deptname = $_POST['DeptName'];

  $query5 ="SELECT * FROM department where DeptName = '".$deptname."'";
  $result2 = mysqli_query($conn, $query5) or die ( mysqli_error());
  $row2 = mysqli_fetch_assoc($result2);

  $deptid = $row2['DepartmentId'];

  $phonenum = $_POST['Phonenum'];
  $country = $_POST['Country'];
  $city = $_POST['City'];
  $street = $_POST['Street'];
  $postcode = $_POST['Postcode'];

  $queryphone = "UPDATE phone SET PhoneNumber = '$phonenum' WHERE PhoneId= '".$phoneId."'";
  $query_run1 = mysqli_query($conn,$queryphone);

  $querydept = "UPDATE employee SET DepartmentId = '$deptid' WHERE EmployeeId= '".$id."'";
  $query_run2 = mysqli_query($conn,$querydept);

  $queryaddress = "UPDATE address SET Country = '$country',City ='$city',Street ='$street',Postcode='$postcode' WHERE AddressId='".$row['AddressId']."'";
  $query_run3 = mysqli_query($conn,$queryaddress);

  $query = "UPDATE employee SET Name = '$name', Gender = '$gender', DOB = '$DOB', Salary = '$salary' WHERE EmployeeId= '".$id."'";
  $query_run = mysqli_query($conn,$query);

    if($query && $queryphone){
        header('Location:employee_update.php?id='.$id.'');
      }else{
        header('Location:employee_update.php?Error');
      }





 ?>
