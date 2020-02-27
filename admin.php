<?php
session_start();
include("connection.php");
extract($_REQUEST);
  if(isset($login))
  {
	$sql=mysqli_query($con,"select * from tbadmin where fld_username='$username' && fld_password='$pswd' ");
    if(mysqli_num_rows($sql))
	{
	 $_SESSION['admin']=$username;
	 
	header('location:dashboard.php');
    	
	}
	else
	{
	$admin_login_error="Invalid Username or Password";	
	}
  }
   
?>
