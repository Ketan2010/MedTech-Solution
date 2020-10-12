<?php

include('../connection/db.php');
$did = $_GET['did'];
$pid = $_GET['pid'];
$query = mysqli_query($conn,"delete from doc_pat where doc_id= '$did' and pat_id='$pid'");

if($query){
  header('location:patients_data.php');
}else {
  echo "<script>alert('Error!')</script>";
}
?>