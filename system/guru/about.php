<?php 
//panggil file session-guru.php untuk menentukan apakah guru atau bukan
include('system/inc/session-guru.php');
//panggil file conn.php untuk menghubung ke server
include('system/config/conn.php');
//panggil file header.php untuk menghubungkan konten bagian atas
include('system/inc/header.php');
//memberi judul halaman
echo '<title>Tentang - Absen Kit</title>';
//panggil file css.php untuk desain atau tema
include('system/inc/css.php');
//panggil file navi-guru.php untuk menghubungkan navigasi guru ke konten
include('system/inc/nav-guru.php');
?>

	<div class="page-content">
		<div class="container-fluid">
			<div class="box-typical box-typical-padding documentation">
				<header class="documentation-header">
					<h5 align="center" class="with-border m-t-lg"><strong>Tentang Aplikasi AbsenKit (Absensi Siswa Berbasis Web) </strong></h5>
					<div class="documentation-header-by">
						Ditulis  Oleh :
						<div class="avatar-preview avatar-preview-24">
						<img src="system/images/husni.jpg" alt="">
						</div>
						<a href="">Husni Mubarok</a>, Pada Tanggal 27 Januari 2017
					</div>
				</header>
			  
				<div class="text-block text-block-typical">
					<p>Aplikasi ini bernama AbsenKit atau absensi siswa berbasis web.  Sengaja dibuat oleh admin (Husni Mubarok) bertujuan sebagai salah satu syarat mengikuti kegiatan Uji Kompetensi disekolahnya (SMK Yapinda).</p>
				 	<p>Fungsi dari AbsenKit ini adalah menyimpan data absensi siswa kemudian disimpan ke database. Aplikasi ini juga dapat menampilkan data absensi siswa yang sebelumnya telah dibuat. </p>
					<p>Kelebihan dari aplikasi ini adalah kita bisa menghemat biaya untuk membeli kertas, karena aplikasi AbsenKit ini lebih efisien dan dapat mudah diakses diperangkat mana saja, asalkan ada sedikit koneksi internet. </p>
				</div>
			</div><!--.box-typical-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->

<?php 
//panggil file footer.php untuk menghubungkan konten bagian bawah
include('system/inc/footer.php');
?>

 <!-- AbsenKit (absensi siswa berbasis web)
 ********************************************
 * Created      : Husni Mubarok				*
 * Release Date : 28 Februari 2017			*
 * E-mail       : cusnix@gmail.com			*
 * Phone        : (+62)82214121989			*
 * BBM          : D38EC5FB					*
 * Facebook     : fb.me/cusnix				*
 ********************************************
 -->