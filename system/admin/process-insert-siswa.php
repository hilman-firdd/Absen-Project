<?php
//panggil file config.php untuk menghubung ke server
include('system/config/conn.php');

//tempat menyimpan file
$folder="system/images/"; 

//tangkap data dari form
$nama = $_POST['nama'];
$nis = $_POST['nis'];
$nm_kelas = $_POST['nm_kelas'];
$jns_kel = $_POST['jns_kel'];
$alamat = $_POST['alamat'];
$tmpt_lahir = $_POST['tmpt_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];

//menghindari duplikat nis
$cek="SELECT nis FROM siswa WHERE nis='$nis'";
$ada=mysqli_query($connect,$cek) or die (mysql_error());
if(mysqli_num_rows($ada)>0)
{
	echo "<script>alert ('NIS Telah Terdaftar ! Silahkan Periksa Kembali !');window.location='page.php?tambah-siswa' </script> ";
	}

else if (!empty($_FILES["file"]["tmp_name"]))
{
$jenis_foto=$_FILES['file']['type'];

if($jenis_foto=="image/jpeg" || $jenis_foto=="image/jpg" || $jenis_foto=="image/gif" || $jenis_foto=="image/png")
	{			
		$foto = $folder . basename($_FILES['file']['name']);		
		if (move_uploaded_file($_FILES['file']['tmp_name'], $foto)) {
	$query = mysqli_query ($connect,"INSERT INTO siswa VALUES('','$nama','$nis','$jns_kel','$tgl_lahir','$tmpt_lahir','$alamat','$nm_kelas','$foto')")
			or die (mysql_error());
	header('location:page.php?data-semua-siswa&message=insert-success');
	
} else {
	echo "<script>alert ('Gagal Mengedit data ini !');window.location='page.php?tambah-siswa' </script> ";
}
} else {
	echo "<script>alert ('Jenis gambar yang anda kirim salah. Harus .jpg .gif .png');window.location='page.php?tambah-siswa' </script> "; 
}
} else {
	echo "<script>alert ('Anda Belum Memilih Gambar !');window.location='page.php?tambah-siswa' </script> ";
}

?>