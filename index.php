<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <!-- <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section> -->
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    
   
    <section class="categories">
        <div class="container">
        <?php
     if(isset($_SESSION['order'])){
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    } ;
    ?>
            <h2 class="text-center">Explore Foods</h2>
            <?php 
            
            //create sql query to select categories from database and display
            $sql = "SELECT * FROM tbl_category where featured='Yes' and active='yes' limit 3";
            //execute the query
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0){
                while($rows=mysqli_fetch_assoc($res)){
                    $id = $rows['id'];
                    $title = $rows['title'];
                    $image = $rows['image_name'];
                    ?>
                         <a href="<?php echo SITEURL?>category-foods.php?category_id=<?php echo $id ?>">
                            <div class="box-3 float-container">
                                <img src="<?php echo SITEURL ?>images/category/<?php echo $image?>" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-black"><?php echo $title?></h3>
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

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
       
    
   
            <h2 class="text-center">Food Menu</h2>
            <?php 

            //sql to select foods from database and display in homepage
            $sql2 = "SELECT * FROM tbl_food where active='Yes' and featured='Yes'";
            $res2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2>0){
                while($row=mysqli_fetch_assoc($res2)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image = $row['image_name'];

                    ?>
                     <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="<?php echo SITEURL ?>images/food/<?php echo $image?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="food-price"><?php echo $price;?></p>
                    <p class="food-detail">
                        <?php echo $row['description']; ?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>

                    <?php
                }
            }
           
            ?>

        
            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL;?>foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

   <?php include('partials-front/footer.php'); ?>