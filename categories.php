<?php include('partials-front/menu.php'); ?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Categories</h2>

            <?php 
            
            //create sql query to select categories from database and display
            $sql = "SELECT * FROM tbl_category where active='Yes'";
            //execute the query
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0){
                while($rows=mysqli_fetch_assoc($res)){
                    $id = $rows['id'];
                    $title = $rows['title'];
                    $image = $rows['image_name'];
                    ?>
                         <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id;?>">
                            <div class="box-3 float-container">
                                <img src="<?php echo SITEURL ?>images/category/<?php echo $image?>" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-red"><?php echo $title?></h3>
            </div>
            </a>

                    <?php
                }

            }else{
                echo "<div>Unavailable</div>";
            }
            
            
            
            ?>
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

   >

</body>
</html>