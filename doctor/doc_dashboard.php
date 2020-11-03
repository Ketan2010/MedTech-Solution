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
<?php
  include('../connection/db.php');
  $query_count_pat =  mysqli_query($conn,"select * from doc_pat where doc_id='$did'");
  $query_count_app =  mysqli_query($conn,"select * from appointments where doc_id=$did and app_date >= CURDATE();");
  $query_app_accept =  mysqli_query($conn,"select * from appointments where doc_id=$did and app_status='Accepted' and app_date >= CURDATE();;");
  $query_app_reject =  mysqli_query($conn,"select * from appointments where doc_id=$did and app_status='Rejected' and app_date >= CURDATE();;");
  $query_app_pending =  mysqli_query($conn,"select * from appointments where doc_id=$did and app_status='Pending' and app_date >= CURDATE();;");
  // number of patients being treated
  $pat_count = mysqli_num_rows($query_count_pat);
  // number of appointments to be handle
  $app_count = mysqli_num_rows($query_count_app);
  // number of accepted appointments
  $accept_count = mysqli_num_rows($query_app_accept);
  // number of rejected appointments
  $reject_count = mysqli_num_rows($query_app_reject);
  // number of pending appointments
  $pending_count = mysqli_num_rows($query_app_pending);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('../widgets/all_links.php'); ?>
<link href="../stylesheet/styleme.css" rel="stylesheet" type="text/css" media="screen, projection"/>

<!-- data table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
  backgroundColor: "#464343",
	animationEnabled: true,
	title:{
      text: "Appoinment Status",  //**Change the title here
      fontColor: "#a6d9fc",
      fontFamily:"arial"
      },
  legend: {
		fontSize: 20,
    fontColor: "white"
	},
	data: [{
		type: "pie",
		startAngle: 240,
    showInLegend: true,
    radius: 100,
		yValueFormatString: "##00\"\"",
		indexLabel: "{label} {y}",
    legendText: "{label}",
		dataPoints: [
			{y: <?php echo $pending_count?>, label: "Pending",indexLabelFontColor: "White",indexLabelFontSize:20},
			{y: <?php echo $reject_count?>, label: "Rejected",indexLabelFontColor: "White",indexLabelFontSize:20},
			{y: <?php echo $accept_count?>, label: "Accepted",indexLabelFontColor: "White",indexLabelFontSize:20},
			
		]
	}]
});
chart.render();

}
</script>
<style>
   .dataTables_wrapper .dataTables_paginate {
     color:white;
   }
  .column {
  float: left;
  width: 50%;
  padding: 10px;
   /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
* {
  box-sizing: border-box;
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
        <h2 style="color:#a6d9fc" >Dashboard</h2>
  
        <div class="grid-container">
          <div class="row">
              <div class="column">
                  <div style="box-shadow: 0 4px 8px 0 #b1b5b2;" class="grid-item">Patients<br><?php echo $pat_count?></div>
              </div>
              <div class="column">
                  <div style="box-shadow: 0 4px 8px 0 #b1b5b2;" class="grid-item">Appointments<br><?php echo $app_count?></div>
              </div>
          </div>
          <div id="chartContainer" style="height: 200px; width: 200%;"></div> 
        </div>
        <h2 style="color:#a6d9fc" >Upcoming Appointments</h2>
  
        <table style="background-color:black" id="table_id" class="display">
        <thead>
            <tr>
            <th>Patient Name</th>
              <th>Subject</th>
              <th>Date</th>
              <th>Time</th>
              <th>Location</th>
              <th>Cancel Appointment</th>
            </tr>
        </thead>
        <tbody>
        <?php
  
            
            $query = mysqli_query($conn,"select * from appointments where doc_id=$did and app_date = CURDATE() and app_time >= curtime() and app_status='Accepted';");
            while($row = mysqli_fetch_array($query)) {
        ?>  
          <tr>
              <td><span style="color:black"><?php echo $row['pat_name']?></span></td>
              <td><span style="color:black"><?php echo $row['app_sub']?></span></td>
              <td><span style="color:black"><?php $dt=date_create($row['app_date']); echo date_format($dt,'d/m/Y');?></span></td>
              <td><span style="color:black"><?php $tm = date("g:i a", strtotime($row['app_time'])); echo $tm;?></span></td>
              <td><span style="color:black"><?php echo $row['app_location']?></span></td>
              <td>
              <div class="">
              <a onclick="confirm_me('Cancelled',<?php echo $row['app_id']?>)" title="Cancel Appointment" ><span style="font-size:25px; color:red" class="fas fa-calendar-times"></span></a>
              </div>
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
  
    var msg = prompt('Appointment cancelation note:', '');
 
 
  if (msg != null) {
    window.location.href  = "set_apmnt_status.php?s="+s+"&&id="+k+"&&msg="+msg;
    //alert("true");
  } else {
    window.location.href  = "doc_dashboard.php";
    //alert("flase");
  }
}
</script>
<script>
$(document).ready( function () {
   
    $('#table_id').dataTable( {
          "dom": 'lrtip',
          "bPaginate": false,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": false
        } );
} );
</script>

