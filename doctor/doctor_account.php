<?php
session_start();
include('../connection/db.php');

if(isset($_POST['submit'])) {
  $doc_mail = $_POST['doc_mail'];
  $doc_gender = $_POST['doc_gender'];
  $doc_name = $_POST['doc_name'];
  $doc_specializn = $_POST['doc_specializn'];
  $doc_pass = $_POST['doc_pass'];
  $doc_con_pass = $_POST['doc_con_pass'];
  
  if($doc_pass==$doc_con_pass){
    $query = mysqli_query($conn,"insert into doctor_register(doc_name, doc_specializn, doc_gender,doc_mail)values('$doc_name','$doc_specializn','$doc_gender','$doc_mail')");
    $last_id = $conn->insert_id;
    $query1 = mysqli_query($conn,"insert into doc_login(doc_id,doc_mail,doc_pass)values('$last_id','$doc_mail','$doc_pass')");
    var_dump($query);
    var_dump($query1);
    if($query and $query1){
    
        $_SESSION['email'] = $doc_mail;
        echo "<script>alert('Registered Successful!')</script>";
        header('location:complete_doc_profile.php');
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
		width:60%;
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
		<form method="post" action="doctor_account.php" name="doctor_account"> 
			<h1 style="text-align:center;padding-right:80px;font-family:Amiri;color:#088bf0;font-size:30px;">Doctor Registration</h1>
			<label style="padding-right:91px;">Email Id     : </label>
			<input class="inputs" type="email" name="doc_mail" size="30" placeholder="Email...." required><br>
			<label style="padding-right:111px;">Name : </label>
			<input class="inputs"  type="text" name="doc_name" size="30" placeholder="Doctor name" required><br>
			<label style="padding-right:48px;">Specialization : </label>
			<input class="inputs"  type="text" name="doc_specializn" size="30" placeholder="Designation...." required><br>
			<label style="padding-right:100px;"> Gender : </label>
				<label>Male </label>
				<input type="radio" id="male" value="male" name="doc_gender" style="padding-left:10px;margin:0px 0px;">
				<label>Female </label>
				<input type="radio" id="female" value="female" name="doc_gender"><br>
		    <label style="padding-right:75px;">Passsword : </label>
			<input class="inputs"  type="password" name="doc_pass" size="30" placeholder="Password...." required><br>
			<label>Conform Passsword : </label>
			<input class="inputs"  type="password" name="doc_con_pass" size="30" placeholder="Conform Password...." required><br>
			<input class="bigb" id="submit" value="Register" name="submit" type="submit" >
		</form>
		</div>	
		
        <!-- i m doctor -->
        <div class="boxone">
            <img src="../assets/img/doc.png" alt="Doctor" width="400" height="400">
            
        </div>
        
     </div>  
</section>


</body>
</html>


