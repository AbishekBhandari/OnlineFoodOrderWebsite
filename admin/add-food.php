<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h2>Add Food</h2>
    </div>

    <br><br>
    <?php 
    if(isset($_SESSION['upload'])){

        echo $_SESSION['uplaod'];
        unset($_SESSION['upload']);

    }
    
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <table  class=tbl-30>
            <tr>
                <td>Title</td>
                <td>
                    <input type="text" name="title" placeholder="Title of the food">
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <textarea name="description" id="" cols="30" rows="5" placeholder="Description of the food"></textarea>
                </td>
            </tr>
            <tr>
                <td>Price</td>
                <td>
                    <input type="number" name="price" placeholder="Price">
                </td>
            </tr>
            <tr>
                <td>Select Image</td>
                <td>
                    <input type="file" name="image" id="">
                </td>
            </tr>
            <tr>
                <td>Category</td>
                <td>
                    <select name="category" id="">
                        <?php
                        //php code to display categories from database
                        //sql code to fetch categories
                        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                        //executing query
                        $run = mysqli_query($conn,$sql);
                        //to check whether we have values or not
                        $count = mysqli_num_rows($run);
                        if($count>0){
                            //we have categories
                            while($row=mysqli_fetch_assoc($run)){

                                $id = $row['id'];
                                $title = $row['title'];
                                ?>
                            <option value="<?php echo $id; ?>"><?php echo $title ;?></option>
                            
                                <?php

                            }

                        }
                        else{
                            //we donot have categories
                            ?>
                            <option value="0">No categories</option>
                            <?php
                        }
                        
                        ?>
                       
                    </select>
                </td>
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
                <td clospan="2">
                    <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                </td>
            </tr>
        </table>

    </form>

<?php
//to insert form data i.e foods into tbl_food

if(isset($_POST["submit"])){
    //process form data i.e store the data in variables
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    $category = $_POST["category"];
    if(isset($_POST["featured"])){
        $featured = $_POST["featured"] ;
    }
    else{
        $featued = "No";
    }
    if(isset($_POST["active"])){
        $active = $_POST["active"] ;
    }
    else{
        $active = "No";

    }
//upload the image
    if(isset($_FILES['image']['name'])){
        $image_name = $_FILES['image']['name'];
        //check whether image is selected or not
        if($image_name!=""){
            //image is selected
            //get the extension of selected image
            $ext = end(explode('.',$image_name));
            //create the new name for image
            $image_name = "Food-name-".rand(0000,9999).".".$ext;
            //upload the image
            //source path
            $src = $_FILES['image']['tmp_name'];
            //destination path
            $dst = "../images/food/".$image_name;
            $upload = move_uploaded_file($src,$dst);

            //check whether image uploaded or not
            if($upload==false){
                //failed to upload the image;
                die();
                $_SESSION['uplaod'] = "<div>Failed to upload the image</div>"; 
                header("location:".SITEURL."admin/add-food.php");
            }
            else{

            }


        }
        

    }
    else{
        $image_name = "";
    }
  
    //sql command to add food into database
    $sql2 = "INSERT INTO tbl_food set
            title = '$title',
            description = '$description',
            price = '$price',
            image_name = '$image_name',
            category_id = '$category',
            featured = '$featured',
            active = '$active'
                ";
    //execute the query
    $res2 = mysqli_query($conn,$sql2);
    if($res2==true){
        $_SESSION['add'] = "<div>Food Added Successfully</div>";
        header("location:".SITEURL."admin/manage-food.php");
    }
    else{
        $_SESSION['add'] = "<div>Food NOT Added</div>";
        header("location:".SITEURL."admin/manage-food.php");
    }

}



?>


</div>













<?php include('partials/footer.php'); ?>