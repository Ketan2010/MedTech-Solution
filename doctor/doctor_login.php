<?php
session_start();
include('../connection/db.php');

if(isset($_POST['submit'])) {
  $email = $_POST['doc_mail'];
  $pass = $_POST['doc_pass'];
  // password checking
  $query = mysqli_query($conn, "select * from doc_login where doc_mail='$email' and doc_pass='$pass'");
  if($query){
  if(mysqli_num_rows($query)>0){
      $_SESSION['email'] = $email;
      header('location:doc_dashboard.php');
  } else {
    echo "<script>alert('invalid Email or Password, please try again!')</script>";
  }

}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>MedTech Solution</title>
<?php include('../widgets/all_links.php'); ?>
<link href="../stylesheet/styleme.css" rel="stylesheet" type="text/css" media="screen, projection"/>


<style>
	input{
		width:100%;
		border: 2px solid dodgerBlue;
		border-radius: 8px;
		margin: 8px 0px;
		padding:8px;
		box-sizing:border-box;
		outline:none;
		
	}
	
	input:focus{
		border-color: #0066cc;
		box-shadow:0 0 8px 0 #0066cc;
	}
	.inputWithIcon input{
	padding-left:40px;	
	}
	
	.inputWithIcon{
		position:relative;
	}
	
	.inputWithIcon i{
			position:absolute;
			left:0;
			top:8px;
			padding:8px;
	}
	
	.inputWithIcon i + input{
		color:dodgerBlue;
	}
		
	.inputWithIcon.inputIconBg i {
		background-color:dodgerBlue;
		color:white;
		padding:10px 4px;
		border-radius:4px 0px 0px 4px;
		border-color:dodgerBlue;
	}
	
	.Button a{
	border-radius:6px;
	font-family: "Amiri";
    
    background: #3498db;
    color: #fff;
	padding:5px 60px;
	border: none;
	text-align:center;
	text-decoration: none;
	margin: 0 0 0 0px;
	}	
	
	.Button a:hover {
    background: #088bf0;
    color: #fff;
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
<!-- this is a navbar for before login -->
<?php include('../widgets/outer_navbar.php');?>

<section class="home">
    <div class="flex-parent">
	
		<div>   
            
		<form method="post" action="doctor_login.php" name="doctor_login"> 
 
			<img src="../assets/img/username_icon.png" alt="" width="80" height="80" align="center" style="align:center;padding-left:35%;padding-top:50px;">
			
			<div class="inputWithIcon inputIconBg">
				<input type="mail" name="doc_mail" size="30" placeholder="Doctor mail..." required>
				<i class=" fa fa-user fa-lg fa-fw" ></i>
				
             </div>      

			<div class="inputWithIcon inputIconBg">
				<input type="password"  name="doc_pass" size="30" placeholder="Password..." required>
				<i class=" fa fa-key fa-lg fa-fw" ></i>
             </div>      
		      

		    <!-- <p  class="Button" style="text-align:center;font-size:22px;"><a  href="#">Login</a></p> -->
			<input class="bigb" id="submit" value="Login" name="submit" type="submit" >

			<p style="text-align:center;"><a  href="#" style="text-decoration:none;color:#1e90ff;background-color:#464343;">Forgot Password ?</a></p>
			
			<p  class="Button" style="font-family: Amiri;font-size:15px;text-align:center;color:#fff;margin-top:0px"><a  href="doctor_account.php">Create Account</a></p>
			</form>
		</div>	
		
        <!-- i m doctor -->
        <div class="boxone">
            <img src="../assets/img/doc.png" alt="Doctor" width="400" height="400">   
        </div>
       
        
</section>


</body>
</html>

