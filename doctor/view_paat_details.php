<?php
  // check authentication
  session_start();
  if($_SESSION['email']==true){
    include('../connection/db.php');
    $dmail= $_SESSION['email'];
    $query2 =  mysqli_query($conn,"select doc_name from doctor_register where doc_mail='$dmail'");
    $row2 = mysqli_fetch_array($query2);
    $dr = $row2['doc_name'];
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
        <p style="margin: 0 40 0 700px;" class='myButton' ><a  href="#"><span style="font-size:20px; color:white" class="fas fa-user-plus"></span> Add Patient</a></p>
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
              <th>Edit</th>
              <th>Delete</th>
              
            </tr>
        </thead>
        <tbody>
          <tr>
              <td><span style="color:black">1</span></td>
              <td><span style="color:black">Daniel</span></td>
              <td><span style="color:black">Male</span></td>
              <td><span style="color:black">03/05/1992</span></td>
              <td><span style="color:black">28</span></td>
              <td><span style="color:black">Dubai</span></td>
              <td><span style="color:black">1234567890</span></td>
              <td><a href="#"><span style="font-size:25px; color:#3498db" class="fas fa-table"></span></a></td>
              <td><a href="#"><span style="font-size:25px; color:green" class="fas fa-edit"></span></a></td>
              <td><a href="#"><span style="font-size:25px; color:red" class="fas fa-trash"></span></a></td>
          </tr>
          <tr>
              <td><span style="color:black">2</span></td>
              <td><span style="color:black">Micky</span></td>
              <td><span style="color:black">Female</span></td>
              <td><span style="color:black">03/05/2000</span></td>
              <td><span style="color:black">20</span></td>
              <td><span style="color:black">London</span></td>
              <td><span style="color:black">1234567890</span></td>
              <td><a href="#"><span style="font-size:25px; color:#3498db" class="fas fa-table"></span></a></td>
              <td><a href="#"><span style="font-size:25px; color:green" class="fas fa-edit"></span></a></td>
              <td><a href="#"><span style="font-size:25px; color:red" class="fas fa-trash"></span></a></td>
          </tr>
          
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

