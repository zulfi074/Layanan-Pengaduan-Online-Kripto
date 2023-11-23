<?php
session_start();
if (empty($_SESSION['email'])) {
    header("location: login.php?message=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wakanda Smart Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body class="main" style="background-color: #252525;">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="Aset/logo3.png" alt="Logo" width="45" class="d-inline-block align-text-middle">
                    WSS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="riwayat-aduan.php">Riwayat Aduan</a>
                        </li>
                    </ul>
                </div>
                <a href="logout.php" class="btn btn-outline-danger " tabindex="-1" role="button" aria-disabled="true">Log Out</a>
            </div>
        </nav>
    </header>

    <main class="mt-3">
        <section>
            <center>
                <div class="card text-bg-light border-primary" style="width: 60%;">
                    <h2 class="card-header text-bg-primary fw-bold">Aduan Anda</h2>
                    <div class="card-body">
                        <?php
                        include 'koneksi.php';
                        $email = $_SESSION['email'];
                        $id_user = "SELECT id FROM `user` WHERE email = '$email'";
                        $query_user    = mysqli_query($konek, $id_user)->fetch_assoc()['id'];

                        $sql = "SELECT * FROM aduan where id = '$query_user' ";
                        $query = mysqli_query($konek, $sql);
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <div class="card w-75 mt-3 text-bg-dark text-start">
                                <div class="card-body">
                                    <div class="card-header border-light">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="card-title"><?= $data['nama'] ?> <span class="fw-normal fs-6"> - <?= $data['kategori'] ?></span></h3>
                                            <p class="card-title text-primary"><?= $data['tanggal'] ?></p>
                                        </div>
                                    </div>
                                    <?php
                                    $chiperteks = $data['rincian'];
                                    $final = dekripsi_rot13($chiperteks);
                                    $cipher = "AES-256-CBC";
                                    $secret = "zulfians";
                                    $option = 0;
                                    $iv = str_repeat("0", openssl_cipher_iv_length($cipher));
                                    $plaintext = openssl_decrypt($final, $cipher, $secret, $option, $iv);
                                    ?>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?php echo $plaintext; ?>
                                        </p>


                                        <div class="text-center">
                                            <img src="upload/<?= $data['foto'] ?>.jpeg " class="rounded" alt="...">
                                        </div>
                                        <!-- <a href="edit.php?id=<?= $data['id_schedule'] ?>" class="btn btn-warning"><img src="Aset/edit.png" width="20px" alt=""> Edit</a> -->
                                        <a href="delete.php?id=<?= $data['id_aduan'] ?>" class="btn btn-danger text-dark"><img src="Aset/trash.png" width="20px" alt=""> Delete</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </center>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>

<?php
function dekripsi_rot13($decrypt1)
{
    for ($i = 0; $i < strlen($decrypt1); $i++) {
        $c = ord($decrypt1[$i]);

        if ($c >= ord('n') & $c <= ord('z') | $c >= ord('N') & $c <= ord('Z')) {
            $c -= 13;
        } elseif ($c >= ord('a') & $c <= ord('m') | $c >= ord('A') & $c <= ord('M')) {
            $c += 13;
        }
        $decrypt1[$i] = chr($c);
    }
    return $decrypt1;
}
// function encrypt($data)
// {
//     $key = "zulfians";
//     $ivlen = openssl_cipher_iv_length($cipher = "AES-256-CBC");
//     $iv = openssl_random_pseudo_bytes($ivlen);
//     $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
//     return base64_encode($encrypted . '::' . $iv);
// }
// function decrypt($data)
// {
//     $key = "zulfians";
//     list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
//     return openssl_decrypt($encrypted_data, 'AES-256-CBC', $key, 0, $iv);
// }

function gambar($data)
{
}
?>