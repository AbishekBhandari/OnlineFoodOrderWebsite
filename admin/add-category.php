<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Category Title"></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Add Category" name="submit" class="btn-secondary"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    if(isset($_POST['featured'])){
        $featured = $_POST['featured'];
    }
    else{
        $featured = "No";
    }
    if(isset($_POST['active'])){
        $active = $_POST['active'];
    }
    else{
        $active = "No";
    }
//    print_r($_FILES['image']);
//    die();
    if(isset($_FILES['image']['name']))
    {
    //upload the image
    $image_name = $_FILES['image']['name'];
    $source_path = $_FILES['image']['tmp_name'];
    $destination_path = "../images/category/".$image_name;
    $upload = move_uploaded_file($source_path,$destination_path);


    if($upload==false){
        $_SESSION['upload'] = "<div>Failed to upload</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    
    }
    
   
    $sql = "INSERT into tbl_category 
            set title='$title',
            featured='$featured',
            active='$active',
            image_name='$image_name'";
    $res = mysqli_query($conn,$sql);
    if($res==true){
        $_SESSION['add-category'] = $sql."category Added";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    else{
        echo "Unsuccessfull";
    }
}









?>













<?php include('partials/footer.php'); ?>