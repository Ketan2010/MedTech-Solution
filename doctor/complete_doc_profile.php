<?php
  // check authentication
  session_start();
  if($_SESSION['email']==true){
    include('../connection/db.php');
    $dmail= $_SESSION['email'];
    $query2 =  mysqli_query($conn,"select * from doctor_register where doc_mail='$dmail'");
    $row2 = mysqli_fetch_array($query2);
    $dr = $row2['doc_name'];
    $did = $row2['doc_id'];
  }else{
    header('location:doctor_login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>MedTech Solution</title>
<?php include('../widgets/all_links.php'); ?>
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
<?php include('doc_navbar.php');?>
<!-- vertical navbar for patient part -->
<?php include('doc_vertical_nav.php');?>


<div style ="margin-top:-50px" class="main">

<section class="home">
<h2 style="color:#a6d9fc" >Hello Dr.<?php echo $dr?>, Complete your profile</h2>
<div class="card-body">
<form method="post" action="complete_doc_profile.php" name="doctor_account"> 

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
						<input class="inputs"  onchange="age_calculate()" id="doc_dob" type="date" name="doc_dob" required/>
					</td>
				</tr>
				<tr>
					<td>
						<label>Age :</label>
					</td>
					<td>
						<input class="inputs"  id="doc_age" type="text" name="doc_age"  />
					</td>
				</tr>
				
				<tr>
					<td>
						<label>Contact No :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_contact" size="30" placeholder="Contact Number" required/>
					</td>
				</tr>
                <tr>
					<td>
						<label>Designation :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_designatn" placeholder="Cardiologis, Audiologist etc" required />
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
						<label>Education :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_edu" placeholder="BDS, MBBS, BAMS etc"  required/>
					</td>
				</tr>
                <tr>
					<td>
						<label>Experience(in years) :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_experience" placeholder="your experience"  required/>
					</td>
				</tr>
                <tr>
					<td>
						<label>Hospital Name :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_hospital_name" placeholder="Hospital Name"  />
					</td>
				</tr>
                <tr>
					<td>
						<label>Hospital Address :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="doc_hospital_add" placeholder="Hospital Address"  />
					</td>
				</tr>
				
		    </table>
            <input class="bigb" id="submit" value="Submit" name="submit" type="submit" >
     
        </div>
        
     </div>  
     </form>
</div>

</section>
</div>

</body>
<!-- auto age calculator -->
<script>
        function age_calculate(){
        var today = new Date();
        var now_yr = today.getFullYear();

        var dob= new Date(document.getElementById('doc_dob').value);
        var dob_yr = dob.getFullYear();
        var age = now_yr - dob_yr;
        document.getElementById('doc_age').value = age;

        }
    </script>
</html>
<?php 
if(isset($_POST['submit'])) {
    $doc_dob = $_POST['doc_dob'];
    $doc_age = $_POST['doc_age'];
    $doc_contact = $_POST['doc_contact'];
    $doc_designatn = $_POST['doc_designatn'];
    $doc_edu = $_POST['doc_edu'];
    $doc_experience = $_POST['doc_experience'];
    $doc_hospital_name = $_POST['doc_hospital_name'];
    $doc_hospital_add = $_POST['doc_hospital_add'];
    	
    $query = mysqli_query($conn,"insert into doc_profile(doc_id,doc_dob,doc_age,doc_contact,doc_designatn,doc_experience,doc_edu,doc_hospital_name,doc_hospital_add)values('$did','$doc_dob','$doc_age','$doc_contact','$doc_designatn','$doc_experience','$doc_edu','$doc_hospital_name','$doc_hospital_add')");
    var_dump($query);
    if($query){
        echo "<script>alert('Profile Completed Successfully!')</script>";
        echo "<script>window.location = 'doc_profile.php'</script>";

    } else {
      echo "<script>alert('Something went wrong, please register again!')</script>";
    }
  } 

?>
