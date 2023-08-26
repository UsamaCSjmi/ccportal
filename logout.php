<?php
session_start();
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_TYPE']) ;
unset($_SESSION['USERNAME']) ;
unset($_SESSION['USER_ID']) ;
header('location:login.php');
die();
?>