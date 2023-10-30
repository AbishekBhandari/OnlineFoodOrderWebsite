<?php 

//Authorization and access control
//check whether user is logged in or not
if(!isset($_SESSION['user'])){
    $_SESSION['no-login'] = "<div style='color:red' class='text-center'>Please login to proceed</div>";
    header('location:'.SITEURL.'admin/login.php');
}










?>