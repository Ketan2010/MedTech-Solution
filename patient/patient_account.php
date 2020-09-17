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

	.Button a{
	border-radius:4px;
	font-family: "Amiri";
    background: #3498db;
    color: #fff;
	padding:7px 123px;
	border: none;
	text-align:center;
	text-decoration: none;
	margin-left:55px;
	}	
	
	.Button a:hover {
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
            
			<!--<h1 style="text-align:center;padding-right:80px;font-family:Amiri;color:#088bf0;font-size:30px;">Create Account</h1>
			 <label style="padding-right:91px;">Email Id     : </label>
			<input class="inputs" type="email" name="pat_email" size="30" placeholder="Email...."><br>
			<label style="padding-right:111px;">Name : </label>
			<input class="inputs"  type="text" name="pat_name" size="30" placeholder="First Middle Last"><br>
			<label style="padding-right:100px;"> Gender : </label>
				<label>Male </label>
				<input type="radio" id="male" value="male" name="gender" style="padding-left:10px;margin:0px 0px;">
				<label>Female </label>
				<input type="radio" id="female" value="female" name="gender"><br>	
			<label style="padding-right: 130px;">Phone No:</label>
			<input class="inputs" type="number" name="phone_no" placeholder="Phone number..."/> <br>
			<label style="padding-right:75px;">Passsword : </label>
			<input class="inputs"  type="password" name="pat_pass" size="30" placeholder="Password...."><br>
			<label>Conform Passsword : </label><input class="inputs"  type="password" name="pat_con_pass" size="30" placeholder="Conform Password...."><br> -->

			<table>
				<tr>
					<td colspan="2">
					<h1 style="text-align:center;font-family:Amiri;color:#088bf0;font-size:30px;">Create Account</h1>
					</td>
				</tr>
				<tr>
					<td>
						<label>Email Id :</label>
					</td>
					<td>
						<input class="inputs"  type="email" name="pat_email" size="30" placeholder="Email....">
					</td>
				</tr>
				<tr>
					<td>
						<label>Name :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="pat_name" size="30" placeholder="First Middle Last"/>
					</td>
				</tr>
				<tr>
					<td>
						<label>Gender :</label>
					</td>
					<td>
						<input type="radio" id="male" value="male" name="gender" style="padding-left:10px;margin:0px 0px;">
						<label>Male </label>
						<input type="radio" id="female" value="female" name="gender">								
						<label>Female </label>

					</td>
				</tr>
				<tr>
					<td>
						<label>Passsword :</label>
					</td>
					<td>
						<input class="inputs"  type="password" name="pat_pass" size="30" placeholder="Password...."/>
					</td>
				</tr>
				<tr>
					<td>
						<label>Conform Passsword :</label>
					</td>
					<td>
						<input class="inputs"  type="password" name="pat_con_pass" size="30" placeholder="Conform Password...."/>
					</td>
				</tr>
				</table>

			<p class="Button"><a href="#">Create Account</a></p>
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

