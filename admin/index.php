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
               <?php 
                    if(isset(($_SESSION['user']))){
                        echo "<h1 style='color:teal'>Welcome,{$_SESSION['user']}!</h1>";
                        
                    }

                ?>
              <h2>Dashboard</h2>
              <?php 
              if(isset(($_SESSION['login']))){
                  echo $_SESSION['login'];
                  unset($_SESSION['login']);
              }
              
              
              ?>
              <div class="col-4 text-center">
                  <?php 
                  
                  $sql = "SELECT * FROM tbl_admin";
                  $res = mysqli_query($conn,$sql);
                  if($res==true){
                      $count = mysqli_num_rows($res);
                  }
                  ?>
                 <h1><?php echo $count; ?></h1>
                 Admin
             </div>
             <div class="col-4 text-center">
             <?php 
                  
                  $sql = "SELECT * FROM tbl_order";
                  $res = mysqli_query($conn,$sql);
                  if($res==true){
                      $count = mysqli_num_rows($res);
                  }
                  ?>
                 <h1><?php echo $count; ?></h1>
                 Order
             </div>
             <div class="col-4 text-center">
             <?php 
                  
                  $sql = "SELECT * FROM tbl_food";
                  $res = mysqli_query($conn,$sql);
                  if($res==true){
                      $count = mysqli_num_rows($res);
                  }
                  ?>
                 <h1><?php echo $count; ?></h1>
                 Food Items
             </div>
             <div class="col-4 text-center">
             <?php 
                  
                  $sql = "SELECT * FROM tbl_category";
                  $res = mysqli_query($conn,$sql);
                  if($res==true){
                      $count = mysqli_num_rows($res);
                  }
                  ?>
                 <h1><?php echo $count; ?></h1>
                 Categories
             </div>
            <div class="clearfix"></div>
        </div>
         <!--Main content section ends -->


         <?php include('partials/footer.php') ?>
    </body>

</html>