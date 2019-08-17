<?php
//panggil file config.php untuk menghubung ke server
include('system/config/conn.php');

//tempat menyimpan file
$folder="system/images/"; 

//tangkap data dari form

$pass = $_POST['pass'];
$pass = md5($pass);
$confirm = $_POST['confirm'];
$confirm = md5($confirm);
$nama = $_POST['nama'];
$user = $_POST['user'];
$level = $_POST['level'];
$jenis_foto=$_FILES['file']['type'];

//menghindari duplikat username
$cek="SELECT user FROM user WHERE user='$user'";
$ada=mysqli_query($connect,$cek) or die (mysql_error());
if(mysqli_num_rows($ada)>0)
{
	echo "<script>alert ('Username Telah Terdaftar ! Silahkan Periksa Kembali !');window.location='page.php?tambah-user' </script> ";
	}

else if (!empty($_FILES["file"]["tmp_name"]))
{

if($jenis_foto=="image/jpeg" || $jenis_foto=="image/jpg" || $jenis_foto=="image/gif" || $jenis_foto=="image/png")
	{			
		$foto = $folder . basename($_FILES['file']['name']);		
		if (move_uploaded_file($_FILES['file']['tmp_name'], $foto)) {
	$query = mysqli_query ($connect,"INSERT INTO user values('','$user','$pass','$confirm','$level','$nama','$foto')")
			or die (mysqli_error());
	header('location:page.php?data-user&message=insert-success');   
	
} else {
	echo "<script>alert ('Gagal Mengedit data ini !');window.location='page.php?tambah-user' </script> ";
}
} else {
	echo "<script>alert ('Jenis gambar yang anda kirim salah. Harus .jpg .gif .png');window.location='page.php?tambah-user' </script> "; 
}
} else {
	echo "<script>alert ('Anda Belum Memilih Gambar !');window.location='page.php?tambah-user' </script> ";
}

?>