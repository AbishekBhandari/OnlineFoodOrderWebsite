<?php include('../config/constants.php'); ?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="login" >
            <h1 class="text-center">Login</h1><br><br>
            <?php 
              if(isset($_SESSION['login'])){
                  echo $_SESSION['login'];
                  echo "<br>";
                  unset($_SESSION['login']);
              }
              if(isset($_SESSION['no-login'])){
                  echo $_SESSION['no-login'];
                  unset($_SESSION['no-login']);
              }
              ?>
            <form action="" method="Post" class="text-center">
                Username: <br>
                <input type="text" name="username" placeholder="username"><br><br>
                Password: <br>
                <input type="password" name="password" placeholder="password"> <br><br>
                <input type="submit" name="submit" value="Login" class="btn-primary">

            </form>
        </div>
    </body>
</html>

<?php 

if(isset($_POST['submit'])){
    echo $username = $_POST['username'];
    echo $password = md5($_POST['password']);
    //to check whether the username and password exists or not
    $sql = "SELECT *from tbl_admin where username='$username' and password='$password'";
    $res = mysqli_query($conn,$sql);
    if($res==true){
        $count = mysqli_num_rows($res);
        if($count==1){
            //user available and success
            $_SESSION['login'] = "<div style='color:green'>login successfull</div>";
            $_SESSION['user'] = $username;//to check whether admin is logged in or not
     
            header('location:'.SITEURL.'admin/');
        }
        else{
            //not available user
            $_SESSION['login'] = "<div style='color:red' class='text-center'>login unsuccessfull</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }
}






?>