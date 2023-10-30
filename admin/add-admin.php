
<html>

    <head>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>

        <?php include('partials/menu.php'); ?>
        <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>
            <br><br>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>FullName</td>
                        <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" placeholder="Enter your username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" placeholder="Enter your password"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

        </div>

        </div>

    <?php include('partials/footer.php'); ?>

    <?php 

    //process the value from form and save it in database
    //Check whether the button is clicked or not
    if(isset($_POST['submit'])){
        //echo "Button Clicked";
        $full_name = $_POST['full_name']; 
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        //SQL query to store the data in database;
        $sql = "INSERT INTO tbl_admin(fullname,username,password) VALUES('$full_name','$username','$password')";
       echo $sql;
        $res = mysqli_query($conn,$sql);
        if($res==TRUE){
            //session variable to display message
            $_SESSION['add'] = $sql;
            //Redirect page
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            echo "Not inserted";
        }
    }
    
    
    
    
    
    ?>














</body>




</html>
