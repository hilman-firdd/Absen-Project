<?php
//panggil file conn.php untuk menghubung ke server
include('system/config/conn.php');

//tangkap data dari form
$id_kelas = $_POST['id_kelas'];
$nm_kelas = $_POST['nm_kelas'];

//update data di database sesuai kd_kelas
$query = mysqli_query("UPDATE kelas set nm_kelas='$nm_kelas' where id_kelas='$id_kelas'") or die(mysql_error());

if ($query) {
	header('location:page.php?data-kelas&message=edit-success');
}
?>