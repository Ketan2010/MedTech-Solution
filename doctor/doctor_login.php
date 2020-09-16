<!DOCTYPE html>
<html lang="en">
<head>
<title>MedTech Solution</title>
<?php include('..\widgets\all_links.php'); ?>
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
	
</style>


</head>
<body>
<!-- this is a navbar for before login -->
<?php include('../widgets/outer_navbar.php');?>

<section class="home">
    <div class="flex-parent">
	
		<div>
            
			<img src="../assets/img/username_icon.png" alt="" width="80" height="80" align="center" style="align:center;padding-left:35%;padding-top:50px;">
			
			<div class="inputWithIcon inputIconBg">
				<input type="text" name="username" size="30" placeholder="Username..." >
				<i class=" fa fa-user fa-lg fa-fw" ></i>
				
             </div>      

			<div class="inputWithIcon inputIconBg">
				<input type="password"  name="password" size="30" placeholder="Password..." >
				<i class=" fa fa-key fa-lg fa-fw" ></i>
             </div>      
		      

		    <p  class="Button" style="text-align:center;font-size:22px;"><a  href="#">Login</a></p>
			
			<p style="text-align:center;"><a  href="#" style="text-decoration:none;color:#1e90ff;background-color:#464343;">Forgot Password ?</a></p>
			
			<p  class="Button" style="font-family: Amiri;font-size:15px;text-align:center;color:#fff;margin-top:0px"><a  href="doctor_account.php">Create Account</a></p>
			
		</div>	
		
        <!-- i m doctor -->
        <div class="boxone">
            <img src="../assets/img/doc.png" alt="Doctor" width="400" height="400">
            
        </div>
       
        
</section>


</body>
</html>

