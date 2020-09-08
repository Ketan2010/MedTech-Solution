<!DOCTYPE html>
<html lang="en">
<head>
<title>MedTech Solution</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Tab logo -->
<link href="assets/img/tab_logo.png" rel="icon">
<!-- main js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="javascript/main.js"></script>
<!-- Template Main CSS File --> 
<link href="stylesheet/styleme.css" rel="stylesheet" type="text/css" media="screen, projection"/>
<!-- google fonts -->
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>
<body>
<!-- this is a navbar for before login -->
<?php include('outer_navbar.php');?>

<section class="home">
    <div class="flex-parent">
        <!-- i m doctor -->
        <div class="boxone">
            <img src="assets/img/doc.png" alt="Doctor" width="400" height="400">
            <p style="text-align: center;" class='myButton' ><a  href="get_started.php">I'm Doctor</a></p>
        </div>
        <!-- i m Patient -->
        <div class="boxone">
            <img src="assets/img/pat.png" alt="Patient" width="400" height="400">
            <p style="text-align: center;" class='myButton' ><a  href="get_started.php">I'm Patient</a></p>
        </div>
    </div>
</section>


</body>
</html>

