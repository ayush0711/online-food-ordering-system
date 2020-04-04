<?php
session_start();
include("../connection.php");
extract($_REQUEST);
if(isset($_GET['product']))
{
	$product_id= $_GET['product'];
}
else
{
	$product_id= "";
}

if(isset($login))
{
	$query=mysqli_query($con,"select * from tblcustomer where fld_email='$email' && password='$password'");
    if($row=mysqli_fetch_array($query))
	{
		$customer_email =$row['fld_email'];
		$_SESSION['cust_id']=$customer_email;
		if(!empty($customer_email && $product_id))
		{
			 //$_SESSION['product']=$product_id;
			echo $_SESSION['cust_id']=$customer_email;
			
			 header("location:cart.php?product=$product_id");
			
		}
		else
		{
		header("location:../index.php");
		 $_SESSION['product']=$product_id;
		 $_SESSION['cust_id'];
		}
		 
	}
	else
	{
		$ermsg="invalid Details";
	}
}

if(isset($register))
{
	$query=mysqli_query($con,"select * from tblcustomer where fld_email='$email'");
	$row=mysqli_num_rows($query);
	if($row)
	{
		$ermsg2="Email alredy registered with us";
		
	}
	else
	{
		if(mysqli_query($con,"insert into tblcustomer (fld_name,fld_email,password,fld_mobile) values('$name','$email','$password','$mobile')"))
    {
		$_SESSION['cust_id']=$email;
		if(!empty($customer_email && $product_id))
		{
			$_SESSION['cust_id']=$customer_email;
			header("location:cart.php?product='$product_id'");
			
		}
		else
		{
			$_SESSION['cust_id']=$email;
			header("location:../index.php");
		}
		
		
	}
	else
	{
		echo "fail";
		echo $name;
		echo $email;
		echo $password;
		echo $mobile;
	}
	}
	
}
 
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
    <title>Material Login Form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		
		<style>
		ul li{}
		ul li a {color:white;padding:40px; }
		ul li a:hover {color:white;}
		</style>
</head>

