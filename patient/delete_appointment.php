<?php

include('../connection/db.php');
$del = $_GET['del'];

$query = mysqli_query($conn,"delete from appointments where app_id= '$del'");

if($query){
  // if delete called from dashboard
  if(isset($_GET['from'])){
    header('location:patient_dashboard.php');

  }else{
    // if from pat_appointment
    header('location:pat_appointment.php');

  }
}else {
  echo "<script>alert('Error!')</script>";
}
?>