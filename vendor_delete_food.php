<?php 
session_start();
include('connection.php');
 $idd=$_GET['food_id'];
if(isset($_SESSION['id']))
{
$q=mysqli_query($con,"select tblvendor.fld_name,tbfood.fldimage, tblvendor.fldvendor_id, tblvendor.fld_email from tblvendor inner join tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id where tbfood.food_id='$idd'");
$res=mysqli_fetch_assoc($q);
$e=$res['fld_email'];
$img=$res['fldimage'];

unlink("image/restaurant/$e/foodimages/$img");


if(mysqli_query($con,"delete  from  tbfood where food_id='$idd' "))
{
	
	

    header( "refresh:5;url=food.php" );
 

	
}
else
{
	echo "failed to delete";
}
}
else
{
	header("location:vendor_login.php");
}
?>

<html>
  <head>
     <title>Admin control panel</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <style>
  h1 {
  text-align: center;
  font-size: 60px;
  margin-top: 0px;
}
p {
  text-align: center;
  font-size: 60px;
  margin-top: 0px;
}
  </style>
  
  </head>

  