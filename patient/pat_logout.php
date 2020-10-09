<?php

session_start();
session_unset($_SESSION['pat_email']);
$_SESSION['pat_email'] = false;
header('location:../pages/index.php');

?>