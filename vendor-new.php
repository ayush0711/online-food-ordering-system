<?php
session_start();
include("connection.php");
extract($_REQUEST);
    if(isset($_SESSION['id']))
{
	header("location:food.php");
}

	if(isset($register))
     {
	$sql=mysqli_query($con,"select * from tblvendor where fld_email='$email'");
    if(mysqli_num_rows($sql))
	{
	  $email_error="This Email Id is laready registered with us";
	}
	else
	{
	$logo=$_FILES['logo']['name'];
	$sql=mysqli_query($con,"insert into tblvendor 
	(fld_name	,fld_email,fld_password,fld_mob,fld_phone,fld_address,fld_logo)
       	values('$r_name','$email','$pswd','$mob','$phone','$address','$logo')");
	
    if($sql)
	{
	mkdir("image/restaurant");
	mkdir("image/restaurant/$email");
	
	move_uploaded_file($_FILES['logo']['tmp_name'],"image/restaurant/$email/".$_FILES['logo']['name']);
	}
	$_SESSION['id']=$email;
	
	header("location:food.php");
	
	}
  }
	
	
  
?>

