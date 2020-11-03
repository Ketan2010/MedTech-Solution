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
 .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate  {
     color:white;
   }
   
</style>
</head>
<body>
<!-- navbar for doctor part -->
<?php include('doc_navbar.php');?>
<!-- vertical navbar for doctors part -->
<?php include('doc_vertical_nav.php');?>

<div class="main">
        
       
		<h2 style="color:#a6d9fc" >Report Records</h2>
		 <table style="background-color:white;" id="table_id" class="display">
        <thead style="background-color:black">
            <tr>
			 
              <th>Patient ID</th>
              <th>Patient Name</th>
              <th>Report date</th>
			  <th>Report Type</th>
              <th>Description</th>
              <th>Report </th>
              
            </tr>
        </thead>
        <tbody style="background-color:White;">
        <?php  
			$no='0';
            $query_pat = mysqli_query($conn,"select * from doc_pat_report where doc_id='$did' ORDER BY report_date DESC");
			
			while($row1 = mysqli_fetch_array($query_pat)) {
          ?>  
          <tr>
              <td><span style="color:black"><?php echo $row1['pat_id']?></span></td>
              <td><span style="color:black"><?php $query_name=mysqli_query($conn,"select pat_name from pat_register where pat_id='$row1[pat_id]';"); $row2=mysqli_fetch_array($query_name) ;echo $row2['pat_name']?></span></td>
              <td><span style="color:black"><?php $dt= date_create($row1['report_date']); echo date_format($dt,'d/m/Y'); ?></span></td>
			   <td><span style="color:black"><?php echo $row1['report_type'] ?></span></td>
              <td><span style="color:black"><?php echo $row1['report_descript'] ?></span></td>
              <td><span class="download" ><a target="new" href="<?php $sql = mysqli_query($conn,"SELECT * FROM doc_pat_report WHERE sr_no='$row1[sr_no]'");$file = mysqli_fetch_assoc($sql);$filepath = '../upload/' . $file['name']; echo $filepath; ?>"  style="color:white;" >View	<i class="fa fa-eye" style="color:black;align:center"></i></a></span></td>
             
              </tr>
			  <?php  } ?>
        </tbody>
        </table>    
</div>

   
</body>
</html>
<script>
function confirm_me(p,d,pn){
  var s = "Do you really want to delete patient "+pn+"'s data?";
  var r = confirm(s);
  if (r == true) {
    window.location.href  = "delete_patient.php?pid="+p+"&&did="+d;
  } else {
    window.location.href  = "patients_data.php";
  }
}
</script>
<script>

$(document).ready( function () {
   
    $('#table_id').dataTable( {
        // "scrollX": true
        } );
} );
</script>

