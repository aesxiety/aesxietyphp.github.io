<?php
require "./aksi/koneksi.php";

if(isset($_POST["register"])){
    $fullname = $_POST["fullname"];
    $no_tlp = $_POST["no_tlp"];
    $email = $_POST["email"];
    $username =$_POST["username"];
    $password = $_POST["password"];
    $confirm_pass = $_POST["confirm_pass"];

    if($password === $confirm_pass){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $result = mysqli_query($conn, "SELECT username FROM user_data where username='$username' ");

        if(mysqli_fetch_assoc($result)){
            echo "
                <script>
                    alert('Username sudah digunakan');
                    document.location.href = 'regist.php';
                </script>";
        }else{
            $sql = "INSERT INTO user_data VALUES ('', '$fullname', '$no_tlp','$email','$username','$password')";
            $result = mysqli_query($conn, $sql);

            if(mysqli_affected_rows($conn)> 0){
                echo "
                <script>
                    alert('Registrasi Berhasil');
                    document.location.href = 'login.php';
                </script>" ;
            }else{
                echo "
                <script>
                    alert('Registrasi Gagal');
                    document.location.href = 'regist.php';
                </script>" ;
            }
        }
    }else{
        echo"
            <script>
                    alert('Kesalahan Dalam Confirm Password Anda!');
            </script>;

        ";

    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style-login.css">
    <title>Register</title>
</head>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type-number] {
        -moz-appearance: textfield;
    }
</style>

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
            <header>Sign Up</header>
            <form action="" method="POST">
                <div class="field input">
                    <label for="fullname">Fullname</label>
                    <input type="text" name="fullname" id="fullname" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="no_tlp">No Whatsapp</label>
                    <input type="tel" id="phone" name="no_tlp" placeholder="08XX XXXX XXXX" pattern="[0-9]{4}[0-9]{4}[0-9]{4}" required>
                </div>
                <div class="field input">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="confirm_pass" id="confirm_pass" autocomplete="off" required>
                </div>
                
                <div class="field">
                    <input type="submit" name="register" value="Masuk" class="btn" required>
                </div>

                <div class="links">
                    Already a member? <a href="login.php">Login Now</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>