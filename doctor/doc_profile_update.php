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
<?php include('doc_navbar.php');?>
<!-- vertical navbar for patient part -->
<?php include('doc_vertical_nav.php');?>


<div style ="margin-top:-50px" class="main">

<section class="home">
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
						<label>Contact No :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="pat_add" size="30" placeholder="Contact Number" />
					</td>
				</tr>
                <tr>
					<td>
						<label>Specialization :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_specializn" placeholder="Cardiology, Oncology etc"  />
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
						<input class="inputs"  type="text" name="doc_design" placeholder="Cardiologis, Audiologist etc"  />
					</td>
				</tr>
                <tr>
					<td>
						<label>Education :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_edu" placeholder="BDS, MBBS, BAMS etc"  />
					</td>
				</tr>
                <tr>
					<td>
						<label>Experience(in years) :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_experience" placeholder="your experience"  />
					</td>
				</tr>
                <tr>
					<td>
						<label>Hospital Name :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="hospital_name" placeholder="Hospital Name"  />
					</td>
				</tr>
                <tr>
					<td>
						<label>Hospital Address :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="hospital_address" placeholder="Hospital Address"  />
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

