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
<?php include('../widgets/all_links.php'); ?>
<link href="../stylesheet/styleme.css" rel="stylesheet" type="text/css" media="screen, projection"/>

<!-- data table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<style>
/* Add styles to the form container */
.form-container {
  max-width: 100%;
  padding: 10px;
  margin-left:18%;
 
  
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] ,.form-container input[type=date] ,.form-container input[type=time] {
  width: 60%;
  padding: 10px;
  margin: 5px 0 ;
  border-radius : 10px;
  background: #f1f1f1;
  border-color: #088bf0;

}
 .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate  {
     color:white;
   }
    td.display, th.display	{ padding:5%;}
   

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
<?php include('doc_navbar.php');?>
<!-- vertical navbar for patient part -->
<?php include('doc_vertical_nav.php');?>


        <div class="main">
        <div style="display: flex;justify-content: space-between;">
        <h2 style="color:#a6d9fc" >Upload Report</h2>
        <p style="margin: 0 40 0 700px;" class='myButton' >
          <a  href="report_records.php"><span style="font-size:20px; color:white" class="fas fa-file-medical"></span> View Records</a>
        </p>
        </div>
<form method="post" action="doc_pat_report.php" class="form-container" name="doc_pat_report.php" enctype="multipart/form-data"> 

        
		<table>
			<tr>
				<td>Date :</td>
				<td> <input type="date" name="report_date"  value="" required/></td>
			</tr>
			<tr>
				<td>Patient ID :</td>
				<td> <input type="text" name="pat_id" placeholder="Patient ID" value="" required/></td>
			</tr>
			
			
			<tr>
				<td>Report Type :</td>
				<td> <select name="report_type" id="report_type">
                          <option value="">Select</option>
						  <option value="Blood Report">Blood Report</option>
						  <option value="X-Ray">X-Ray</option>
						  <option value="Medicine Prescription">Medicine Prescription</option>
						  <option value="Urine Report">Urine Report</option>
						  <option value="Sonography">Sonography</option>
						  <option value="Electrocardiagram">Electrocardiagram</option>
						  <option value="Angiography">Angiography</option>
						  <option value="Urine Report">Urine Report</option>
						  <option value="Thoracentesis">Thoracentesis</option>
						  <option value="Thyroid function test">Thyroid function test</option>
						  <option value="Lumbar puncture">Lumbar puncture</option>
						  <option value="Protein-bound iodine test">Protein-bound iodine test</option>
						  <option value="Angiocardiography">Angiocardiography</option>
						  <option value="Echoencephalography">Echoencephalography</option>
						  <option value="Magnetoencephalography">Magnetoencephalography</option>
						  <option value="Mammography">Mammography</option>
						  <option value="Magnetic resonance spectroscopy">Magnetic resonance spectroscopy</option>
						  <option value="Pulmonary function test">Pulmonary function test</option>
						  <option value="Autopsy">Autopsy</option>
						  <option value="Kidney function test">Kidney function test</option>
						  <option value="Pregnancy test">Pregnancy test</option>
						  <option value="Toxicology test">Toxicology test</option>
						  <option value="Laparoscopy">Laparoscopy</option>

						 
                     </select>
				</td>
			</tr>
			<tr>
				<td>Report Description:</td>
				<td> <input type="text" name="report_descript" placeholder="Description" value="" required/></td>
			</tr>
			<tr>
				<td>Choose file or report :</td>
				<td> <input type="file" name="report_file" placeholder="" value="" style="padding:10px;" required/></td>
			</tr>
		
		</table>
		<input class="bigb" id="submit" value="Submit" name="submit" type="submit" >
		
</div>
</form>
</body>
</html>

<?php
	include('../connection/db.php');
	if(isset($_POST['submit']))
	{
	  $pat_id = $_POST['pat_id'];
	  $report_date = $_POST['report_date'];
	    $report_type = $_POST['report_type'];
	  $report_descript = $_POST['report_descript'];
	  
	  $filename=$_FILES['report_file']['name'];
	  $count =mysqli_query($conn,"select sr_no from doc_pat_report");
	  $cn=mysqli_num_rows($count);
	  $fn=++$cn.$filename;
	  $destination='../upload/'.$fn;
	  $extension = pathinfo($fn ,PATHINFO_EXTENSION);
      $file=$_FILES['report_file']['tmp_name'];
	  $size =$_FILES['report_file']['size'];
	  
	 
		if (move_uploaded_file($file,$destination))	
		{ 	
			
			
			$query1= mysqli_query($conn, "insert into doc_pat_report(pat_id,doc_id,report_date,report_type,report_descript,name) values('$pat_id','$did','$report_date','$report_type','$report_descript','$fn')");
			
			if ($query1)
			{	
			
					
				echo "<script>alert('Report is submitted successfully');
					  window.location.href='doc_pat_report.php';
					  </script>";	
			}
			else
			{
				echo "<script>alert('Something went wrong , Please try again'); </script>";	
			}
		}
		else
		{
			echo "<script>alert('Something went wrong , Please try again'); </script>";	
		}
		
	  }


?>


