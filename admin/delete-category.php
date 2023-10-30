<?php 
include('../config/constants.php');
if(isset($_GET['id']) AND isset($_GET['image_name'])){

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    //remove the physical image
    if($image_name!=""){
        $path = "../images/category/".$image_name;
        $remove = unlink($path);
        //if failed to remove

        if($remove==false){
            $_SESSION['remove'] = "<div>Failed to remove category</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
}
        }
    

    //delete data from database
        $sql = "DELETE from tbl_category where id=$id";
        $res = mysqli_query($conn,$sql);
        if($res==true){
            $_SESSION['delete'] = "<div>Deleted Successfully</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else{
            $_SESSION['delete'] = "<div>failed to delete</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
    }
    
else{

    header('location:'.SITEURL.'admin/manage-category.php');
}





?>