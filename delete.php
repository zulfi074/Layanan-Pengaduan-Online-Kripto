<?php
include 'koneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM aduan WHERE id_aduan = '$id'";
$query = mysqli_query($konek, $sql);

if ($query)
    header("location: riwayat-aduan.php");
else
    echo "Proses Hapus Data Gagal";
