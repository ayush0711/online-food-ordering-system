<?php
session_start();
include("connection.php");
extract($_REQUEST);
if(isset($_SESSION['id']))
{
 $id=$_SESSION['id'];
 $vq=mysqli_query($con,"select * from tblvendor where fld_email='$id'");
 $vr=mysqli_fetch_array($vq);
 $vrid=$vr['fldvendor_id'];
}

if(!isset($_SESSION['id']))
{
	header("location:vendor_login.php?msg=Please Login To continue");
}
else
{
$query=mysqli_query($con,"select * from tblvendor   where fld_email='$id'");
if(mysqli_num_rows($query))
{   if(!file_exists("image/restaurant/".$id."/foodimages"))
	{
		$dir=mkdir("image/restaurant/".$id."/foodimages");
	}
	$row=mysqli_fetch_array($query);
    $v_id=$row['fldvendor_id'];
}
else
{
	
	header("location:index.php");
	
	
}
}


if(isset($add))
{   if(isset($_SESSION['id']))
	{
    $img_name=$_FILES['food_pic']['name'];
    if(!empty($chk)) 
	{
	$paymentmode=implode(",",$chk);
	if(mysqli_query($con,"insert into tbfood(fldvendor_id,foodname,cost,cuisines,paymentmode,fldimage) values
	
	('$v_id','$food_name','$cost','$cuisines','$paymentmode','$img_name')"))
	{
		move_uploaded_file($_FILES['food_pic']['tmp_name'],"image/restaurant/$id/foodimages/".$_FILES['food_pic']['name']);
	}
	else{
		echo "failed";
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
if(isset($upd_account))
				{
					
					//echo $fn;
					//echo $emm;
					//echo $add;
					if(mysqlI_query($con,"update tblvendor set fld_name='$fn',fld_email='$emm',fld_address='$add',fld_mob='$mob',fld_password='$pwsd' where fld_email='$id'"))
				   {
						 header("location:infoUpdate.php");
					}
			  }
			  if(isset($upd_logo))
			  {
				  if(isset($_SESSION['id']))
				  {
				  $log_img=mysqli_query($con,"select * from tblvendor where fld_email='$id'");
                  $log_img_row=mysqli_fetch_array($log_img);
				  $old_logo=$log_img_row['fld_logo'];
				  $new_img_name=$_FILES['logo_pic']['name'];
				  
				  if(mysqli_query($con,"update tblvendor set fld_logo='$new_img_name' where fld_email='$id'"))
				  {
					  unlink("image/restaurant/$id/$old_logo");
					  move_uploaded_file($_FILES['logo_pic']['tmp_name'],"image/restaurant/$id/".$_FILES['logo_pic']['name']);
				      
					  header("location:update_food.php");
					  
				  }
			  }
			  else
			  {
				  header("location:vendor_login.php?msg=Please Login To continue");
			  }
			  }
			  
?>