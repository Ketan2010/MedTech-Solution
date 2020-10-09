<?php
  // check authentication
  session_start();
  if($_SESSION['pat_email']==true){
    include('../connection/db.php');
    $pmail= $_SESSION['pat_email'];
    $query2 =  mysqli_query($conn,"select pat_name from pat_register,pat_login where pat_register.pat_id=pat_login.pat_id and pat_email='$pmail'");
    $row2 = mysqli_fetch_array($query2);
    $pt = $row2['pat_name'];
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
        <h2 style="color:#a6d9fc" >Doctors</h2>
        
        </div>
        <table style="background-color:black" id="table_id" class="display">
        <thead>
            <tr>
              <th>Doctor ID</th>
              <th>Doctor Name</th>
              <th>Gender</th>
              <th>Contact No.</th>
              <th>Email</th>
              <th>Specialization</th>
              <th>View Profile</th>
              <th>Book Appointment</th>
            </tr>
        </thead>
        <tbody>
        <?php
  
            
            $query = mysqli_query($conn,"select * from doc_profile, doctor_register where doc_profile.doc_id = doctor_register .doc_id  ");
            while($row = mysqli_fetch_array($query)) {
        ?>  
          <tr>
              <td><span style="color:black"><?php echo $row['doc_id']?></span></td>
              <td><span style="color:black"><?php echo $row['doc_name']?></span></td>
              <td><span style="color:black"><?php echo $row['doc_gender']?></span></td>
              <td><span style="color:black"><?php echo $row['doc_contact']?></span></td>
              <td><span style="color:black"><?php echo $row['doc_mail']?></span></td>
              <td><span style="color:black"><?php echo $row['doc_specializn']?></span></td>
              <td><a href="view_doctor.php?docid=<?php echo $row['doc_id'] ?>"><span style="font-size:25px; color:#3498db" class="fas fa-user-nurse"></span></a></td>
              <td><a href="book_appointment.php?did=<?php echo $row['doc_id'] ?>"><span style="font-size:25px; color:green" class="fas fa-notes-medical"></span></a></td>
          </tr>
          <?php  } ?>
         
        </tbody>
        </table>     
</div>

   
</body>
</html>

<script>

$(document).ready( function () {
   
    $('#table_id').dataTable( {
        "scrollX": true
        } );
} );
</script>

