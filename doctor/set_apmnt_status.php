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
if(isset($_GET['s']) and isset($_GET['id'])){
    $app_status = $_GET['s'];
    $app_id = $_GET['id'];
    $msg = $_GET['msg'];
    $query =  mysqli_query($conn,"update appointments set app_status='$app_status',app_msg='$msg' where app_id='$app_id'");

    if($query){
        if($app_status='Cancelled'){
          header('location:doc_dashboard.php');
        }else{
          header('location:doc_appointment.php');
        }
        
    }


}

?>