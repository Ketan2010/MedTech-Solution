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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
			  <th>Payment</th>
            </tr>
        </thead>
        <tbody>
        <?php
  
            
            $query = mysqli_query($conn,"select * from appointments where pat_id=$pid  and app_date >= CURDATE();");
            while($row = mysqli_fetch_array($query)) {
        ?>  
          <tr>
              <td><span style="color:black"><?php echo $row['doc_name']?></span></td>
              <td><span style="color:black"><?php echo $row['app_sub']?></span></td>
              <td><span style="color:black"><?php $dt=date_create($row['app_date']); echo date_format($dt,'d/m/Y');?></span></td>
              <td><span style="color:black"><?php $tm = date("g:i a", strtotime($row['app_time'])); echo $tm;?></span></td>
              <td><span style="color:black"><?php echo $row['app_location']?></span></td>
              <td>
                <?php if($row['app_status']=="Pending"){?>
                <span style="color:black">Pending</span>
                <?php }else if($row['app_status']=="Accepted"){?>
                  <div style="color:green" class="tooltip">Accepted
                      <span class="tooltiptext"><?php echo $row['app_msg']?></span>
                  </div>
                <?php }else if($row['app_status']=="Rejected"){?>
                  <div style="color:red" class="tooltip">Rejected
                      <span class="tooltiptext"><?php echo $row['app_msg']?></span>
                  </div>
                <?php }else if($row['app_status']=="Cancelled"){?>
                  <div style="color:red" class="tooltip">Cancelled
                      <span class="tooltiptext"><?php echo $row['app_msg']?></span>
                  </div>
                
                <?php }?>
              </td>

              <td><a  onclick="confirm_me(<?php echo $row['app_id']; ?>)" ><span style="font-size:25px; color:red" class="fas fa-trash"></span></a></td>
			  <?php $query1 = mysqli_query($conn,"select * from payment where app_id='$row[app_id]'");
					$row1 = mysqli_fetch_array($query1); 
					$pay_status=$row1['pay_status'];
					echo $pay_status;?>
			  
			  <td>
				<?php if($row['app_status']=="Accepted") {  if ($pay_status=="") { ?>	
					<span style="color:black"><a href="payment.php?app_id=<?php echo $row['app_id'] ?>" > <button type="button" style="background-color: #4CAF50;font-size:19px;border-radius:20px;"><i class="fa fa-rupee"></i> Payment </button>  </a> </span></td>
				<?php } else if ($pay_status=="1") { ?>
					<div style="color:green" >Paid <i class="fa fa-check" style="font-size:20px;"></i></div>
				<?php } }  else {  $app_msg_null='As your appointment is not accepted, you cannot proceed with the payment ';?>
					<div  class="tooltip"><i class='far fa-comment' style='font-size:36px;color:green'></i>   <span class="tooltiptext"><?php echo $app_msg_null; ?></span></div>
				<?php }?>
				
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

