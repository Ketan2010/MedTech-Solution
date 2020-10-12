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
$pid = $_GET['pid'];
$query =  mysqli_query($conn,"select * from  pat_register where pat_id= '$pid'");
$query1 =  mysqli_query($conn,"select * from pat_profile where pat_id= '$pid'");
$query2 =  mysqli_query($conn,"select * from  pat_login where pat_id= '$pid'");
$query3 =  mysqli_query($conn,"select * from  pat_health_info where pat_id= '$pid'");

while($row= mysqli_fetch_array($query)) {
  $pat_name = $row['pat_name'];
  $pat_gender = $row['pat_gender'];
}
while($row1= mysqli_fetch_array($query1)) {
 
    $pat_dob = $row1['pat_dob'];
    $pat_age = $row1['pat_age'];
    $pat_address = $row1['pat_address'];
    $pat_contact = $row1['pat_contact'];
  }
  $row2= mysqli_fetch_array($query2);
  $pat_mail = $row2['pat_email'];
  while($row3= mysqli_fetch_array($query3)) {
 
    $chest_pain = $row3['chest_pain'];
    $short_breath = $row3['short_breath'];
    $diabetes = $row3['diabetes'];
    $bp = $row3['bp'];
    $alcohol = $row3['alcohol'];
    $smoke = $row3['smoke'];
    $stress = $row3['stress'];
    $exercise = $row3['exercise'];
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

</style>


</head>
<body>
<!-- navbar for patient part -->
<?php include('doc_navbar.php');?>
<!-- vertical navbar for patient part -->
<?php include('doc_vertical_nav.php');?>


<div class="main">
        

    <div style="display: flex;justify-content: space-between;">
        <h2 style="color:#a6d9fc" ><?php echo($pat_gender=='male'?'Mr.':'Mrs.')?><?php echo $pat_name?> Profile</h2>
        <p style="margin: 0 40 0 700px;" class='myButton' >
            <!-- <a  href=""><span style="font-size:20px; color:white" class="fas fa-user-edit"></span> Edit Profile</a> -->
        </p>
    </div>

    <section style="margin-top:-40px" class="home">
        <div class="flex-parent">
                
            <div class="boxone">
                <h2 style="color:#a6d9fc" >General Information</h2>
                <table>
                    <tr>
                        <td>Name :</td>
                        <td><?php echo $pat_name?></td>
                    </tr>
                    <tr>
                        <td>Gender :</td>
                        <td><?php echo $pat_gender?></td>
                    </tr>
                    <tr>
                        <td>Date of Birth :</td>
                        <td><?php $dt=date_create($pat_dob); echo date_format($dt,'d/m/Y'); ?></td>
                    </tr>
                    <tr>
                        <td>Age :</td>
                        <td><?php echo $pat_age?></td>
                    </tr>
                    <tr>
                        <td>Address :</td>
                        <td><?php echo $pat_address?></td>
                    </tr>
                    <tr>
                        <td>Contact No :</td>
                        <td><?php echo $pat_contact?></td>
                    </tr>
                    <tr>
                        <td>Email Id :</td>
                        <td><?php echo $pat_mail?></td>
                    </tr>
                </table>
            </div>
                
            <div class="boxone">
                <h2 style="color:#a6d9fc" >Health Information</h2>
                <table>
                    <tr>
                        <td>Chest Pain / Discomfort :</td>
                        <td><?php echo $chest_pain?></td>
                    </tr>
                    <tr>
                        <td>Shortness of Breath :</td>
                        <td><?php echo $short_breath?></td>
                    </tr>
                    <tr>
                        <td>Diabetes :</td>
                        <td><?php echo $diabetes?></td>
                    </tr>
                    <tr>
                        <td>Blood Pressure:</td>
                        <td><?php echo $bp?></td>
                    </tr>
                    <tr>
                        <td>Alcohol :</td>
                        <td><?php echo $alcohol?></td>
                    </tr>
                    <tr>
                        <td>Smoking :</td>
                        <td><?php echo $smoke?></td>
                    </tr>
                    <tr>
                        <td>Stress:</td>
                        <td><?php echo $stress?></td>
                    </tr>
                    <tr>
                        <td>Exercise :</td>
                        <td><?php echo $exercise?></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>       

</div>

</body>
</html>

