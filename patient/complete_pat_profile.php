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
<!-- vertical navbar for patient part -->
<?php include('pat_vertical_nav.php');?>


<div style ="margin-top:-50px" class="main">

<section class="home">
<h2 style="color:#a6d9fc" >Hello <?php echo $pt?>, Complete your Profile</h2>
<div style="margin: -5% 2%;" class="card-body">
<form method="post" action="complete_pat_profile.php"> 
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
						<input class="inputs" id="pat_dob" onchange="age_calculate()" type="date" name="pat_dob" required/>
					</td>
				</tr>
				<tr>
					<td>
						<label>Age :</label>
					</td>
					<td>
						<input class="inputs" id="pat_age" type="text" name="pat_age"  required/>
					</td>
				</tr>
				<tr>
					<td>
						<label>Address :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="pat_address" size="30" placeholder="Residential Address" required/>
					</td>
				</tr>
				<tr>
					<td>
						<label>Contact No :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="pat_contact" size="30" placeholder="Contact Number" required/>
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
						<input  class="inputs" type="radio" id="yes" value="yes" name="chest_pain" style="padding-left:10px;margin:0px 0px;">
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="chest_pain">								
						<label>No </label>

					</td>
				</tr>		
				<tr ><td ></td><td></td></tr>
				<tr>
					<td>
						<label>Shortness of Breath :</label>
					</td>
					<td>
						<input  class="inputs" type="radio" id="yes" value="yes" name="short_breath" style="padding-left:10px;margin:0px 0px;">
						<label>Yes </label>
						<input  class="inputs" type="radio" id="no" value="no" name="short_breath">								
						<label>No </label>

					</td>
				</tr>
				<tr ><td ></td><td></td></tr>
				<tr>
					<td>
						<label>Diabetes :</label>
					</td>
					<td>
						<input class="inputs" type="radio" id="yes" value="yes" name="diabetes" style="padding-left:10px;margin:0px 0px;">
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="diabetes">								
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
						<input class="inputs" type="radio" id="yes" value="yes" name="bp" style="padding-left:10px;margin:0px 0px;">
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="bp">								
						<label>No </label>
					</td>
				</tr>
				
				
				<tr>
					<td>
						<label>Alcohol :</label>
					</td>
					<td>
						<input class="inputs" type="radio" id="yes" value="yes" name="alcohol" style="padding-left:10px;margin:0px 0px;">
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="alcohol">								
						<label>No </label>

					</td>
				</tr>
				<tr ><td ></td><td></td></tr>
				<tr>
					<td>
						<label>Smoking :</label>
					</td>
					<td>
						<input class="inputs" type="radio" id="yes" value="yes" name="smoke" style="padding-left:10px;margin:0px 0px;">
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="smoke">								
						<label>No </label>

					</td>
				</tr>
				<tr ><td ></td><td></td></tr>
				<tr>
					<td>
						<label>Stress:</label>
					</td>
					<td>
						<input class="inputs" type="radio" id="yes" value="yes" name="stress" style="padding-left:10px;margin:0px 0px;">
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="stress">								
						<label>No </label>

					</td>
				</tr>
				<tr ><td ></td><td></td></tr>
				<tr>
					<td>
						<label>Exercise :</label>
					</td>
					<td>
						<input class="inputs" type="radio" id="yes" value="yes" name="exercise" style="padding-left:10px;margin:0px 0px;">
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="exercise">								
						<label>No </label>
					</td>
				</tr>
				
				</table>
                <input class="bigb" id="submit" value="Submit" name="submit" type="submit" >

        </div>
        
     </div>  
     
</div>

</form> 
</section>
</div>

</body>
</html>
<!-- auto age calculator -->
<script>
        function age_calculate(){
        var today = new Date();
        var now_yr = today.getFullYear();

        var dob= new Date(document.getElementById('pat_dob').value);
        var dob_yr = dob.getFullYear();
        var age = now_yr - dob_yr;
        document.getElementById('pat_age').value = age;

        }
    </script>

<?php 
if(isset($_POST['submit'])) {
    $pat_dob = $_POST['pat_dob'];
    $pat_age = $_POST['pat_age'];
    $pat_address = $_POST['pat_address'];
    $pat_contact = $_POST['pat_contact'];
    $chest_pain = $_POST['chest_pain'];
    $short_breath = $_POST['short_breath'];
    $diabetes = $_POST['diabetes'];
    $bp = $_POST['bp'];
    $alcohol = $_POST['alcohol'];
    $smoke = $_POST['smoke'];
    $stress = $_POST['stress'];
    $exercise = $_POST['exercise'];
    
    	
    $query = mysqli_query($conn,"insert into pat_profile(pat_id,pat_dob,pat_age,pat_address,pat_contact	)values('$pid','$pat_dob','$pat_age','$pat_address','$pat_contact')");
    $query1 = mysqli_query($conn,"insert into pat_health_info(pat_id, chest_pain, short_breath, diabetes, bp, alcohol, smoke, stress, exercise)values('$pid', '$chest_pain', '$short_breath', '$diabetes', '$bp', '$alcohol', '$smoke', '$stress', '$exercise'	)");

    if($query and $query1){
        echo "<script>alert('Profile Completed Successfully!')</script>";
        echo "<script>window.location = 'pat_profile.php'</script>";

    } else {
      echo "<script>alert('Something went wrong, please register again!')</script>";
    }
  } 

?>
