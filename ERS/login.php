<?php
session_start();
include "db_conn.php";

if(isset($_POST['submit'])){
	if(empty($_POST['username']) || empty($_POST['pass'])) {
		header("Location:index.php?error=Username and password required.");

	}
	else{
		$uname= $_POST['username'];
		$pass = $_POST['pass'];

		$db=mysqli_select_db($conn,"employeemanagementsystem");
		$query =mysqli_query($conn,"SELECT * FROM admin WHERE Password='$pass' AND Username='$uname'");

		$rows = mysqli_num_rows($query);
		$qry = mysqli_fetch_array($query);
		if($rows == 1){
			$_SESSION['username']=$uname;
			$_SESSION['id']=$qry['AdminId'];
			$_SESSION['name']=$qry['AdminName'];

			header("Location:home.php");
			exit();
		}
		else{
			header("Location:index.php?error=Invalid username or password.");
			exit();
		}
		mysqli_close($conn);
	}
}
?>
