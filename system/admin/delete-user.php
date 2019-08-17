<?php
//panggil file conn.php untuk menghubung ke server
include('system/config/conn.php');
$id_user = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM user WHERE id_user='$id_user'") or die(mysql_error());
if ($query) {
header('location:page.php?data-user&message=delete-success');
}
?>