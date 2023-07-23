<?php
$servername="localhost";
$username="root";
$password="";
$dbname="road safety monitoring system";
$conn=mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  die("connection failed:". mysqli_connect_error());
}
//else
//echo"conneted successfully";
