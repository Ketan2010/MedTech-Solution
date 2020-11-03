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
        <h2 style="color:#a6d9fc" >Receives Payments</h2>
        
        </div>
        <table style="background-color:black" id="table_id" class="display">
        <thead>
            <tr>
			<th>Sr No </th>
			<th>Payee Name</th>
            <th>Patient Name</th>
              <th>Amount</th>
              <th>Date</th>
			 
              
            </tr>
        </thead>
        <tbody>
        <?php
  
            
            $query = mysqli_query($conn,"select * from appointments where doc_id=$did ");
			$no='1';
			
            while($row = mysqli_fetch_array($query)) {	
		    $query1 = mysqli_query($conn,"select * from payment where app_id='$row[app_id]' and pay_status='1' ORDER BY pay_date DESC");
			
			while($row1= mysqli_fetch_array($query1)){
			
			$pat_id=$row['pat_id'];
			
			$query2 = mysqli_query($conn,"select * from pat_register where pat_id='$pat_id' ");
			$row2= mysqli_fetch_array($query2)
        ?>  
          <tr>
				<td><span style="color:black"><?php echo $no;?></span></td>
			   <td><span style="color:black"><?php echo $row1['name_card']?></span></td>
              <td><span style="color:black"><?php echo $row2['pat_name']?></span></td>
              <td><span style="color:black"><?php echo $row1['amount']?></span></td>
              <td><span style="color:black"><?php $dt=date_create($row1['pay_date']); echo date_format($dt,'d/m/Y');?></span></td>
              
              
              
                
			<?php $no=$no+1;}}?>
              </tr>
       
         
        </tbody>    
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

