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
              <h2>Manage Admin</h2>
              <br/><br/>
              <?php 
              if(isset($_SESSION['add'])){
                  echo $_SESSION['add'];
                  unset($_SESSION['add']);
              }

              if(isset($_SESSION['delete'])){
                  echo $_SESSION['delete'];
                  unset($_SESSION['delete']);
              }

              if(isset($_SESSION['update'])){
                  echo $_SESSION['update'];
                  unset($_SESSION['update']);
              }
              
              if(isset($_SESSION['error'])){
                  echo $_SESSION['error'];
                  unset($_SESSION['error']);
              }
              if(isset($_SESSION['password-not-match'])){
                  echo $_SESSION['password-not-match'];
                  unset($_SESSION['password-not-match']);
              }
              if(isset($_SESSION['change-pwd'])){
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
            }
           
              
              ?>
              <br><br>
              <a href="add-admin.php" class="btn-primary">Add Admin</a>
              <br/><br/><br/>
              
              <table class="tbl-full">
                  <tr>
                      <th>S.N</th>
                      <th>Full Name</th>
                      <th>Username</th>
                      <th>Actions</th>
                  </tr>
                  <?php 
                    $sn = 1;
                  $sql = "SELECT * FROM tbl_admin";
                  $res = mysqli_query($conn,$sql);
                  if($res==TRUE){
                      $count = mysqli_num_rows($res);
                      if($count > 0){
                          while($rows = mysqli_fetch_assoc($res)){
                              $id = $rows['id'];
                              $fullname = $rows['fullname'];
                              $username = $rows['username'];
                              ?>
                    
                    <tr>
                      <td><?php echo $sn++; ?></td>
                      <td><?php echo $fullname; ?></td>
                      <td><?php echo $username ; ?></td>
                      <td>
                          <a href="<?php echo SITEURL ?>admin/update-password.php?id=<?php echo $id?>" class="btn-primary">Change Password</a>
                        <a href="<?php echo SITEURL?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger"> Delete Admin</a>
                      </td>
                  </tr>
                

                              <?php
                          }
                      }
                      else{
                          //NO data in database
                      }
                  }
               
                  ?>
             
              </table>
              
        </div>
         <!--Main content section ends -->


         <?php include('partials/footer.php') ?>
    </body>

</html>