<!DOCTYPE html>
<html lang="en">
<head>
<?php include('../widgets/all_links.php'); ?>
</head>
<body>
<!-- this is a navbar for before login -->
<?php include('../widgets/outer_navbar.php');?>

<section class="home">
    <div class="flex-parent">
        <!-- i m doctor -->
        <div class="boxone">
            <img src="../assets/img/doc.png" alt="Doctor" width="400" height="400">
            <p style="text-align: center;" class='myButton' ><a  href="../doctor/doctor_login.php">I'm Doctor</a></p>
        </div>
        <!-- i m Patient -->
        <div class="boxone">
            <img src="../assets/img/pat.png" alt="Patient" width="400" height="400">
            <p style="text-align: center;" class='myButton' ><a  href="../patient/patient_login.php">I'm Patient</a></p>
        </div>
    </div>
</section>


</body>
</html>

