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
			{y: 13, label: "Pending",indexLabelFontColor: "White",indexLabelFontSize:20},
			{y: 12, label: "Cancel",indexLabelFontColor: "White",indexLabelFontSize:20},
			{y: 20, label: "Completed",indexLabelFontColor: "White",indexLabelFontSize:20},
			
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
                  <div style="box-shadow: 0 4px 8px 0 #b1b5b2;" class="grid-item">Patients<br>12</div>
              </div>
              <div class="column">
                  <div style="box-shadow: 0 4px 8px 0 #b1b5b2;" class="grid-item">Appointments<br>45</div>
              </div>
          </div>
          <div id="chartContainer" style="height: 200px; width: 200%;"></div> 
        </div>
        <h2 style="color:#a6d9fc" >Upcoming Appointments</h2>
  
        <table style="background-color:black" id="table_id" class="display">
        <thead>
            <tr>
              <th>Sr.No</th>
              <th>Patient ID</th>
              <th>Patient Name</th>
              <th>Subject</th>
              <th>Date</th>
              <th>Time</th>
              <th>Status</th>
            </tr>
        </thead>
        <tbody>
          <tr>
              <td><span style="color:black">1</span></td>
              <td><span style="color:black">2</span></td>
              <td><span style="color:black">Viliam</span></td>
              <td><span style="color:black">Chest Pain</span></td>
              <td><span style="color:black">25/09/2020</span></td>
              <td><span style="color:black">02:00 PM</span></td>
              <td><span style="color:black">Completed</span></td>
          </tr>
          <tr>
              <td><span style="color:black">2</span></td>
              <td><span style="color:black">3</span></td>
              <td><span style="color:black">Leonardo</span></td>
              <td><span style="color:black">Knee Pain</span></td>
              <td><span style="color:black">30/09/2020</span></td>
              <td><span style="color:black">04:00 PM</span></td>
              <td><span style="color:black">Cancel    </span></td>
          </tr>
          <tr>
              <td><span style="color:black">3</span></td>
              <td><span style="color:black">5</span></td>
              <td><span style="color:black">Don</span></td>
              <td><span style="color:black">Joint Pain</span></td>
              <td><span style="color:black">30/09/2020</span></td>
              <td><span style="color:black">04:00 PM</span></td>
              <td>
                <div class="btn-group">
                  <button style="background-color:green">Completed</button>
                  <button style="background-color:red">Cancel</button>
                </div>
              </td>
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

