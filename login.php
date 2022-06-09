<?php 
require "config/connect.php";
 
error_reporting(0);
 
session_start();
 
?>
 
<!DOCTYPE html>
<html>
<head>
<head>
        <title>Halaman Login</title>
        <link rel="stylesheet" type="text/css" href="asset/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" 
        integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 
        <link rel="stylesheet" media="screen and (min-width: 900px)" href="widescreen.css">
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="smallscreen.css">

    </head>
    <body class="bg-light">
        <!--page login -->
        <div class="page-login">
            <!--box -->
            <div class="box box-login">
            <div class = "box-header">
            </div>
            <!---box body -->
            <div class="box-body"> 
                <!---form login -->
                <img class="logoumkt" src="asset/img/umkt.png">
                <h2 class="selogan">Log In</h2>
                <h3 class="selogan1">Welcome Buddy</h3>
                <h1 class="selogan2">To Do list</h1>
                <h2 class="selogan3">The Only Bad WorkOut is <br>
                    The One That Didn’t Happen <br><ol>Unknown</ol> </h2>
                <h2 class="selogan4">Dont  Have Account? <a href="app/register.php">Register</a></h2>
                <form action="" method="POST">
                    <div class="form-group" >
                        <label for="username">username</label>
                        <br>
                        <input type="text" name="username" placeholder="username" class="form-control" id="myinput">
                    </div>
                    <div class="form-group" >
                        <label for="password">Password</label>
                        <br>
                        <input type="password" name="password" placeholder="Password" class="form-control" id="myinput">
                    </div>
                    <input type="submit"  name="submit" value="login" class="btn">
                    <?php
                    if (isset($_SESSION['username'])) {
                        header("Location: berhasil_login.php");
                    }
                    if (isset($_POST['submit'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                     
                        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['username'] = $row['username'];
                            echo "<script>window.location = 'app/index.php'</script>";
                        } else {
                            echo '<div class="alert">Login gagal </div>';
                        }
                    }
                    ?>
                </form>
                
            </div>
             </div>
        </div>
    </body>
</html>