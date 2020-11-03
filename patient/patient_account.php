<?php
session_start();
include('../connection/db.php');

if(isset($_POST['submit'])) {
  $pat_email = $_POST['pat_email'];
  $pat_name = $_POST['pat_name'];
  $pat_gender = $_POST['pat_gender'];
  $pat_pass = $_POST['pat_pass'];
  $pat_con_pass = $_POST['pat_con_pass'];

  
  if($pat_pass==$pat_con_pass){
    $query = mysqli_query($conn,"insert into pat_register(pat_name, pat_gender)values('$pat_name','$pat_gender')");
    $last_id = $conn->insert_id;
    $query1 = mysqli_query($conn,"insert into  pat_login(pat_id ,pat_email,pat_pass)values('$last_id','$pat_email','$pat_pass')");
  
    if($query and $query1){
    
        $_SESSION['pat_email'] = $pat_email;
        echo "<script>alert('Registered Successful!')</script>";
        header('location:complete_pat_profile.php');
    } else {
      echo "<script>alert('Something went wrong, please register again!')</script>";
    }


} else {
    echo "<script>alert('Your password and confirm password are not matching!')</script>";

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
			
			<table>
				<tr>
					<td colspan="2">
					<h1 style="text-align:center;padding-right:80px;font-family:Amiri;color:#088bf0;font-size:30px;">Patient Registration</h1>
					</td>
				</tr>
				<tr>
					<td>
						<label>Email Id :</label>
					</td>
					<td>
						<input class="inputs"  type="email" name="pat_email" size="30" placeholder="Email...." required >
					</td>
				</tr>
				<tr>
					<td>
						<label>Name :</label>
					</td>
					<td>
						<input class="inputs"  type="text" name="pat_name" size="30" placeholder="First Middle Last" required/>
					</td>
				</tr>
				<tr>
					<td>
						<label>Gender :</label>
					</td>
					<td>
						<input type="radio" id="male" value="male" name="pat_gender" style="padding-left:10px;margin:0px 0px;">
						<label>Male </label>
						<input type="radio" id="female" value="female" name="pat_gender">								
						<label>Female </label>

					</td>
				</tr>
				<tr>
					<td>
						<label>Passsword :</label>
					</td>
					<td>
						<input class="inputs"  type="password" name="pat_pass" size="30" placeholder="Password...." required/>
					</td>
				</tr>
				<tr>
					<td>
						<label>Conform Passsword :</label>
					</td>
					<td>
						<input class="inputs"  type="password" name="pat_con_pass" size="30" placeholder="Conform Password...." required/>
					</td>
				</tr>
				</table>
				<input class="bigb" id="submit" value="Register" name="submit" type="submit" >

				</form>

			
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

