<?php
  // check authentication
  session_start();
  if($_SESSION['pat_email']==true){
    include('../connection/db.php');
    $pmail= $_SESSION['pat_email'];
    $query2 =  mysqli_query($conn,"select * from pat_register,pat_login where pat_register.pat_id=pat_login.pat_id and pat_email='$pmail'");
    $row2 = mysqli_fetch_array($query2);
    $pt = $row2['pat_name'];
	$pid = $row2['pat_id'];
  }else{
    header('location:patient_login.php');
  }
?>
<?php
	include('../connection/db.php');
	
	$query3=mysqli_query($conn, "select * from pat_health_info where pat_id='$pid' ");
	$row3 = mysqli_fetch_array($query3);
	$query4=mysqli_query($conn, "select * from pat_profile where pat_id='$pid' ");
	$row4 = mysqli_fetch_array($query4);
	$pat_dob = $row4['pat_dob'];
    $pat_age = $row4['pat_age'];
    $pat_address = $row4['pat_address'];
    $pat_contact = $row4['pat_contact'];
    $chest_pain = $row3['chest_pain'];
    $short_breath = $row3['short_breath'];
    $diabetes = $row3['diabetes'];
    $bp = $row3['bp'];
    $alcohol = $row3['alcohol'];
    $smoke = $row3['smoke'];
    $stress = $row3['stress'];
    $exercise = $row3['exercise'];

	
	
?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>MedTech Solution</title>
<?php include('..\widgets\all_links.php'); ?>
<link href="../stylesheet/styleme.css" rel="stylesheet" type="text/css" media="screen, projection"/>

<style>

.card-body{
	padding-bottom:4%;
	margin:2% 2%;
	border-radius:10px;
    width:auto;
	}
.inputs{
		width:auto;
		border: 2px solid dodgerBlue;
		border-radius: 8px;
		margin: 8px 0px;
		padding:8px;
		box-sizing:border-box;
		outline:none;
		
	}
	
	.inputs:focus{
		border-color: #0066cc;
		box-shadow:0 0 8px 0 #0066cc;
	}

	.Button a{
	border-radius:20px;
	font-family: "Amiri";
    background: #3498db;
    color: #fff;
	font-size:25px;
	padding:10px 60px;
	border: none;
	text-align:center;
	text-decoration: none;
	margin-left:40%;

	}	
	
	.Button a:hover {
    background: #088bf0;
    color: #fff;
	}
	
	label{
			font-family:"Amiri";
			color:#088bf0;
			font-size:19px;
	}
	
	.bigb {
	background-color:#4c86eb;
	border-radius:28px;
	border:1px solid #4e6096;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:10px 36px;
	text-decoration:none;
		margin-left:40%;
	text-shadow:0px 1px 0px #7791d4;
}
.bigb:hover {
	background-color:#579df2;
}
.bigb:active {
	position:relative;
	top:1px;
}

	

</style>


</head>
<body>
<!-- navbar for patient part -->
<?php include('pat_navbar.php');?>
<!--	 vertical navbar for patient part -->
<?php include('pat_vertical_nav.php');?>


<div style ="margin-top:-50px" class="main">
<form method="post" action="pat_profile_update.php" name="pat_profile_update"> 
<section class="home">
<h2 style="color:#a6d9fc" >Update Profile</h2>
<div class="card-body">
    <div class="flex-parent">
	
		<div class="boxone">
			<table>
				<tr>
					<td colspan="2">
					<h1 style="text-align:center;font-family:Amiri;color:#088bf0;font-size:30px;">Personal Information</h1>
					</td>
				</tr>
				
				
				<tr>
					<td>
						<label>Date of Birth :</label>
					</td>
					<td>
						<input class="inputs"  type="date" name="pat_dob" value="<?php echo $pat_dob ; ?>"/>
					</td>
				</tr>
				<tr>
					<td>
						<label>Age :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="pat_age" value="<?php echo $pat_age ; ?>"  />
					</td>
				</tr>
				<tr>
					<td>
						<label>Address :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="pat_address" size="30" placeholder="Residential Address" value="<?php echo $pat_address; ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label>Contact No :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="pat_contact" size="30" placeholder="Contact Number" value="<?php echo $pat_contact ; ?>"/>
					</td>
				</tr>
				
				</table>
				
		</div>	
		
        <!-- i m doctor -->
        <div class="boxone">
            <table>
				<tr>
					<td colspan="2">
					<h1 style="text-align:center;font-family:Amiri;color:#088bf0;font-size:30px;">Health Information</h1>
					</td>
				</tr>
				
				<tr >
					<td >
						<label>Chest Pain or Discomfort :</label>
					</td>
					<td>
						<input  class="inputs" type="radio" id="yes" value="yes" name="chest_pain" style="padding-left:10px;margin:0px 0px;" <?php echo ($chest_pain=='yes'?' checked=checked':''); ?>>
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="chest_pain" <?php echo ($chest_pain=='no'?' checked=checked':''); ?>>								
						<label>No </label>

					</td>
				</tr>		
				<tr ><td ></td><td></td></tr>
				<tr>
					<td>
						<label>Shortness of Breath :</label>
					</td>
					<td>
						<input  class="inputs" type="radio" id="yes" value="yes" name="short_breath" style="padding-left:10px;margin:0px 0px;" <?php echo ($short_breath=='yes'?' checked=checked':''); ?>>
						<label>Yes </label>
						<input  class="inputs" type="radio" id="no" value="no" name="short_breath" <?php echo ($short_breath=='no'?' checked=checked':''); ?>>								
						<label>No </label>

					</td>
				</tr>
				<tr ><td ></td><td></td></tr>
				<tr>
					<td>
						<label>Diabetes :</label>
					</td>
					<td>
						<input class="inputs" type="radio"  value="yes" name="diabetes" style="padding-left:10px;margin:0px 0px;" <?php echo ($diabetes=='yes'?' checked=checked':''); ?>>
						<label>Yes </label>
						<input class="inputs" type="radio"  value="no" name="diabetes" <?php echo ($diabetes=='no'?' checked=checked':''); ?>>								
						<label>No </label>
					</td>
				</tr>
				<tr ><td ></td><td></td></tr>
				<tr ><td ></td><td></td></tr>
				<tr>
					<td>
						<label>Blood Pressure:</label>
					</td>
					<td>
						<input class="inputs" type="radio" id="yes" value="yes" name="bp" style="padding-left:10px;margin:0px 0px;" <?php echo ($bp=='yes'?' checked=checked':''); ?>>
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="bp" <?php echo ($bp=='no'?' checked=checked':''); ?>>								
						<label>No </label>
					</td>
				</tr>
				
				
				<tr>
					<td>
						<label>Alcohol :</label>
					</td>
					<td>
						<input class="inputs" type="radio" id="yes" value="yes" name="alcohol" style="padding-left:10px;margin:0px 0px;" <?php echo ($alcohol=='yes'?' checked=checked':''); ?>>
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="alcohol" <?php echo ($alcohol=='no'?' checked=checked':''); ?>>								
						<label>No </label>

					</td>
				</tr>
				
				<tr>
					<td>
						<label>Smoking :</label>
					</td>
					<td>
						<input class="inputs" type="radio" id="yes" value="yes" name="smoke" style="padding-left:10px;margin:0px 0px;" <?php echo ($smoke=='yes'?' checked=checked':''); ?>>
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="smoke" <?php echo ($smoke=='no'?' checked=checked':''); ?>>								
						<label>No </label>

					</td>
				</tr>
				
				<tr>
					<td>
						<label>Stress:</label>
					</td>
					<td>
						<input class="inputs" type="radio" id="yes" value="yes" name="stress" style="padding-left:10px;margin:0px 0px;" <?php echo ($stress=='yes'?' checked=checked':''); ?>>
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="stress" <?php echo ($stress=='no'?' checked=checked':''); ?>>								
						<label>No </label>

					</td>
				</tr>
				
				<tr>
					<td>
						<label>Exercise :</label>
					</td>
					<td>
						<input class="inputs" type="radio" id="yes" value="yes" name="exercise" style="padding-left:10px;margin:0px 0px;" <?php echo ($exercise=='yes'?' checked=checked':''); ?>/>
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="exercise" <?php echo ($exercise=='no'?' checked=checked':''); ?>/>								
						<label>No </label>
					</td>
				</tr>
				
				</table>
        </div>
        
     </div>   
</div>
<input class="bigb" id="submit" value="Update" name="submit" type="submit" >
<!--<p class="Button"><a href="#">Update</a></p>-->
</section>
</form>
</div>

</body>
</html>
<?php
   include('../connection/db.php');

   if (isset($_POST['submit']))
   {
	$query_update1="UPDATE pat_profile SET pat_dob='$_POST[pat_dob]' ,pat_age='$_POST[pat_age]' ,pat_address='$_POST[pat_address]' ,pat_contact='$_POST[pat_contact]' WHERE  pat_id='$pid'";
	$query_update2="UPDATE pat_health_info SET chest_pain='$_POST[chest_pain]'  ,short_breath='$_POST[short_breath]' ,diabetes='$_POST[diabetes]' ,bp='$_POST[bp]' ,alcohol='$_POST[alcohol]' ,smoke='$_POST[smoke]' ,stress='$_POST[stress]' ,exercise='$_POST[exercise]'  WHERE pat_id='$pid' ";
	
    if (mysqli_query($conn , $query_update1) and  mysqli_query($conn , $query_update2))
	{
		echo "<script>alert('Profile is updated successful');
		      window.location.href='pat_profile_update.php';
			  </script>";
	}
	else
	{
		echo "<script>alert('Something went wrong , Please try again!');</script>";
	}
	      
   }

?>