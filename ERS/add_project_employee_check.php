<?php include "db_conn.php";



if(isset($_POST['submit'])){

  $projectid = $_POST['update_id'];

    if(!empty($_POST['lang'])) {
        foreach($_POST['lang'] as $value){
          $qry = $conn->query("UPDATE employee SET ProjectId='$projectid' WHERE EmployeeId = '$value'");
        }
    }
    if($qry){
        header('Location:home.php');
      }else{
        header('Location:home.php?Error');
      }

}

 ?>
