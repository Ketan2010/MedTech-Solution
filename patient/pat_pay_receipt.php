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
   .tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
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
        <h2 style="color:#a6d9fc" >Payment Successfully Done</h2>
        
        </div>
        <table style="background-color:black" id="table_id" class="display">
        <thead>
            <tr>
			<th>Sr No </th>
			<th>Payee Name</th>
            <th>Receipient Name</th>
              <th>Amount</th>
              <th>Date</th>
			 
              
            </tr>
        </thead>
        <tbody>
        <?php
  
            
            $query = mysqli_query($conn,"select * from appointments where pat_id=$pid ");
			$no='1';
			
            while($row = mysqli_fetch_array($query)) {	
		    $query1 = mysqli_query($conn,"select * from payment where app_id='$row[app_id]' and pay_status='1' ORDER BY pay_date DESC");
			
			while($row1= mysqli_fetch_array($query1)){
			
			$doc_id=$row['doc_id'];
			
			$query2 = mysqli_query($conn,"select * from doctor_register where doc_id='$doc_id' ");
			$row2= mysqli_fetch_array($query2)
        ?>  
          <tr>
				<td><span style="color:black"><?php echo $no;?></span></td>
			   <td><span style="color:black"><?php echo $row1['name_card']?></span></td>
              <td><span style="color:black"><?php echo $row2['doc_name']?></span></td>
              <td><span style="color:black"><?php echo $row1['amount']?></span></td>
              <td><span style="color:black"><?php $dt=date_create($row1['pay_date']); echo date_format($dt,'d/m/Y');?></span></td>
              
              
              
                
			<?php $no=$no+1;}}?>
              </tr>
       
         
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
  } else {
    window.location.href  = "pat_appointment.php";
  }
}
</script>
<script>

$(document).ready( function () {
   
    $('#table_id').dataTable( {
        
        } );
} );
</script>

