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
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="riwayat-aduan.php">Riwayat Aduan</a>
                        </li>
                    </ul>
                </div>
                <a href="logout.php" class="btn btn-outline-danger " tabindex="-1" role="button" aria-disabled="true">Log Out</a>
            </div>
        </nav>
    </header>
    <?php
    include('koneksi.php');

    $email = $_SESSION['email'];
    $id_user = "SELECT id FROM `user` WHERE email = '$email'";
    $query_user    = mysqli_query($konek, $id_user)->fetch_assoc()['id'];
    ?>
    <main class="mt-2">
        <section>
            <h1 class="text-white text-center fw-bold mb-3">Tulis Aduan Anda</h1>
            <div class="container card" style="box-shadow: 9px 5px 10px 4px #000; width:30%;">
                <form action="create_process.php" method="POST" enctype="multipart/form-data" class="p-4">
                    <input type="hidden" id="id_user" name="id_user" class="form-control" value="<?= $query_user ?>">
                    <div class="mb-4">
                        <label for="name" class="form-label">Aduan</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Tulis judul aduan">
                    </div>
                    <div class="mb-4">
                        <label for="select" class="form-label">Katogori</label>
                        <select class="form-select" aria-label="Default select example" id="kategori" name="kategori">
                            <option selected>Pilih Katogori...</option>
                            <option value="Fasilitas">Fasilitas</option>
                            <option value="Kinerja">Kinerja</option>
                            <option value="Umum">Umum</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="form-label">Deskripsi Masalah</label>
                        <textarea class="form-control" aria-label="With textarea" id="description" name="description"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="form-label">Lampiran Foto (opsional) </label>
                        <input type="file" class="bukti" name="gambar">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-outline-success fw-bold container-fluid">SUBMIT</button>
                    </div>
                </form>
            </div>
        </section>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>