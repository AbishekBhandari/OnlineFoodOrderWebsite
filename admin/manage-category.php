<html>
    <head>
        <title>Food Order Website</title>
        <link rel="stylesheet" href="../css/admin.css">
        
    </head>

    <body>
       <?php include('partials/menu.php'); ?>
        <!--Main content section starts -->
        <div class="main-content">
            <div class="wrapper">
              <h2>Manage Category</h2>
              <br/><br/>
              <?php 
              if(isset($_SESSION['add-category'])){
                  echo $_SESSION['add-category'];
                  echo "<br><br>";
                  unset($_SESSION['add-category']);
              }
              if(isset($_SESSION['remove'])){
                echo $_SESSION['remove'];
                echo "<br>";
                unset($_SESSION['remove']);
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                echo "<br>";
                unset($_SESSION['delete']);
            }
              
              ?>
              
              <a href="add-category.php" class="btn-primary">Add Category</a>
              <br/><br/><br/>
              <table class="tbl-full">
                  <tr>
                      <th>S.N</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Featured</th>
                      <th>Active</th>
                      <th>Actions</th>
                  </tr>
                <?php 
                $sql = "SELECT * from tbl_category";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                $sn =1;
                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        $featured=$row['featured'];
                        $active=$row['active'];
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $title; ?></td>
                            <td>
                                <?php 
                                if($image_name!=""){
                                    ?>
                                    <img src="<?php echo SITEURL?>images/category/<?php echo $image_name?>" alt="" width="50px">

<?php
                                }
                                else{
                                        echo "Image not added";
                                }
                            
                                ?>
                            </td>
                            <td><?php echo $featured ?></td>
                            <td><?php echo $active ?></td>
                            <td>
                                <a href="<?php echo SITEURL?>admin/update-category.php?id=<?php echo $id?>" class="btn-secondary">Update Category</a>
                                <a href="<?php echo SITEURL ?>admin/delete-category.php?id=<?php echo $id ?>&image_name=<?php echo $image_name?>" class="btn-danger">Delete Category</a>
                            </td>
                        </tr>


                        <?php
                    }
                }
                else{
                    //we dont have data
                }
                
                
                
                
                ?>
              </table>
              
              
        </div>
         <!--Main content section ends -->


         <?php include('partials/footer.php') ?>
    </body>

</html>