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
<?php

include('../connection/db.php');
$query =  mysqli_query($conn,"select * from doctor_register where doc_id= '$did'");
$query1 =  mysqli_query($conn,"select * from doc_profile where doc_id= '$did'");

while($row= mysqli_fetch_array($query)) {
  $doc_name = $row['doc_name'];
  $doc_specializn = $row['doc_specializn'];
  $doc_gender = $row['doc_gender'];
  $doc_mail = $row['doc_mail'];
  $doc_rating = $row['ratings'];
}
while($row1= mysqli_fetch_array($query1)) {
 
    $doc_dob = $row1['doc_dob'];
    $doc_age = $row1['doc_age'];
    $doc_contact = $row1['doc_contact'];
    $doc_designatn = $row1['doc_designatn'];
    $doc_experience = $row1['doc_experience'];
    $doc_edu = $row1['doc_edu'];
    $doc_hospital_name = $row1['doc_hospital_name'];
    $doc_hospital_add = $row1['doc_hospital_add'];
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
	
	table {
  font-family: arial, sans-serif;
  background-color: black;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #7a7b7d;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: black;
}
.checked {
  color: orange;
}
</style>


</head>
<body>
<!-- navbar for patient part -->
<?php include('doc_navbar.php');?>
<!-- vertical navbar for patient part -->
<?php include('doc_vertical_nav.php');?>


<div class="main">
        

    <div style="display: flex;justify-content: space-between;">
        <h2 style="color:#a6d9fc" >Your Profile</h2>
        <p style="margin: 0 40 0 700px;" class='myButton' >
            <a  href="doc_profile_update.php"><span style="font-size:20px; color:white" class="fas fa-user-edit"></span> Edit Profile</a>
        </p>
    </div>

    <section style="margin-top:-40px" class="home">
    <br>
    <h2 style="color:#a6d9fc" >
    Ratings : 
        <span class="fa fa-star <?php echo ($doc_rating>=1)?'checked':'' ?>"></span>
        <span class="fa fa-star <?php echo ($doc_rating>=2)?'checked':'' ?>"></span>
        <span class="fa fa-star <?php echo ($doc_rating>=3)?'checked':'' ?>"></span>
        <span class="fa fa-star <?php echo ($doc_rating>=4)?'checked':'' ?>"></span>
        <span class="fa fa-star <?php echo ($doc_rating>=5)?'checked':'' ?>"></span>
    </h2>
        <div  class="flex-parent">
                
            <div class="boxone">
                <h2 style="color:#a6d9fc" >General Information</h2>
                <table>
                    <tr>
                        <td>Name :</td>
                        <td><?php echo $doc_name?></td>
                    </tr>
                    <tr>
                        <td>Gender :</td>
                        <td><?php echo $doc_gender?></td>
                    </tr>
                    <tr>
                        <td>Date of Birth :</td>
                        <td><?php $dt=date_create($doc_dob); echo date_format($dt,'d/m/Y'); ?></td>
                    </tr>
                    <tr>
                        <td>Age :</td>
                        <td><?php echo $doc_age?></td>
                    </tr>
                    <tr>
                        <td>Contact No :</td>
                        <td><?php echo $doc_contact?></td>
                    </tr>
                    <tr>
                        <td>Email Id :</td>
                        <td><?php echo $doc_mail?></td>
                    </tr>
                </table>
            </div>
                
            <div class="boxone">
                <h2 style="color:#a6d9fc" >Other Information</h2>
                <table>
                    <tr>
                        <td>Designation :</td>
                        <td><?php echo $doc_designatn?></td>
                    </tr>
                    <tr>
                        <td>Specialization :</td>
                        <td><?php echo $doc_specializn?></td>
                    </tr>
                    <tr>
                        <td>Education :</td>
                        <td><?php echo $doc_edu?></td>
                    </tr>
                    <tr>
                        <td>Experience(yrs) :</td>
                        <td><?php echo $doc_experience?></td>
                    </tr>
                    <tr>
                        <td>Hospital Name:</td>
                        <td><?php echo $doc_hospital_name?></td>
                    </tr>
                    <tr>
                        <td>Hospital Address :</td>
                        <td><?php echo $doc_hospital_add?></td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </section>       

</div>

</body>
</html>

