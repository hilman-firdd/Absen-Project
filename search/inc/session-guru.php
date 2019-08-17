<?php 
session_start();
//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
//redirect ke halaman login
	header('location:../page.php?masuk&log=only');
}

//pemisah hak akses level
else if ($_SESSION['level']!="Guru-Piket"){
//jika bukan admin tidak bisa masuk, redirect ke halaman error
	header('location:../page.php?acces-guru&pembatasan=hak-akses');
}
?>