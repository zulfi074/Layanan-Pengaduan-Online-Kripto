<?php
include 'koneksi.php';

$id = $_POST['id_schedule'];
$name = $_POST['name'];
$time = $_POST['time'];
$date = $_POST['date'];
$type = $_POST['type'];
$description = $_POST['description'];

$sql = "UPDATE schedule SET id_type='$type', schedule_name='$name', schedule_time='$time', schedule_date='$date', schedule_description='$description' WHERE id_schedule='$id'";
$query = mysqli_query($konek, $sql);

if ($query)
    header("location: schedule.php");
else
    echo ("Gagal Input Data");
