<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "cv_builders";
$conn = mysqli_connect($servername , $username , $password , $database);
$pdo = mysqli_connect($servername , $username , $password , $database);
if(!$conn){
  echo "database Error";
}
@session_start();
error_reporting(error_reporting() & ~E_NOTICE);
?>