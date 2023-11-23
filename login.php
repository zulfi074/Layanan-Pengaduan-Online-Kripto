<?php
if (isset($_GET['message'])) {
    if ($_GET['message'] == "register") {
        $mregister = "Berhasil Membuat Akun. Silahkan Login";
    } else if ($_GET['message'] == "failed") {
        $mgagal = "Login Gagal. Username atau Password Salah";
    } else if ($_GET['message'] == "logout") {
        $mlogout = "Anda telah berhasil logout";
    } else if ($_GET['message'] = "belum_login") {
        $mbelumlogin = "Silahkan login terlebih dahulu";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="coba_rpl/style.css">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card text-bg-info wrapper">

            <div class=" image">
                <h1 class="text-judul">Wakanda Smart Service</h1>
                <img src="Aset/logo3.png" style="width: 80px; height: 85px;">
            </div>
            <div class="boxlogin">
                <p class="textcenter" style="color: #124BC9;"><?php
                                                                if (isset($_GET['message'])) {
                                                                    if ($_GET['message'] == "register") {
                                                                        echo $mregister . '!';
                                                                    } else if ($_GET['message'] == "failed") {
                                                                        echo $mgagal . '!';
                                                                    } else if ($_GET['message'] == "logout") {
                                                                        echo $mlogout . '!';
                                                                    } else if ($_GET['message'] = "belum_login") {
                                                                        echo $mbelumlogin . '!';
                                                                    }
                                                                }
                                                                ?></p>
                <h1 class="text-judul">Login</h1>
                <form action="cek_login.php" method="post" class="forminput">
                    <div class="form">
                        <input placeholder="Email" type="text" class="input" required="" name="email">
                        <br>
                        <input placeholder="Password" type="password" class="input" required="" name="password">
                        <br>
                        <h3 class="text-isi" style="text-align: right; color : #DC0101;"> Forget Password</h3>
                        <button class="buttonlogin" type="submit"> Submit </button>
                </form>
                <p class="text-isi" style="text-align: center; margin-top : 10px;"> Didn't Have Account?
                    <a style="color: #124BC9;text-decoration :none;" href="register.php">
                        Register
                    </a>
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>