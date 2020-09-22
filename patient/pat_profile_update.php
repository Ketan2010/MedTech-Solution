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
	
	

</style>


</head>
<body>
<!-- navbar for patient part -->
<?php include('pat_navbar.php');?>
<!-- vertical navbar for patient part -->
<?php include('pat_vertical_nav.php');?>


<div style ="margin-top:-50px" class="main">

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
						<input class="inputs"  type="date" name="pat_dob" />
					</td>
				</tr>
				<tr>
					<td>
						<label>Age :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="pat_age"  />
					</td>
				</tr>
				<tr>
					<td>
						<label>Address :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="pat_add" size="30" placeholder="Residential Address" />
					</td>
				</tr>
				<tr>
					<td>
						<label>Contact No :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="pat_add" size="30" placeholder="Contact Number" />
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
						<input  class="inputs" type="radio" id="yes" value="yes" name="cpain" style="padding-left:10px;margin:0px 0px;">
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="cpain">								
						<label>No </label>

					</td>
				</tr>		
				<tr ><td ></td><td></td></tr>
				<tr>
					<td>
						<label>Shortness of Breath :</label>
					</td>
					<td>
						<input  class="inputs" type="radio" id="yes" value="yes" name="sbreath" style="padding-left:10px;margin:0px 0px;">
						<label>Yes </label>
						<input  class="inputs" type="radio" id="no" value="no" name="sbreath">								
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
						<input class="inputs" type="radio" id="yes" value="yes" name="bloodp" style="padding-left:10px;margin:0px 0px;">
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="bloodp">								
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
						<input class="inputs" type="radio" id="yes" value="yes" name="smoking" style="padding-left:10px;margin:0px 0px;">
						<label>Yes </label>
						<input class="inputs" type="radio" id="no" value="no" name="smoking">								
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
        </div>
        
     </div>   
</div>
<p class="Button"><a href="#">Update</a></p>
</section>
</div>

</body>
</html>

