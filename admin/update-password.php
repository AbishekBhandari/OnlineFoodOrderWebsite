<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>
        <?php 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }


        ?>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Current Password</td>
                    <td>
                        <input type="password" name="current_password" placeholder="current password">
                    </td>
                </tr>
                <tr>
                    <td>New password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="new password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="confirm password">
                    </td>
                </tr>

                <tr colspan="2">
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                    </td>
                    <td>
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php 

if(isset($_POST['submit'])){
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    $sql = "SELECT * from tbl_admin where id=$id and password='$current_password' ";
    $res = mysqli_query($conn,$sql);

    if($res==true){
        $count = mysqli_num_rows($res);
        if($count==1){
            if($new_password==$confirm_password){
                $sql1 = "UPDATE tbl_admin set
                        password='$new_password'
                        where id=$id";
                    $res1 = mysqli_query($conn,$sql1);
                if($res1==true){
                    $_SESSION['change-pwd'] = "<div style='color:green'>Password changed successfully</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
                else{
                    $_SESSION['change-pwd'] = "<div style='color:red'>Failed to change password</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }

            }
            else{
                //redirect to manage admin
                $_SESSION['password-not-match'] = "<div style='color:red'>Password not matched</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        else{
            $_SESSION['error'] = "<div class='error' style='color:red'>User not found</div>";
            //Redirect the user
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
}





?>






<?php
include('partials/footer.php');
?>