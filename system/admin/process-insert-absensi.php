<?php 
//panggil file conn.php untuk menghubung ke server
include "../../system/config/conn.php";
$nm_kelas=$_POST['nm_kelas'];
$tanggal=$_POST['tanggal'];

if(isset($_POST['info'])){
	if(!empty($_POST['hadir'])){
		//parameter
		$nis=$_POST['hadir'];
		$jumlah=count($nis);
		for($i=0;$i<$jumlah;$i++){
			$hadir=mysqli_query($connect,"INSERT INTO absensi(nis,nm_kelas,ket,tanggal,info) VALUES ('$nis[$i]','$nm_kelas','H','$tanggal','succes')",$connect);
		}
		?>
		<script language="javascript">window.location.href="page.php?data-absensi&kelas=<?php echo $nm_kelas;?>&tanggal=<?php echo $tanggal;?>&message=absen-success";</script>
		<?php 
	}
	
	if(!empty($_POST['sakit'])){
		//parameter
		$nis=$_POST['sakit'];
		$jumlah=count($nis);
		for($i=0;$i<$jumlah;$i++){
			$hadir=mysqli_query($connect,"INSERT INTO absensi(nis,nm_kelas,ket,tanggal,info) VALUES ('$nis[$i]','$nm_kelas','S','$tanggal','succes')",$connect);
		}
		?>
		<script language="javascript">window.location.href="page.php?data-absensi&kelas=<?php echo $nm_kelas;?>&tanggal=<?php echo $tanggal;?>&message=absen-success";</script>
		<?php 
	}
	
	if(!empty($_POST['ijin'])){
		//parameter
		$nis=$_POST['ijin'];
		$jumlah=count($nis);
			for($i=0;$i<$jumlah;$i++){
			$hadir=mysqli_query($connect,"INSERT INTO absensi(nis,nm_kelas,ket,tanggal,info) VALUES ('$nis[$i]','$nm_kelas','I','$tanggal','succes')",$connect);
		}
		?>
		<script language="javascript">window.location.href="page.php?data-absensi&kelas=<?php echo $nm_kelas;?>&tanggal=<?php echo $tanggal;?>&message=absen-success";</script>
		<?php 
	}
	
	if(!empty($_POST['alfa'])){
		//parameter
		$nis=$_POST['alfa'];
		$jumlah=count($nis);
		for($i=0;$i<$jumlah;$i++){
			$hadir = mysqli_query($connect,"INSERT INTO absensi(nis,nm_kelas,ket,tanggal,info) VALUES ('$nis[$i]','$nm_kelas','A','$tanggal','succes')",$connect);
		}
		?>
		<script language="javascript">window.location.href="page.php?data-absensi&kelas=<?php echo $nm_kelas;?>&tanggal=<?php echo $tanggal;?>&message=absen-success";</script>
		<?php 
	}
	
}else{
	unset($_POST['info']);
	?><script language="javascript">window.location.href="page.php?absen-siswa&kelas=<?php echo $nm_kelas;?>";</script><?php
}
?>