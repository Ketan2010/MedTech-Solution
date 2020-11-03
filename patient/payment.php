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
  }

?>
<?php
 if (isset($_POST['submit']))
 { 
	 $app_id=$_GET['app_id'];
	 $name_card=$_POST['name_card'];
	 $card_no=$_POST['card_no'];
	 $exp_date=$_POST['exp_date'];
	 $cvv=hash ( 'sha256' , $_POST['cvv']   ) ;
	 $amount=$_POST['amount'];
	 
	 $query=mysqli_query($conn,"insert into payment (app_id,name_card,card_no,exp_date,cvv,amount,pay_date,pay_status)values('$app_id','$name_card','$card_no','$exp_date','$cvv','$amount',CURDATE(),'0')");
	 $query=mysqli_query($conn,"select * from payment where app_id='$app_id'");
	 $row=mysqli_fetch_array($query);
	 $pay_id=$row['pay_id'];
 
  if ($query)
  {echo "<script>window.location.href  = 'send_otp.php?pay_id=$pay_id';</script>";}

  else
  {echo "<script>alert('Something went wrong , Please try again!')</script>";	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('..\widgets\all_links.php'); ?>
<link href="../stylesheet/styleme.css" rel="stylesheet" type="text/css" media="screen, projection"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
/* Add styles to the form container */
.form-container {
  max-width: 35%;
  padding: 10px;
  margin-left:20%;
  border:2px solid ;
  background-color:#f2f2f2;
 
  
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] ,.form-container input[type=date] ,.form-container input[type=time],.form-container input[type=month] {
  width: 65%;
  padding: 5px;
  margin: 5px 0 ;
  margin-left:12%;
  border-radius : 10px;
  background: #f1f1f1;
  border-color: #088bf0;

}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus ,.form-container input[type=date] ,.form-container input[type=time] ,.form-container input[type=month]{
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
		font-size:14px;
		  color:#1e90ff;
		   margin-left:12%;
}


/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
.bigb {
	background-color:#4c86eb;
	border-radius:20px;
	border:1px solid #4e6096;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	padding:8px 25px;
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


.icon-container {
  margin-bottom: 20px;
  padding: 14px 0;
  font-size: 30px;
   margin-left:12%;
}
	
	
</style>

</head>
<body>




<div class="main">
        
<h2 style="color:#a6d9fc;margin-left:30%;" ><i class="fa fa-rupee" style="font-size:30px;color:#a6d9fc;"></i> Pay Online</h2>

	

    <form method="post"  class="form-container">
	
	<label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:black;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
	
	<label> Name on Card</label><br>
    <input type="text"  name="name_card" required><br>
    
			
	<label>Credit card number</label><br>
	<input type="text" placeholder="---- ----  ---- ----" name="card_no" required><br>

    <label>Month and Year of Expiry</label><br>
	<input type="month"   name="exp_date" required><br>

	<label> CVV</label><br>
	<input type="text"  placeholder="- - -" name="cvv" required>  <br>
	
	<label> Amount</label><br>
    <input type="text"  name="amount" required><br>
	
	
    <input class="bigb" id="submit" value="Pay" name="submit" type="submit" style="margin-left:35%;" >

  
</form>
   </div> 
</body>
</html>

