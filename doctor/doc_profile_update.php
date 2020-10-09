<?php
  // check authentication
  session_start();
  if($_SESSION['email']==true){
    include('../connection/db.php');
    $dmail= $_SESSION['email'];
    $query1 =  mysqli_query($conn,"select * from doctor_register where doc_mail='$dmail'");
    $row2 = mysqli_fetch_array($query1);
    $dr = $row2['doc_name'];
    $did = $row2['doc_id'];
  }else{
    header('location:doctor_login.php');
  }
?>
<?php
  $result =  mysqli_query($conn,"select * from doc_profile where doc_id= '$did'");
  $row1= mysqli_fetch_array($result);
?>
<?php  
    if (isset($_POST['submit'])){
 	
    $result = "UPDATE doc_profile SET doc_dob='$_POST[doc_dob]',doc_age='$_POST[doc_age]',doc_contact='$_POST[doc_contact]',doc_designatn='$_POST[doc_designatn]' ,doc_experience='$_POST[doc_experience]',doc_edu='$_POST[doc_edu]',doc_hospital_name='$_POST[doc_hospital_name]',doc_hospital_add='$_POST[doc_hospital_add]'  WHERE doc_id='$did' ";
 
   if(mysqli_query($conn,$result )){ 
        
        echo "<script>alert('Profile is successfully updated!');
		window.location.href='doc_profile_update.php';
		</script>";
	
    } 
	else {
      echo "<script>alert('Something went wrong, please try again!')</script>";
    } 
 
	}
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
<?php include('doc_navbar.php');?>
<!-- vertical navbar for patient part -->
<?php include('doc_vertical_nav.php');?>


<div style ="margin-top:-50px" class="main">

<section class="home">
<form method="post" action="doc_profile_update.php" name="doc_profile_update"> 
<h2 style="color:#a6d9fc" >Update Profile</h2>
<div class="card-body">
    <div class="flex-parent">
	
		<div class="boxone">
			<table>
				<tr>
					<td colspan="2">
					<h1 style="text-align:center;font-family:Amiri;color:#088bf0;font-size:30px;">General Information</h1>
					</td>
				</tr>
				
				
				<tr>
					<td>
						<label>Date of Birth :</label>
					</td>
					<td>
						<input class="inputs"  type="date" name="doc_dob" value="<?php echo $row1['doc_dob'] ; ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label>Age :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_age"  placeholder="Age" value="<?php echo $row1['doc_age']; ?>"  />
					</td>
				</tr>
				
				<tr>
					<td>
						<label>Contact No :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_contact" size="30" placeholder="Contact Number" value="<?php echo $row1['doc_contact']; ?>" />
					</td>
				</tr>
                <tr>
					<td>
						<label>Specialization :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_designatn" placeholder="Cardiology, Oncology etc"  value="<?php echo $row1['doc_designatn']; ?>" />
					</td>
				</tr>
				
			</table>
				
		</div>	
		
        <!-- i m doctor -->
        <div class="boxone">
        <table>
				<tr>
					<td colspan="2">
					<h1 style="text-align:center;font-family:Amiri;color:#088bf0;font-size:30px;">Other Information</h1>
					</td>
				</tr>
				<tr>
					<td>
						<label>Designation :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_designatn" placeholder="Cardiologis, Audiologist etc" value="<?php echo $row1['doc_designatn']; ?>" />
					</td>
				</tr>
                <tr>
					<td>
						<label>Education :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_edu" placeholder="BDS, MBBS, BAMS etc" value="<?php echo $row1['doc_edu']; ?>" />
					</td>
				</tr>
                <tr>
					<td>
						<label>Experience(in years) :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_experience" placeholder="your experience"  value="<?php echo $row1['doc_experience']; ?>" />
					</td>
				</tr>
                <tr>
					<td>
						<label>Hospital Name :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_hospital_name" placeholder="Hospital Name"  value="<?php echo $row1['doc_hospital_name']; ?>" />
					</td>
				</tr>
                <tr>
					<td>
						<label>Hospital Address :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_hospital_add" placeholder="Hospital Address" value="<?php echo $row1['doc_hospital_add']; ?>" />
					</td>
				</tr>
				
				
				
		    </table>
        </div>
        
     </div>   
</div>

<!--<p class="Button" id="submit" name="submit"><a href="#">Update</a></p>-->
<input class="bigb" id="submit" value="Update" name="submit" type="submit" >
</form>
</section>
</div>

</body>
</html>

<!--
include('../connection/db.php');
  $doc_dob=$_POST['doc_dob'];
  $doc_age=$_POST['doc_age'];
  $doc_contact=$_POST['doc_contact'];
  $doc_designatn=$_POST['doc_designatn'];
  $doc_experience=$_POST['doc_experience'];
  $doc_edu=$_POST['doc_edu'];
  $doc_hospital_name=$_POST['doc_hospital_name'];
  $doc_hospital_add=$_POST['doc_hospital_add'];
 -->
