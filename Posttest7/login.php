<?php
session_start();
require "admin_config.php";
require "./aksi/koneksi.php";

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $pswd = $_POST["password"];
    
    // $admin_found = false;

    // foreach ($admins as $admin) {
    //     if ($username === $admin["username"] && password_verify($pswd, $admin["password"])) {
    //         $admin_found = true;
    //         break;
    //     }
    // }
    
    // if ($admin_found == true) {
    //     $_SESSION['admin_login'] = true;
    //     $_SESSION['admin_username'] = $username;
    //     header("Location: index.php");
    //     exit;
    // } 

    $result = mysqli_query($conn, "SELECT * FROM user_data WHERE username = '$username' ");
    
    if ($result) {
        if (mysqli_num_rows($result) >= 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($pswd, $row["password"])) {

                $_SESSION['logged'] = true;
                $_SESSION['id_user'] = $row['id_user'];
                echo "<script> 
                        alert('Asyhadu');
                    </script>";
                echo "<script> 
                        alert('Selamat, Anda Berhasil Login');
                        document.location.href = 'UserPage.php';
                    </script>";
                    
            } else {
                echo "<script> 
                alert('Periksa Kembali Data Anda!');
                    </script>
                ";
            }
        } 
        else {
            echo "<script> 
                    alert('Maaf, Kami Tidak Dapat Mengenali Data Anda');
                    document.location.href = 'login.php';
                </script>
            ";
        }
    $error = true; 
}}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/style-login.css">
        <title>Login</title>
    </head>
    <body>
    <div class="background">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    </div>
    
    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <a href="index.php"> Back To Menu</a>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="login" value="Login" required>
                </div>

                <div class="links">
                    Don't have account? <a href="regist.php">Sign Up Now</a>
                </div>
            </form>
        </div>
    </div>



</body>
</html>