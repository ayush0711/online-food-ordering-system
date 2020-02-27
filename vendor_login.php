<?php
session_start();
include("connection.php");
extract($_REQUEST);
if(isset($_SESSION['id']))
{
	header("location:food.php");
}
  if(isset($login))
  {
	$sql=mysqli_query($con,"select * from tblvendor where fld_email='$username' && fld_password='$pswd' ");
    if(mysqli_num_rows($sql))
	{
	 $_SESSION['id']=$username;
	header('location:food.php');	
	}
	else
	{
	$admin_login_error="Invalid Username or Password";	
	}
  }
   
?>