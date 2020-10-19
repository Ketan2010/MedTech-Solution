<?php
include('../connection/db.php');
session_start();
$pat_id=$_GET["hpid"];
$query = mysqli_query($conn,"select * from pat_login where pat_id='$pat_id'");
$row = mysqli_fetch_array($query);
$pat_email = $row['pat_email'];
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
      $_SESSION['pat'] = $pat_id;
      echo "<script>alert('OTP sent successfully on patient registered mail.')</script>";   
      // sleep(2);
      echo "<script>window.location.href='HP_OTP_Validation.php';</script>";   

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