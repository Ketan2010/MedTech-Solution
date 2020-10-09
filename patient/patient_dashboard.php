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
			{y: 1, label: "Pending",indexLabelFontColor: "White",indexLabelFontSize:20},
			{y: 2, label: "Cancel",indexLabelFontColor: "White",indexLabelFontSize:20},
			{y: 2, label: "Completed",indexLabelFontColor: "White",indexLabelFontSize:20},
			
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
   
}


.row:after {
  content: "";
  display: table;
  clear: both;
}
* {
  box-sizing: border-box;
}
  
</style>
</head>
<body>
<!-- navbar for doctor part -->
<?php include('pat_navbar.php');?>
<!-- vertical navbar for doctors part -->
<?php include('pat_vertical_nav.php');?>

<div class="main">
        <h2 style="color:#a6d9fc" >Patient Dashboard</h2>
  
        <div class="grid-container">
          <div class="row">
              <div class="column">
                  <div style="box-shadow: 0 4px 8px 0 #b1b5b2;" class="grid-item">Available Doctors<br>5</div>
              </div>
              <div class="column">
                  <div style="box-shadow: 0 4px 8px 0 #b1b5b2;" class="grid-item">Appointments<br>5</div>
              </div>
          </div>
          <div id="chartContainer" style="height: 200px; width: 200%;"></div> 
        </div>
        <h2 style="color:#a6d9fc" >Upcoming Appointments</h2>
  
        <table style="background-color:black" id="table_id" class="display">
        <thead>
            <tr>
              <th>Appointment ID</th>
              <th>Doctor Name</th>
              <th>Subject</th>
              <th>Date</th>
              <th>Time</th>
              <th>Status</th>
              <th>Comment</th>
            </tr>
        </thead>
        <tbody>
          
          <tr>
              <td><span style="color:black">2</span></td>
              <td><span style="color:black">Joahn</span></td>
              <td><span style="color:black">Knee Pain</span></td>
              <td><span style="color:black">30/09/2020</span></td>
              <td><span style="color:black">04:00 PM</span></td>
              <td><span style="color:black">Cancel</span></td>
              <td><a href="#"><span style="font-size:25px; color:#3498db" class="fas fa-comment-dots"></span></a></td>

          </tr>
         
        </tbody>
        </table>    
 
        
    
 

  
</div>

   
</body>
</html>
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

