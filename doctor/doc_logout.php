<?php

session_start();
session_unset($_SESSION['email']);
$_SESSION['email'] = false;
header('location:../pages/index.php');

?>