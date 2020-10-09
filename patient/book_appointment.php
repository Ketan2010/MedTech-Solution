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
<?php
if(isset($_GET['did'])){
    $did = $_GET['did'];
    $query2 =  mysqli_query($conn,"select * from doctor_register where doc_id='$did'");
    $row2 = mysqli_fetch_array($query2);
    $dr = $row2['doc_name'];
    
   

}


?>
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
.bigb {
	background-color:#4c86eb;
	border-radius:28px;
	border:1px solid #4e6096;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:10px 36px;
	text-decoration:none;
	text-shadow:0px 1px 0px #7791d4;
}
.bigb:hover {
	background-color:#579df2;
}
.bigb:active {
	position:relative;
	top:1px;
}
	
</style>

</head>
<body>
<!-- navbar for patient part -->
<?php include('pat_navbar.php');?>
<!-- vertical navbar for patient part -->
<?php include('pat_vertical_nav.php');?>




<div class="main">
        
<h2 style="color:#a6d9fc" >Book Appointment with Dr.<?php echo $dr ?></h2>

    <form method="post" action="book_appointment.php" class="form-container">
	<label> Appointment With ( Doctor name )</label><br>
    <input type="text" value="<?php echo $dr?>" name="doc_name" required><br>
    <div style="display:none">
    <input type="text" value="<?php echo $did?>" name="doc_id" required><br>
    </div>
			
	<label> Appointment Subject</label><br>
	<input type="text" placeholder="subject" name="app_sub" required><br>

    <label> Appointment Date</label><br>
	<input type="date"   name="app_date" required><br>
	
	<label> Appointment Time</label><br>
	<input type="time" name="app_time" required><br>
	
	
	<label> Appointment Location</label><br>
	<input type="text"  placeholder="Location" name="app_location" required>  <br>
	
	
    <input class="bigb" id="submit" value="Book Appointment" name="submit" type="submit" >

  
</form>
   </div> 
</body>
</html>
<?php 
if(isset($_POST['submit'])) {
    $pat_id = $pid;
    $pat_name = $pt;
    $doc_id =$_POST['doc_id'];
    $doc_name = $_POST['doc_name'];
    $app_sub = $_POST['app_sub'];
    $app_date = $_POST['app_date'];
    $app_time = $_POST['app_time'];
    $app_location = $_POST['app_location'];
   
    	
    	
    $query = mysqli_query($conn,"insert into appointments(pat_id, pat_name, doc_id, doc_name, app_sub, app_date, app_time, app_location,app_status)values('$pat_id', '$pat_name', '$doc_id', '$doc_name', '$app_sub', '$app_date', '$app_time', '$app_location','Pending')");

    if($query){
        echo "<script>alert('Appointment request sent!')</script>";
        echo "<script>window.location = 'pat_appointment.php'</script>";

    } else {
      echo "<script>alert('Something went wrong, please register again!')</script>";
    }
  } 

?>

