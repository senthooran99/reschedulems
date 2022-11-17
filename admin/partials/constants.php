<?php
session_start();
define('SITEURL','http://localhost/reschedulems/');
$conn=mysqli_connect('localhost:3307','root','') or die(mysqli_error()); 
$db_select=mysqli_select_db($conn,'reschedule management system') or die(mysqli_error());
?>