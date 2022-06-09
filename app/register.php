<?php
    session_start();
    require "../config/connect.php";
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman login</title>
        <link rel="stylesheet" type="text/css" href="../asset/css/style.css">
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
                <img class="logoumkt" src="../asset/img/umkt.png"">
                <h2 class="selogan">Make Your Account</h2>
                <h3 class="selogan1">please enter the appropriate data</h3>
                <h1 class="selogan2">To Do List</h1>
                <h2 class="selogan3">The Only Bad WorkOut is<br>
                    The One That Didn’t Happen <br><ol>Unknown</ol> </h2>
                <h2 class="selogan4">Already Have Account? <a href="../login.php">log in</a></h2>
                <form action="" method="POST">
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Fullname</label>
                        <br>
                        <input type="text" name="nama" class="form-control" placeholder="Enter fullname">
                    </div>
                    <div class="form-group" >
                        <label for="username">Username</label>
                        <br>
                        <input type="text" name="username" placeholder="username" class="form-control" id="myinput">
                    </div>
                    <div class="form-group" >
                        <label for="password">Password</label>
                        <br>
                        <input type="password" name="password" placeholder="Password" class="form-control" id="myinput">
                    </div>
                    <?php
                    include "../config/connect.php";
                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $username = $_POST['username'];
                    $pass = $_POST['password'];
                    $sql = "INSERT INTO user(nama, username, password) VALUES ('$nama', '$username', '$pass')";
                    $query = mysqli_query($conn, $sql);

                    if(empty($nama) || empty($username) || empty($pass)){
                        echo '<div class="alert">Data tidak boleh kosong</div>';
                    }else{
                        echo '<div class="alert">Data Berhasil Disimpan</div>';
                    }
                }
                ?>
                    <input type="submit"  name="submit" value="login" class="btn">
           
                </form>
            </div>
             </div>
        </div>
    </body>
</html>