<?php
include('../connection/db.php');
  session_start();
  if($_SESSION['report_passport']==true){
    $pid = $_SESSION['report_passport'];
	

  }else{
    header('location:health_passport_login.php');
  }
   
?>
<?php

include('../connection/db.php');
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

	.custom_buttons{
	border-radius:4px;
	font-family: "Amiri";
    background: #3498db;
    color: #fff;
	border: none;
	padding:10px 0px 10px 0px;
	text-decoration: none;
	margin:10px 0px 10px 0px;
	width:420px ;
	outline:none;

	}
	
	.custom_buttons:hover {
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
.card {
  box-shadow: 0 7px 30px 0 rgba(0,0,0,0.2);
  margin-left:130px;
  transition: 0.3s;
  width: 80%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 100px;
}

</style>
<!-- data table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<style>
 .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate  {
     /* color:white ; */
   }
   
</style>
</head>
<body>
<?php include('health_nav.php');?>


<section class="home">

<div style="background-color:#d0d3db" class="card">
  <img  src="../assets/img/header.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h2><span style="color:#202f6b"><b>Patient Name:</b></span> <?php echo $pat_name?></h2> 
    <h2><span style="color:#202f6b"><b>Gender:</b></span> <?php echo $pat_gender?></h2> 
    <h2><span style="color:#202f6b"><b>Date of Birth:</b></span> <?php $dt=date_create($pat_dob); echo date_format($dt,'d/m/Y');?></h2> 
    <h2><span style="color:#202f6b"><b>Age:</b></span> <?php echo $pat_age?></h2>
    <h2><span style="color:#202f6b"><b>Address:</b></span> <?php echo $pat_address?></h2>
    <h2><span style="color:#202f6b"><b>Contact No.:</b></span> <?php echo $pat_contact?></h2>
    <h2><span style="color:#202f6b"><b>Email ID:</b></span> <?php echo $pat_mail?></h2> 
    <hr>
    <h1><span style="color:#202f6b"><b>Sign and Symptoms:</b></span></h1>
    <hr> 
    <h2><span style="color:#202f6b"><b>Chest Pain / Discomfort:</b></span> <?php echo $chest_pain?></h2> 
    <h2><span style="color:#202f6b"><b>Shortness of Breath:</b></span> <?php echo $short_breath?></h2>
    <h2><span style="color:#202f6b"><b>Diabetes:</b></span> <?php echo $diabetes?></h2>
    <h2><span style="color:#202f6b"><b>Blood Pressure:</b></span> <?php echo $bp?></h2>
    <h2><span style="color:#202f6b"><b>Alcohol:</b></span> <?php echo $alcohol?></h2>
    <h2><span style="color:#202f6b"><b>Smoking:</b></span> <?php echo $smoke?></h2>
    <h2><span style="color:#202f6b"><b>Stress:</b></span> <?php echo $stress?></h2>
    <h2><span style="color:#202f6b"><b>Exercise:</b></span> <?php echo $exercise?></h2>
    <hr>
    <h1><span style="color:#202f6b"><b>Reports:</b></span></h1>
    <hr> 
    <table style="background-color:white;" id="table_id" class="display">
        <thead style="background-color:black;color:white">
            <tr>
			 
              <th>Patient ID</th>
              <th>Patient Name</th>
              <th>Doctor Name</th>
              <th>Report date</th>
			        <th>Report Type</th>
              <th>Description</th>
              <th>Report </th>
              
            </tr>
        </thead>
        <tbody style="background-color:White;">
        <?php  
			$no='0';
            $query_pat = mysqli_query($conn,"select * from doc_pat_report where pat_id='$pid' ORDER BY report_date DESC");
			
			        while($row1 = mysqli_fetch_array($query_pat)) {
          ?>  
          <tr>
              <td><span style="color:black"><?php echo $row1['pat_id']?></span></td>
              <td><span style="color:black"><?php $query_name=mysqli_query($conn,"select pat_name from pat_register where pat_id='$row1[pat_id]';"); $row2=mysqli_fetch_array($query_name) ;echo $row2['pat_name']?></span></td>
              <td><span style="color:black"><?php $query_doc_name=mysqli_query($conn,"select doc_name from doctor_register where doc_id='$row1[doc_id]';"); $row2=mysqli_fetch_array($query_doc_name) ;echo $row2['doc_name']?></span></td>
              <td><span style="color:black"><?php $dt= date_create($row1['report_date']); echo date_format($dt,'d/m/Y'); ?></span></td>
			        <td><span style="color:black"><?php echo $row1['report_type'] ?></span></td>
              <td><span style="color:black"><?php echo $row1['report_descript'] ?></span></td>
              <td><span class="download" ><a target="new" href="<?php $sql = mysqli_query($conn,"SELECT * FROM doc_pat_report WHERE sr_no='$row1[sr_no]'");$file = mysqli_fetch_assoc($sql);$filepath = '../upload/' . $file['name']; echo $filepath; ?>"  style="color:white;" >View	<i class="fa fa-eye" style="color:black;align:center"></i></a></span></td>
             
              </tr>
			  <?php  } ?>
        </tbody>
        </table>   

    

  </div>
</div>
</section>


</body>
</html>
<script>

$(document).ready( function () {
   
    $('#table_id').dataTable( {
        // "scrollX": true
        } );
} );
</script>