<?php
include "db_conn.php";
session_start();


if(isset($_GET['id'])) {
  $projid=$_GET['id'];

    $date = date('Y-m-d H:i:s');
    $qry = mysqli_query($conn,"UPDATE project SET FinishDate = '$date',status = 0 WHERE ProjectId =$projid");

    if($qry){
        header('Location:project.php');
      }else{
        header('Location:project.php?Error');
      }


}








 ?>
