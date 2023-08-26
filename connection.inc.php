<?php
session_start();
$username = "root";
$password = "";
$server = "localhost";
$database ="application";

$conn = mysqli_connect($server, $username, $password, $database );
if(!$conn){
    die("Error :". mysqli_connect_error());
}
?>