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
<?php include('../widgets/all_links.php'); ?>
<link href="../stylesheet/styleme.css" rel="stylesheet" type="text/css" media="screen, projection"/>

<!-- data table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<style>

 .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate  {
     color:white;
   }
    td.display, th.display	{ margin:15%;}
   

  input[type=text], input[type=date] ,select{
		width:100%;
		border: 2px solid dodgerBlue;
		border-radius: 8px;
		margin: 8px 0px;
		padding:8px;
		box-sizing:border-box;
		outline:none;
		
	}
	
	input[type=text]:focus,input[type=date]:focus{
		border-color: #0066cc;
		box-shadow:0 0 8px 0 #0066cc;
	}
	
	.download{
		border-radius:5px;
		margin:5px;
		margin-top:5px;
		padding:5px;
		font-size:13px;
		background-color:green;
		text-decoration:none;
		
		
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
	margin-top:20px;
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



<form method="post" action="doc_pat_report.php" name="doc_pat_report.php" enctype="multipart/form-data"> 
<div class="main">
       

		
		<div style="">
		<h2 style="color:#a6d9fc" >Your Reports</h2>
		 <table style="background-color:white;" id="table_id" class="display">
        <thead style="background-color:black">
            <tr>
			  <th> Sr No </th>
              <th>Doctor Name</th>
              <th>Report date</th>
			  <th>Report Type</th>
              <th>Description</th>
              <th>Report </th>
              
            </tr>
        </thead>
        <tbody style="background-color:White;">
       
          <tr>
              <?php 
			   $no='0';
              $query1=mysqli_query($conn,"select * from doc_pat_report where pat_id='$pid' ORDER BY report_date DESC");
              
              while ($row1 = mysqli_fetch_array($query1)) {
				$did=$row1['doc_id'];
				$query5=mysqli_query($conn,"select * from doc_pat_report where doc_id='$did' ");
				$row5=mysqli_fetch_array($query5);
				$docid=$row5['doc_id'];
				$query6=mysqli_query($conn,"select * from doctor_register where doc_id='$docid'");
				$row6=mysqli_fetch_array($query6);
				$srno=$row1['sr_no'];
				
				
			
              ?>
			  <td><span style="color:black"><?php echo  ++$no; ?></span></td>
              <td><span style="color:black"><?php echo  $row6['doc_name']; ?></span></td>
              <td><span style="color:black"><?php $dt= date_create($row1['report_date']); echo date_format($dt,'d/m/Y'); ?></span></td>
			  <td><span style="color:black"><?php echo $row1['report_type'] ?></span></td>
              <td><span style="color:black"><?php echo $row1['report_descript'] ?></span></td>
              <td><span ><a target="new" href="<?php $sql = mysqli_query($conn,"SELECT * FROM doc_pat_report WHERE sr_no='$row1[sr_no]'");$file = mysqli_fetch_assoc($sql);$filepath = '../upload/' . $file['name']; echo $filepath; ?>"  style="color:white;" >View	<i class="fa fa-eye" style="color:black;align:center"></i></a></span></td>
             
              </tr>
			  <?php }  ?>
        </tbody>
        </table>  
		</div>
</div>
</form>
</body>
</html>

<script>

$(document).ready( function () {
   
    $('#table_id').dataTable( {
        // "scrollX": true
        } );
} );
</script>
