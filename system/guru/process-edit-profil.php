<?php
//panggil file config.php untuk menghubung ke server
include('system/config/conn.php');

//tempat menyimpan file
$folder="system/images/"; 

//tangkap data dari form
$id_user = $_POST['id_user'];
$pass = $_POST['pass'];
$pass = md5($pass);
$confirm = $_POST['confirm'];
$confirm = md5($confirm);
$nama = $_POST['nama'];
$user = $_POST['user'];
$level = $_POST['level'];
$gambar= $_FILES["file"]["tmp_name"];
$jenis_foto= $_FILES['file']['type'];

//jika gambar kosong atau tidak di ganti 
if (empty($gambar))
{
	$query = mysqli_query($connect,"UPDATE user set user='$user', pass='$pass', confirm='$confirm', level='$level', nama='$nama' where id_user='$id_user'")
		or die (mysql_error());
	header('location:page.php?g-home&message=edit-success');  
}

else if($jenis_foto=="image/jpeg" || $jenis_foto=="image/jpg" || $jenis_foto=="image/gif" || $jenis_foto=="image/png")
	{			
		$foto = $folder . basename($_FILES['file']['name']);		
		 if (move_uploaded_file($_FILES['file']['tmp_name'], $foto)) 
		 {
		 
//jika gambar di ganti
if(!empty($gambar))
{ 
	$query = mysqli_query($connect,"UPDATE user set user='$user', pass='$pass', confirm='$confirm', level='$level', nama='$nama', foto='$foto' where id_user='$id_user'")
		or die (mysql_error());
	header('location:page.php?g-home&message=edit-success'); 
	 
} else {
	echo "<script>alert ('Gagal Mengedit data ini !');window.location='page.php?g-edit-profil&id=$id_user' </script> ";
}
} else {
	echo "<script>alert ('Anda Belum Memilih Gambar !');window.location='page.php?g-edit-profil&id=$id_user' </script> ";
}
} else {
	echo "<script>alert ('Jenis gambar yang anda kirim salah. Harus .jpg .gif .png');window.location='page.php?g-edit-profil&id=$id_user' </script> "; 
}

?>