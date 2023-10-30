<?php include('partials-front/menu.php'); ?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" class="order" method="POST">
                <fieldset>
                    <legend>Selected Food</legend>
                    <?php 
                    if(isset($_GET['food_id'])){
                        $id = $_GET['food_id'];
                        $sql = "SELECT * FROM tbl_food where id = $id";
                        $res = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($res);
?>

                        <div class="food-menu-img">
                        <img src="<?php SITEURL?>images/food/<?php echo $row['image_name'];?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $row['title']; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $row['title']; ?>">
                        <p class="food-price" id="price">NPR<?php echo $row['price']?></p>
                        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" id="qty" required>
                    
                        
                    </div>
<?php
                    }
                    else{
                        header("location:".SITEURL);
                    }
     
                    ?>
                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Abishek Bhandari" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. babishek25@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php 
            //Adding the order
                    if(isset($_POST['submit'])){
                        $food =$_POST['food'];
                        $price =$_POST['price'];
                        $quantity = $_POST['qty'];
                        $total = $price * $quantity;
                        $order_date = date("Y-m-d h:i:sa");
                        $status = "Ordered";
                        $customer_name= $_POST['full-name'];
                        $customer_contact= $_POST['contact'];
                        $customer_email= $_POST['email'];
                        $customer_address = $_POST['address'];

                        $sql2 = "INSERT INTO tbl_order set
                                food = '$food',
                                price ='$price',
                                qty = $quantity,
                                order_date = '$order_date',
                                total = $total,
                                status = '$status',
                                customer_name = '$customer_name',
                                customer_contact = '$customer_contact',
                                customer_email = '$customer_email',
                                customer_address = '$customer_address'

                                ";
                            $res2 = mysqli_query($conn,$sql2);
                            if($res2==true){
                                $_SESSION['order'] = "<div>Order successfull</div>";
                                header("location:".SITEURL);
                            }
                            else{
                                $_SESSION['order'] = "<div>Order unsuccessfull</div>";
                                header("location:".SITEURL);
                            }
                    }
            
            
            
            
            
            
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

   <?php include('partials-front/footer.php'); ?>


