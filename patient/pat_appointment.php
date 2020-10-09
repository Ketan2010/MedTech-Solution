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
<?php include('..\widgets\all_links.php'); ?>
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
<?php include('pat_navbar.php');?>
<!-- vertical navbar for doctors part -->
<?php include('pat_vertical_nav.php');?>

<div class="main">
        <div style="display: flex;justify-content: space-between;">
        <h2 style="color:#a6d9fc" >Appointments</h2>
        
        </div>
        <table style="background-color:black" id="table_id" class="display">
        <thead>
            <tr>
            <th>Doctor Name</th>
              <th>Subject</th>
              <th>Date</th>
              <th>Time</th>
              <th>Location</th>
              <th>Status</th>
              <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
  
            
            $query = mysqli_query($conn,"select * from appointments where pat_id=$pid");
            while($row = mysqli_fetch_array($query)) {
        ?>  
          <tr>
              <td><span style="color:black"><?php echo $row['doc_name']?></span></td>
              <td><span style="color:black"><?php echo $row['app_sub']?></span></td>
              <td><span style="color:black"><?php $dt=date_create($row['app_date']); echo date_format($dt,'d/m/Y');?></span></td>
              <td><span style="color:black"><?php $tm = date("g:i a", strtotime($row['app_time'])); echo $tm;?></span></td>
              <td><span style="color:black"><?php echo $row['app_location']?></span></td>
              <td><span style="color:black"><?php echo $row['app_status']?></span></td>

              <td><a href="" onclick="confirm_me(<?php echo $row['app_id']; ?>)" ><span style="font-size:25px; color:red" class="fas fa-trash"></span></a></td>
          </tr>
          <?php  } ?>
         
        </tbody>
        </table>     
</div>

   
</body>
</html>
<script>
function confirm_me(k){
  var r = confirm("Do you really want to delete appointment?");
  if (r == true) {
    window.location.href  = "delete_appointment.php?del="+k;
    //alert("true");
  } else {
    window.location.href  = "pat_appointment.php";
    //alert("flase");
  }
}
</script>
<script>

$(document).ready( function () {
   
    $('#table_id').dataTable( {
        
        } );
} );
</script>

