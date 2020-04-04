<?php
session_start();
include("connection.php");
extract($_REQUEST);
if(isset($_SESSION['id']))
{
if(!empty($_GET['food_id']))
{
	$food_id=$_GET['food_id'];
	$query=mysqli_query($con,"select * from tbfood   where food_id='$food_id'");
if(mysqli_num_rows($query))
{   
	 $row=mysqli_fetch_array($query);
     $rfoodname=$row['foodname'];
     $rcost=$row['cost'];
     $rcuisines=$row['cuisines'];
     $rpaymentmode=$row['paymentmode'];
     $rfldimageold=$row['fldimage'];
	 $em=$_SESSION['id'];
	
}
else
{
	header("location:food.php");
}
    


	
}
else
{
	
	header("location:food.php");
	
	
}
}
else
{
	header("location:vendor_login.php");
}
if(isset($update))
{
   if(!empty($_SESSION['id']))	
   {
    $paymentmode=implode(",",$chk);
    $img_name=$_FILES['food_pic']['name'];
    
    
    if(!empty($chk)) 
	{
		if(empty($img_name))
			
	       {
		          $paymentmode=implode(",",$chk);
	              if(mysqli_query($con,"update  tbfood  set foodname='$food_name',cost='$cost',cuisines='$cuisines',paymentmode='$paymentmode' where food_id='$food_id'"))
	   
	                {
						header("location:update_food.php?food_id=$food_id");
		              //echo "update with old pic";
		              //move_uploaded_file($_FILES['food_pic']['tmp_name'],"../image/restaurant/$em/foodimages/".$_FILES['food_pic']['name']);
	                 }
	              else{
		               echo "failed";
	                  }
	        }
			
			
	
	     else
		 {
			     $paymentmode=implode(",",$chk);
			     echo $food_name."<br>";
			     echo $cost."<br>";
			     echo $cuisines."<br>";
			     echo $paymentmode."<br>";
			     echo $img_name."<br>";
	             if(mysqli_query($con,"update  tbfood  set foodname='$food_name',cost='$cost',cuisines='$cuisines',paymentmode='$paymentmode', fldimage='$img_name' where food_id='$food_id'"))
	
	                {
		             echo "update with new pic";
		             move_uploaded_file($_FILES['food_pic']['tmp_name'],"image/restaurant/$em/foodimages/".$_FILES['food_pic']['name']);
	                 unlink("image/restaurant/$em/foodimages/$rfldimageold");
					 header("location:update_food.php?food_id=$food_id");
					}
				 else
				 {
					 echo "failed to upload new pic";
				}					 
		 }
	
	}
	
	else
	{
		
		
	
      $paymessage="please select a payment mode";
      

  
    }
   }
   else
   {
	   header("location:vendor_login.php");
   }
}
if(isset($logout))
{
	session_destroy();
	header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <style>
		ul li{}
		ul li a {color:white;padding:40px; }
		ul li a:hover {color:white;}
	 </style>

</head>

