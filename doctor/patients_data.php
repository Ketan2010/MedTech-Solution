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
        <div style="display: flex;justify-content: space-between;">
        <h2 style="color:#a6d9fc" >Patients</h2>
       
        </div>
        <table style="background-color:black" id="table_id" class="display">
        <thead>
            <tr>
              <th>Patient ID</th>
              <th>Patient Name</th>
              <th>Gender</th>
              <th>Date of birth</th>
              <th>Age</th>
              <th>Address</th>
              <th>Contact No.</th>
              <th>Details</th>
              <th>Delete</th>
              
            </tr>
        </thead>
        <tbody>
        <?php        
            $query = mysqli_query($conn,"select * from doc_pat where doc_id=$did;");
            while($row = mysqli_fetch_array($query)) {
          ?>  
          <tr>
              <?php 
              $query1=mysqli_query($conn, "select * from pat_profile where pat_id='$row[pat_id]' ");
              $row1 = mysqli_fetch_array($query1);
              $query2=mysqli_query($conn, "select * from pat_register where pat_id='$row[pat_id]' ");
              $row2 = mysqli_fetch_array($query2);
              ?>
              <td><span style="color:black"><?php echo $row1['pat_id']?></span></td>
              <td><span style="color:black"><?php echo $row2['pat_name']?></span></td>
              <td><span style="color:black"><?php echo $row2['pat_gender']?></span></td>
              <td><span style="color:black"><?php $dt= date_create($row1['pat_dob']); echo date_format($dt,'d/m/Y'); ?></span></td>
              <td><span style="color:black"><?php echo $row1['pat_age']?></span></td>
              <td><span style="color:black"><?php echo $row1['pat_address']?></span></td>
              <td><span style="color:black"><?php echo $row1['pat_contact']?></span></td>
              <td><a href="pat_details.php?pid=<?php echo $row1['pat_id']?>"><span style="font-size:25px; color:#3498db" class="fas fa-table"></span></a></td>
              <td><a onclick="confirm_me(<?php echo $row1['pat_id'];?>,<?php echo $did;?>,'<?php echo $row2['pat_name']?>');" ><span style="font-size:25px; color:red" class="fas fa-trash"></span></a></td>
          </tr>
          <?php } ?>
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
        "scrollX": true
        } );
} );
</script>

