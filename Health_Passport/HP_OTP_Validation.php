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
	width:420px ;
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

</style>


</head>
<body>
<!-- this is a navbar for before login -->
<?php include('../widgets/outer_navbar.php');?>

<section class="home">
    <div class="flex-parent">
	
		<div class="boxone">
            	
			<table style="margin-top: 15%;">
				<tr>
					<td colspan="2">
						<h1 style="text-align:center;font-family:Amiri;color:#088bf0;font-size:30px;">Health Passport OTP Validation</h1>
					</td>
				</tr>
					<td>
						<label>Enter OTP :</label>
					</td>
					<td>
						<input class="inputs"  type="number" style="width:100%" name="otp"  size="30" placeholder="Enter OTP...."/>
					</td>
				<tr>
					<td colspan="2">
						<input class="custom_buttons" type="button" value="Verify" name="Send_otp" />
					</td>
				</tr>
				</table>

			
		</div>	
		
        <!-- i m doctor -->
        <div class="boxone">
            <img src="../assets/img/pat.png" alt="Doctor" width="400" height="400">
            
        </div>
        <!-- i m Patient -->
     </div>   
</section>


</body>
</html>

