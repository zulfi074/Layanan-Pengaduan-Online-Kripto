<?php
include 'koneksi.php';
$id_user = "";
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$password = $_POST['password'];

$password = hash('sha256', $password);


$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$query = mysqli_query($konek, $sql);

$cek = mysqli_num_rows($query);
if ($cek > 0) {
    header("location: register.php");
} else {
    $query = mysqli_query(
        $konek,
        "INSERT INTO user
    VALUES('$id_user','$email','$password','$name','$number')"
    ) or die(mysqli_error($konek));
    header("location: login.php?message=berhasil");
}
