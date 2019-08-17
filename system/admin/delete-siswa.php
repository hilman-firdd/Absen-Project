<?php
//panggil file conn.php untuk menghubung ke server
include('system/config/conn.php');
$id_siswa = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM siswa WHERE id_siswa='$id_siswa'") or die(mysql_error());
if ($query) {
header('location:page.php?data-semua-siswa&message=delete-success');
}
?>