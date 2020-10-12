<?php
  // check authentication
  session_start();
  if($_SESSION['email']==true){
    include('../connection/db.php');
    $dmail= $_SESSION['email'];
    $query2 =  mysqli_query($conn,"select * from doctor_register where doc_mail='$dmail'");
    $row2 = mysqli_fetch_array($query2);
    $dr = $row2['doc_name'];
    $did = $row2['doc_id'];
  }else{
    header('location:doctor_login.php');
  }
?>

<?php
  include('../connection/db.php');
if(isset($_GET['did']) and isset($_GET['pid'])){
    $doc_id = $_GET['did'];
    $pat_id = $_GET['pid'];
   
    $query =  mysqli_query($conn,"insert into doc_pat(doc_id, pat_id) values('$doc_id','$pat_id')");

    if($query){
        echo "<script>alert('Patient added successfully');</script>";
        echo "<script>window.location='doc_appointment.php';</script>";
    }


}

?>