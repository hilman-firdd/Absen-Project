<?php
//panggil file conn.php untuk menghubung ke server
include('system/config/conn.php');
$id_kelas = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM kelas WHERE id_kelas='$id_kelas'") or die(mysql_error());
if ($query) {
header('location:page.php?data-kelas&message=delete-success');
}
?>