<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$password = hash('sha256', $password);

$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$query = mysqli_query($konek, $sql);

$cek = mysqli_num_rows($query);
if ($cek > 0) {
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $id;
    $_SESSION['status'] = "login";
    header("location: home.php");
} else
    header("location: login.php?message=failed");
