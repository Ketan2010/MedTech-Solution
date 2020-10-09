<?php

include('../connection/db.php');
$del = $_GET['del'];
$query = mysqli_query($conn,"delete from appointments where app_id= '$del'");

if($query){
  header('location:pat_appointment.php');
  
}else {
  echo "<script>alert('Error!')</script>";
}
?>