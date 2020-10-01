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
   
   
/* Button used to open the contact form  */
.open-button {
  background-color:green;
  color: white;
  padding: 5px 0px;
  border-radius: 10px;
  
  margin:2px 10px;
  cursor: pointer;
  opacity: 0.8;
  align:center;
 
  right: 28px;
  width: 120px;
  font-size:12px;
}

/* The popup form - hidden by default */
.form-popup {
  
  display: none;
  background-image:linear-gradient(to bottom,#3399ff,  #99ccff);
  margin-left:60%;
  margin-right:5%;
  bottom: 0;
  border: 3px solid #f1f1f1;
  border-radius:20px;
  z-index: 9;

}
/* Add styles to the form container */
.form-container {
  max-width: 100%;
  padding: px;
  margin:5%;
 
  
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] ,.form-container input[type=date] ,.form-container input[type=time], input[type=search] {
  width: 100%;
  padding: 10px;
  margin: 5px 0 ;
  border-radius : 10px;
  background: #f1f1f1;
  border-color: #088bf0;
  

}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus ,.form-container input[type=date] ,.form-container input[type=time] {
  background-color: #ddd;
  outline: none;
}


input[type=search] {
  width: 65%;
  padding: 5px;
  margin: 5px 0 ;
  border-radius : 10px;
  background: #f1f1f1;
  border-color: #088bf0;
  

}


/* Set a style for the ok/login button */
.Button a{
    border-radius:20px;
	font-family: "Amiri";
    background:#0059b3;
    color: #fff;
	font-size:22px;
	padding:10px 30px;
	border: none;
	text-align:center;
	text-decoration: none;
	margin-left:35%;

	}	



/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

 .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate  {
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
<?php include('pat_navbar.php');?>
<!-- vertical navbar for doctors part -->
<?php include('pat_vertical_nav.php');?>

<div class="main">
        <div style="display: flex;justify-content: space-between;">
        <h2 style="color:#a6d9fc" >Doctor List</h2>
        
        </div>
        <table style="background-color:black" id="table_id" class="display">
        <thead>
            <tr>
              <th>Doctor ID</th>
              <th>Doctor Name</th>
			  <th>Specialist</th>
              <th>Gender</th>
              <th>Age</th>
              <th>Address</th>
              <th>Contact No.</th>
              <th>Details</th>
			  <th>Timing</th>
              <th>Book Appointment</th>
              
            </tr>
        </thead>
        <tbody>
          <tr>
              <td><span style="color:black">1</span></td>
              <td><span style="color:black">Joahn</span></td>
              <td><span style="color:black">Orthopaedic</span></td>
			  <td><span style="color:black">Male</span></td>
			  <td><span style="color:black">38</span></td>
			  <td><span style="color:black">Fort</span></td>
			  <td><span style="color:black">7768454738</span></td>
			  <td><a href="#"><span style="font-size:25px; color:#3498db" class="fas fa-table"></span></a></td>
              <td><span style="color:black">04:00 PM</span></td>
              <td><span style="color:black"><button class="open-button"  onclick="openForm()">Select</button></span></td>
              

          </tr>
		  <tr>
               <td><span style="color:black">2</span></td>
              <td><span style="color:black">Michael</span></td>
              <td><span style="color:black">Cardiologist</span></td>
			  <td><span style="color:black">Male</span></td>
			  <td><span style="color:black">45</span></td>
			  <td><span style="color:black">Byculla</span></td>
			  <td><span style="color:black">7768454745</span></td>
			  <td><a href="#"><span style="font-size:25px; color:#3498db" class="fas fa-table"></span></a></td>
              <td><span style="color:black">06:00 PM</span></td>
              <td><span style="color:black"><button class="open-button"  onclick="openForm()">Select</button></span></td>
          </tr>
		  <tr>
               <td><span style="color:black">3</span></td>
              <td><span style="color:black">Deshpande</span></td>
              <td><span style="color:black">Surgeon</span></td>
			  <td><span style="color:black">Female</span></td>
			  <td><span style="color:black">34</span></td>
			  <td><span style="color:black">Nariman Point</span></td>
			  <td><span style="color:black">7768454738</span></td>
			  <td><a href="#"><span style="font-size:25px; color:#3498db" class="fas fa-table"></span></a></td>
              <td><span style="color:black">08:00 PM</span></td>
              <td><span style="color:black"><button class="open-button"  onclick="openForm()">Select</button></span></td>
          </tr>
		  <tr>
               <td><span style="color:black">4</span></td>
              <td><span style="color:black">D'souza</span></td>
              <td><span style="color:black">Dentist</span></td>
			  <td><span style="color:black">Male</span></td>
			  <td><span style="color:black">49</span></td>
			  <td><span style="color:black">Dockyard</span></td>
			  <td><span style="color:black">7768456482</span></td>
			  <td><a href="#"><span style="font-size:25px; color:#3498db" class="fas fa-table"></span></a></td>
              <td><span style="color:black">05:00 PM</span></td>
              <td><span style="color:black"><button class="open-button"  onclick="openForm()">Select</button></span></td>
          </tr>
		  
          
        </tbody>
        </table>    





		
<div class="form-popup" id="myForm">
 <h3 style="font-family:Amiri;margin-bottom:0px;text-align:center;">Book an Appointment</h3>

    <form action="/action_page.php" class="form-container">
	
    <label>Doctor Name:</label><br>
	<input type="text" placeholder="" name="doc_name"  value="Joahn" required ><br>	
	
	<label> Appointment Subject</label><br>
	<input type="text" placeholder="subject" name="subject" required><br>

    <label> Appointment Date</label><br>
	<input type="date"   name="appoint_date" required><br>
	
	<label> Appointment Time</label><br>
	<input type="time" name="appoint_time" required><br>
	
	
	<label> Appointment Location</label><br>
	<input type="text"  placeholder="Location" name="appoint_loc" required>  <br>
	
	
   <p class="Button" onClick="closeForm()"><a href="#">Submit</a></p>
   </form>
</div>

</div>

   
</body>
</html>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
$(document).ready( function () {
   
    $('#table_id').dataTable( {
        "scrollX": true
        } );
} );
</script>

