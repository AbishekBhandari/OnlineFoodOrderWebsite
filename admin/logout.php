<?php 
include('../config/constants.php');
//Destro the session and page redirected to login page
session_destroy();

header('location:'.SITEURL.'admin/login.php');





?>