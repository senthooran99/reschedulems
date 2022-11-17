<?php include('partials/constants.php'); ?>

<html>
    <head>
        <title>Login - Reschedule management System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="log">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!-- Login Form Starts Here -->
            <form action="" method="POST" class=text-center>
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
            <!-- Login Form Ends Here -->

            <p class="text-center">University Of Jaffna</p>
        </div>

    </body>
</html>

<?php 

    if(isset($_POST['submit']))
    {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $raw_password = $_POST['password'];
        $password = mysqli_real_escape_string($conn, $raw_password);

        
        $sql = "SELECT * FROM admin WHERE UserName='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql);

        //Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; 

            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";

            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>