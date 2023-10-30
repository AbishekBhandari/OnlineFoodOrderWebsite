
<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h2>Update Admin</h2>
        <br><br>
        <?php 
            $id = $_GET['id'];
            $sql = "SELECT *FROM tbl_Admin WHERE id=$id";
            $res = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_assoc($res);
            if($res==TRUE){
                $fullname = $rows['fullname'];
                $username = $rows['username'];
               
            }
            else{
                //not working
            }
        
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Fullname</td>
                    <td><input type="text" name="fullname" value="<?php echo $fullname;?>"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?php echo $username;?>" ></td>
                </tr>
              
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                        <input type="submit" name="submit" value="Update" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
        <?php 
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $fullname = $_POST['fullname']; 
                $username = $_POST['username'];
                //Create a SQL query to update admin
                $sql = "UPDATE  tbl_admin  SET 
                        fullname= '$fullname',
                        username = '$username'
                        WHERE id='$id'
                        ";
                $res = mysqli_query($conn,$sql);
                if($res==TRUE){
                    $_SESSION['update'] = $sql;
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
                else{

                }


            }
        
        ?>
    </div>
</div>




<?php include('partials/footer.php'); ?>