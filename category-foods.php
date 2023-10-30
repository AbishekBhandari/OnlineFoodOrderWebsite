<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
        <h2>Foods on <a href="#" class="text-white">"Category"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
            
            if(isset($_GET['category_id'])){
                $id = $_GET['category_id'];
                $sql = "SELECT *FROM tbl_food where category_id = $id ";
                $res = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($res);
                if($count>0){
                        while($row=mysqli_fetch_assoc($res)){
                            ?>

                            <div class="food-menu-box">
                            <div class="food-menu-img">
                                <img src="<?php echo SITEURL?>images/food/<?php echo $row['image_name']?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            </div>
            
                            <div class="food-menu-desc">
                                <h4><?php echo $row['title']; ?></h4>
                                <p class="food-price"><?php echo $row['price']; ?></p>
                                <p class="food-detail">
                                    <?php echo $row['description']; ?>
                                </p>
                                <br>
            
                                <a href="<?php echo SITEURL?>order.php?food_id=<?php echo $row['id']; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                           

                            <?php
                        }

                }
                else{
                    echo "<div>Food not available</div>";
                }
            }
            
            
            
            ?>

         

            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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


</body>
</html>