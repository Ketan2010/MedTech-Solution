<!DOCTYPE html>
<html lang="en">
<head>
<?php include('..\widgets\all_links.php'); ?>
<link href="../stylesheet/styleme.css" rel="stylesheet" type="text/css" media="screen, projection"/>

<style>
/* Add styles to the form container */
.form-container {
  max-width: 50%;
  padding: 10px;
  margin-left:30%;
 
  
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] ,.form-container input[type=date] ,.form-container input[type=time] {
  width: 60%;
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


#doc_list{
  width: 64%;
  padding: 10px;
  margin: 5px 0 ;
  border-radius : 10px;
  background: #f1f1f1;
  border-color: #088bf0;

}

/* When the inputs get focus, do something */
#doc_list{
  background-color: #ddd;
  outline: none;
}

/* Set a style for the ok/login button */
.Button a{
border-radius:20px;
	font-family: "Amiri";
    background: #3498db;
    color: #fff;
	font-size:22px;
	padding:10px 30px;
	border: none;
	text-align:center;
	text-decoration: none;
	margin-left:22%;

	}	

label{
		font-size:15px;
		  color:#1e90ff
}


/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

</style>

</head>
<body>
<!-- navbar for patient part -->
<?php include('pat_navbar.php');?>
<!-- vertical navbar for patient part -->
<?php include('pat_vertical_nav.php');?>




<div class="main">
        
            <h2 style="color:#a6d9fc" >Appointment Status</h2>
            
       

 <h3 style="font-family:Amiri;margin-bottom:0px;margin-left:37%">Book an Appointment</h3>

    <form action="/action_page.php" class="form-container">
	<label> Appointment With ( Doctor name )</label><br>
			<select id="doc_list" name="doc_name">
				<option value="Joan"> Joan</option>
				<option value="Michael">Michael</option>
				<option value="Fernandes">Fernandes</option>
				<option value="Deshpande">Deshpande</option>
		    </select><br>
			
	<label> Appointment Subject</label><br>
	<input type="text" placeholder="subject" name="subject" required><br>

    <label> Appointment Date</label><br>
	<input type="date"   name="appoint_date" required><br>
	
	<label> Appointment Time</label><br>
	<input type="time" name="appoint_time" required><br>
	
	
	<label> Appointment Location</label><br>
	<input type="text"  placeholder="Location" name="appoint_loc" required>  <br>
	
	
   <p class="Button"><a href="#">Submit</a></p>
  
</form>
   </div> 
</body>
</html>


