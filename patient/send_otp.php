<?php
include('../connection/db.php');
session_start();
$pay_id=$_GET["pay_id"];
$query = mysqli_query($conn,"select * from payment where pay_id='$pay_id'");
$row = mysqli_fetch_array($query);
$app_id = $row['app_id'];

$query1 = mysqli_query($conn,"select * from appointments where app_id='$app_id'");
$row1 = mysqli_fetch_array($query1);
$pat_id = $row1['pat_id'];

$query3 = mysqli_query($conn,"select * from pat_login where pat_id='$pat_id'");
$row3 = mysqli_fetch_array($query3);
$pat_email = $row3['pat_email'];

$query2 = mysqli_query($conn,"select * from pat_register where pat_id='$pat_id'");
$row2 = mysqli_fetch_array($query2);
$pat_name = $row2['pat_name'];





$otp=rand(1000, 9999);

if($pat_id){
  if($pat_email) { 
      // $to = $pat_email;
      // $headers = 'From: passrecovery121@gmail.com '."\r\n". 
      // 'Reply-To: ' . $to. "\r\n" . 
      // 'X-Mailer: PHP/' . phpversion();
      // $txt = "Hello, Your Verification code is : $otp.";

//       use PHPMailer\PHPMailer\PHPMailer; 
// use PHPMailer\PHPMailer\Exception;
      // Base files 
      require("PHPMailer/src/PHPMailer.php");
      require("PHPMailer/src/SMTP.php");
      require("PHPMailer/src/Exception.php");
        
      $mail = new PHPMailer\PHPMailer\PHPMailer(true);
$mail->setFrom('admin@example.com');
$mail->addAddress($pat_email);
$mail->Subject = 'Helth Passport Verification Code';
$mail->Body = 'Hello, Your Verification code is :'.$otp;
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl';
$mail->Host = 'ssl://smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Port = 465;
//Set your existing gmail address as user name;
$mail->Username = 'medtechsolutions.vit@gmail.com';
//Set the password of your gmail address here;
$mail->Password = 'medtech@1234';

      
      
      if($mail->send())
      {
        $_SESSION['superhero'] = $otp;
      $_SESSION['pay_id'] = $pay_id;
      echo "<script>alert('OTP sent successfully on patient registered mail.')</script>";   
      // sleep(2);
      echo "<script>window.location.href='pay_sent_otp.php';</script>";   

      // header("location:HP_OTP_Validation.php");
        }
      else{
        echo "<script>alert('OTP not sent')</script>";
      }
     
 
  }
  else
  {
    //send sms
  }
}
   
?>