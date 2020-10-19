<?php
session_start();
include('../connection/db.php');

if(isset($_POST['submit'])) {
  $hp_id = $_POST['hp_id'];
  
  $query = mysqli_query($conn, "select * from pat_login where pat_id=$hp_id");
  if($query){
  if(mysqli_num_rows($query)>0){
	  echo "<script>window.location.href  = 'send_otp.php?hpid=$hp_id';</script>";
	//   header("location:send_otp.php?hpid="+$hp_id); 

  } else {
    echo "<script>alert('Invalid Health passport ID, please try again!')</script>";
  }

}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>MedTech Solution</title>
<?php include('..\widgets\all_links.php'); ?>
<link href="../stylesheet/styleme.css" rel="stylesheet" type="text/css" media="screen, projection"/>

<style>
	.inputs{
		width:auto;
		border: 2px solid dodgerBlue;
		border-radius: 8px;
		margin: 8px 0px;
		padding:8px;
		box-sizing:border-box;
		outline:none;
		
	}
	
	.inputs:focus{
		border-color: #0066cc;
		box-shadow:0 0 8px 0 #0066cc;
	}

	.custom_buttons{
	border-radius:4px;
	font-family: "Amiri";
    background: #3498db;
    color: #fff;
	border: none;
	padding:10px 0px 10px 0px;
	text-decoration: none;
	margin:10px 0px 10px 0px;
	width:317px;
	outline:none;

	}
	
	.custom_buttons:hover {
    background: #088bf0;
    color: #fff;
	}
	
	label{
			font-family:"Amiri";
			color:#088bf0;
			font-size:19px;
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
	
		<div class="boxone">
            <form method="post">

			<table style="margin-top: 15%;">
				<tr>
					<td colspan="2">
						<h1 style="text-align:center;font-family:Amiri;color:#088bf0;font-size:30px;">Health Passport</h1>
					</td>
				</tr>
				<tr>
					<td>
						<label>HP Id :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="hp_id" placeholder="Health Passport Id...." required>
					</td>
				</tr>
				<tr>
				<td colspan="2">
					<input class="bigb" id="submit" value="Send OTP" name="submit" type="submit" >	
				</td>
				</tr>
				</table>
				</form>

			
		</div>	
		
        <!-- i m doctor -->
        <div class="boxone">
            <img src="../assets/img/hp.png" alt="Doctor" width="400" height="400">
            
        </div>
        <!-- i m Patient -->
     </div>   
</section>


</body>
</html>

