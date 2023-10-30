<?php 
    //include constants.php fie
    include('../config/constants.php');
    //get the id of admin to be deleted
    $id = $_GET['id'];

    //create sql query to delete admin

    $sql = " DELETE FROM tbl_admin where id=$id";

    //Execute the query
    $res = mysqli_query($conn,$sql);
    if($res==TRUE){
        //Query executed successfully and Admin Deleted
        // echo "Admin deleted";
        $_SESSION['delete'] = $sql;
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        //Failed to delete
        $_SESSION['delete'] = "Failed to delete Admin.Try Again Later";
        header("location:".SITEURL.'admin/manage-admin.php');
    }

    //Redirect to Admin Page with message (success/error)







?>