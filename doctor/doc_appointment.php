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
<?php include('..\widgets\all_links.php'); ?>
<link href="../stylesheet/styleme.css" rel="stylesheet" type="text/css" media="screen, projection"/>

<!-- data table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<style>
 .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate  {
     color:white;
   }

   .btn-group a {
  background-color: #4CAF50; /* Green background */
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: left; /* Float the buttons side by side */
  text-decoration:none;
}

/* Clear floats (clearfix hack) */
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group a:not(:last-child) {
  border-right: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group a:hover {
  background-color: #3e8e41;
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
        <h2 style="color:#a6d9fc" >Appointment Request</h2>
        
        </div>
        <table style="background-color:black" id="table_id" class="display">
        <thead>
            <tr>
            <th>Patient Name</th>
              <th>Subject</th>
              <th>Date</th>
              <th>Time</th>
              <th>Location</th>
              <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
  
            
            $query = mysqli_query($conn,"select * from appointments where doc_id=$did and app_date >= CURDATE();");
            while($row = mysqli_fetch_array($query)) {
        ?>  
          <tr>
              <td><span style="color:black"><?php echo $row['pat_name']?></span></td>
              <td><span style="color:black"><?php echo $row['app_sub']?></span></td>
              <td><span style="color:black"><?php $dt=date_create($row['app_date']); echo date_format($dt,'d/m/Y');?></span></td>
              <td><span style="color:black"><?php $tm = date("g:i a", strtotime($row['app_time'])); echo $tm;?></span></td>
              <td><span style="color:black"><?php echo $row['app_location']?></span></td>
              <td>
              <?php
              if($row['app_status']=="Pending"){
              ?>
              <div class="btn-group">
                <a onclick="confirm_me('Accepted',<?php echo $row['app_id']?>)"  style="background-color: #4CAF50;">Accept</a>
                <a onclick="confirm_me('Rejected',<?php echo $row['app_id']?>)"  style="background-color: red;">Reject</a>
              </div>
              <?php
              } else if($row['app_status']=="Accepted"){
              ?>
                <!-- check if patient is already added  -->
                <?php
                $d=$row['doc_id'];
                $p =$row['pat_id'];
                $query2 = mysqli_query($conn, "select * from doc_pat where doc_id=$d and pat_id=$p");
                if(mysqli_num_rows($query2)==0){ ?>
                  <a href="add_patient.php?did=<?php echo $d?>&&pid=<?php echo $p?>" title="Add patient data" ><span style="font-size:25px; color:green" class="fas fa-plus"></span></a>
                <?php } ?>
                <span style="color:green">Accepted</span>
              <?php
              } else if($row['app_status']=="Rejected"){
              ?>
                <span style="color:red">Rejected</span>
              <?php
              }?>
              </td>

          </tr>
          <?php  } ?>
         
        </tbody>
        </table>     
</div>

   
</body>
</html>
<script>
function confirm_me(s,k){
  if(s=="Accepted"){
    var msg = prompt('Appointment acceptation note', 'Hello! your appointment is accepted');
  }else {
    var msg = prompt('Appointment rejection note', '');
  }
  if (msg != null) {
    window.location.href  = "set_apmnt_status.php?s="+s+"&&id="+k+"&&msg="+msg;
    //alert("true");
  } else {
    window.location.href  = "doc_appointment.php";
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

