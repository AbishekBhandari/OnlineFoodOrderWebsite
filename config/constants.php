<?php 
session_start();
define('SITEURL','http://localhost/food-order/');
$conn = mysqli_connect('localhost','root','') or die(mysqli_error());
        $db_select = mysqli_select_db($conn,'food-order') or die(mysqli_error());



 ?>