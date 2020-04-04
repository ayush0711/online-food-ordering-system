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
if(isset($_GET['msg']))
{
	$loginmsg=$_GET['msg'];
}
else
{
	$loginmsg="";
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

