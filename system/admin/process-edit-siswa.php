<?php
//panggil file conn.php untuk menghubung ke server
include('system/config/conn.php');

//tempat menyimpan file
$folder="system/images/"; 

//tangkap data dari form
$id_siswa = $_POST['id_siswa'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$nm_kelas = $_POST['nm_kelas'];
$jns_kel = $_POST['jns_kel'];
$tmpt_lahir = $_POST['tmpt_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$gambar= $_FILES["file"]["tmp_name"];
$jenis_foto= $_FILES['file']['type'];

//jika gambar kosong atau tidak di ganti 
if (empty($gambar))
{
	//update data di database sesuai id_siswa
	$query = mysqli_query($connect,"UPDATE siswa SET nis='$nis', nama='$nama', nm_kelas='$nm_kelas', jns_kel='$jns_kel', tmpt_lahir='$tmpt_lahir', tgl_lahir='$tgl_lahir', alamat='$alamat' where id_siswa='$id_siswa'")
		or die (mysqli_error());
	header('location:page.php?data-semua-siswa&message=edit-success');   
}

else if($jenis_foto=="image/jpeg" || $jenis_foto=="image/jpg" || $jenis_foto=="image/gif" || $jenis_foto=="image/png")
	{			
		$foto = $folder . basename($_FILES['file']['name']);		
		 if (move_uploaded_file($_FILES['file']['tmp_name'], $foto)) 
		 {
		 
//jika gambar di ganti
if(!empty($gambar))
{ 
	//update data di database sesuai id_siswa
	$query = mysqli_query($connect,"UPDATE siswa set nis='$nis', nama='$nama', nm_kelas='$nm_kelas', jns_kel='$jns_kel', tmpt_lahir='$tmpt_lahir', tgl_lahir='$tgl_lahir', alamat='$alamat', foto='$foto' where id_siswa='$id_siswa'")
		or die (mysqli_error());
	header('location:page.php?data-semua-siswa&message=edit-success');   

} else {
	echo "<script>alert ('Gagal Mengedit data ini !');window.location='page.php?edit-siswa&id=$id_siswa' </script> ";
}
} else {
	echo "<script>alert ('Anda Belum Memilih Gambar !');window.location='page.php?edit-siswa&id=$id_siswa' </script> ";
}
} else {
	echo "<script>alert ('Jenis gambar yang anda kirim salah. Harus .jpg .gif .png');window.location='page.php?edit-siswa&id=$id_siswa' </script> "; 
}

?>