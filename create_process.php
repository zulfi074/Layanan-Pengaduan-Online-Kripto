<?php
include 'koneksi.php';
$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$date = $_POST['date'];
$type = $_POST['kategori'];
$description = $_POST['description'];

$gambar = upload();
if (!$gambar) {
    return false;
}

function Rot13($teks)
{
    for ($i = 0; $i < strlen($teks); $i++) {
        $c = ord($teks[$i]);

        if ($c >= ord('n') & $c <= ord('z') | $c >= ord('N') & $c <= ord('Z')) {
            $c -= 13;
        } elseif ($c >= ord('a') & $c <= ord('m') | $c >= ord('A') & $c <= ord('M')) {
            $c += 13;
        }
        $teks[$i] = chr($c);
    }

    return $teks;
}
$cipher = "AES-256-CBC";
$secret = "zulfians";
$option = 0;
$iv = str_repeat("0", openssl_cipher_iv_length($cipher));
$ciphertext = openssl_encrypt($description, $cipher, $secret, $option, $iv);

$description = Rot13($ciphertext);


//$description = encrypt($description);

$query = mysqli_query(
    $konek,
    "INSERT INTO aduan
VALUES('','$id_user','$nama','$type','$date','$description','$gambar')"
) or die(mysqli_error($konek));

if ($query)
    header("location: riwayat-aduan.php");
else
    echo ("Gagal Input Data");


// fungsi upload gambar
function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah ada gambar yang diupload
    if ($error === 4) {
        echo "
				<script>
					alert('Gambar Belum Diinputkan!');
					document.location.href = 'create.php';
				</script>
			";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    // adakah sebuah string dalam sebuah array
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
				<script>
					alert('Gambar harus berformat jpeg!');
					document.location.href = 'create.php';
				</script>
			";
        return false;
    }
    // jika ukuran terlalu besar
    if ($ukuranFile > 10000000) {
        echo "
				<script>
					alert('Ukuran Gambar Terlalu Besar!');
					document.location.href = 'create.php';
				</script>
			";
        return false;
    }

    $namaFileBaru = encrypt($tmpName);

    move_uploaded_file($tmpName, 'upload/' . $namaFileBaru . '.' . $ekstensiGambar);
    return $namaFileBaru;
}
function encrypt($data)
{
    $key = "zulfians";
    $ivlen = openssl_cipher_iv_length($cipher = "AES-256-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}
