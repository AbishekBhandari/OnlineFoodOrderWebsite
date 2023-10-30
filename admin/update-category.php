<?php include('partials/menu.php'); ?>
<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT *from tbl_category where id='$id'";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    if($count==1){
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $current_image = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];
    }
}
else{
    header('location:'.SITEURL.'admin/manage-category.php');
}






?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" value="<?php echo $title?>"></td>
                </tr>
                <tr>
                    <td>Current Image</td>
                    <td>
                        <?php 
                        if($current_image!=""){
                        ?>
                            <img src="<?php echo SITEURL?>images/category/<?php echo $current_image ?>" width="100px">
                            <?php
                        }
                        else{
                            echo "Image not added";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New image</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "Checked";} ?> type="radio" value="Yes" name="featured">Yes
                        <input <?php if($featured=="No"){echo "Checked";} ?> type="radio" value="No" name="featured">No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                    <input <?php if($active=="Yes"){echo "Checked";} ?> type="radio" value="Yes" name="active">Yes
                    <input <?php if($active=="No"){echo "Checked";} ?> type="radio" value="No" name="active">No
                    </td>
                </tr>
                <tr>
                    <td>
                        
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
                
            </table>
        </form>
       
    </div>
</div>

<?php 

if(isset($_POST['submit'])){
    
    $title= $_POST['title'];
    $featured= $_POST['featured'];
    $active= $_POST['active'];
    
    //updating the image if selected
    if(isset($_FILES['image']['name'])){
        $image_name = $_FILES['image']['name'];

        if($image_name!=""){
            //image available
            //upload the new image remove the current image
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/category/".$image_name;
            $upload = move_uploaded_file($source_path,$destination_path);

            //remove the current image
            $path = "../images/category/".$current_image;
            $remove = unlink($path);

            //check whether the image is removed or not


            
        }
        
        else{
            $image_name = $current_image;
        }
    }








    $sql1 = "UPDATE tbl_category set title='$title',
            featured='$featured',
            image_name = '$image_name',
            active='$active' where id=$id";
    $res = mysqli_query($conn,$sql1);
    if($res==true){
        $_SESSION['update'] = "Update Successfully";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    else{
        $_SESSION['update'] = "Update failed";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
}

?>

<?php include('partials/footer.php'); ?>