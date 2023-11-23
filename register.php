<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="coba_rpl/style.css">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card text-bg-info wrapper">
            <div class="boxjudul">
                <p class="text-judul"> Registrasi</p>
            </div>
            <div class="boxlogin">
                <form action="regis_proses.php" method="post" class="forminput">
                    <p class="text-sub"> Full Name</p>
                    <input placeholder="Insert your full name" type="text" class="input" required="" name="name">
                    <p class="text-sub"> Phone Number</p>
                    <input placeholder="Insert your phone number" type="text" class="input" required="" name="number">
                    <p class="text-sub"> Email Addres</p>
                    <input placeholder="Insert your email addres" type="text" class="input" required="" name="email">
                    <p class="text-sub"> Password</p>
                    <input placeholder="Insert your password" type="password" class="input" required="" name="password">
                    <button class="buttonlogin" type="submit"> Register </button>
                </form>
                <p class="text-isi" style="text-align: center; margin-top : 10px;"> Have an Account? <a href="login.php" style="color: #124BC9; text-decoration :none;">
                        Login
                    </a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>