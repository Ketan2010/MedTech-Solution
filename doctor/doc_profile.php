<!DOCTYPE html>
<html lang="en">
<head>
<title>MedTech Solution</title>
<?php include('..\widgets\all_links.php'); ?>
<link href="../stylesheet/styleme.css" rel="stylesheet" type="text/css" media="screen, projection"/>

<style>

.card-body{
	padding-bottom:4%;
	margin:2% 2%;
	border-radius:10px;
    width:auto;
	}
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
	border-radius:20px;
	font-family: "Amiri";
    background: #3498db;
    color: #fff;
	font-size:25px;
	padding:10px 60px;
	border: none;
	text-align:center;
	text-decoration: none;
	margin-left:40%;

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
	
	table {
  font-family: arial, sans-serif;
  background-color: black;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #7a7b7d;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: black;
}
.checked {
  color: orange;
}
</style>


</head>
<body>
<!-- navbar for patient part -->
<?php include('doc_navbar.php');?>
<!-- vertical navbar for patient part -->
<?php include('doc_vertical_nav.php');?>


<div class="main">
        

    <div style="display: flex;justify-content: space-between;">
        <h2 style="color:#a6d9fc" >Your Profile</h2>
        <p style="margin: 0 40 0 700px;" class='myButton' >
            <a  href="doc_profile_update.php"><span style="font-size:20px; color:white" class="fas fa-user-edit"></span> Edit Profile</a>
        </p>
    </div>

    <section style="margin-top:-40px" class="home">
    <br>
    <h2 style="color:#a6d9fc" >Ratings : <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span></h2>
        <div  class="flex-parent">
                
            <div class="boxone">
                <h2 style="color:#a6d9fc" >General Information</h2>
                <table>
                    <tr>
                        <td>Name :</td>
                        <td>Joahn</td>
                    </tr>
                    <tr>
                        <td>Gender :</td>
                        <td>Male</td>
                    </tr>
                    <tr>
                        <td>Date of Birth :</td>
                        <td>20/1/1955</td>
                    </tr>
                    <tr>
                        <td>Age :</td>
                        <td>65</td>
                    </tr>
                    <tr>
                        <td>Contact No :</td>
                        <td>1122334455</td>
                    </tr>
                    <tr>
                        <td>Email Id :</td>
                        <td>john@doctor.com</td>
                    </tr>
                </table>
            </div>
                
            <div class="boxone">
                <h2 style="color:#a6d9fc" >Other Information</h2>
                <table>
                    <tr>
                        <td>Designation :</td>
                        <td>Cardiologist</td>
                    </tr>
                    <tr>
                        <td>Specialization :</td>
                        <td>Cardiology</td>
                    </tr>
                    <tr>
                        <td>Education :</td>
                        <td>MBBS, MD</td>
                    </tr>
                    <tr>
                        <td>Experience(yrs) :</td>
                        <td>16</td>
                    </tr>
                    <tr>
                        <td>Hospital Name:</td>
                        <td>MedTech</td>
                    </tr>
                    <tr>
                        <td>Hospital Address :</td>
                        <td>London</td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </section>       

</div>

</body>
</html>

