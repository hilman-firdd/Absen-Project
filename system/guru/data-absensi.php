<?php 
//panggil file session-guru.php untuk menentukan apakah guru atau bukan
include('system/inc/session-guru.php');
//panggil file conn.php untuk menghubung ke server
include('system/config/conn.php');
//panggil file header.php untuk menghubungkan konten bagian atas
include('system/inc/header.php');
//memberi judul halaman
echo '<title>Data Absensi - Absen Kit</title>';
//panggil file css.php untuk desain atau tema
include('system/inc/css.php');
//panggil file navi-guru.php untuk menghubungkan navigasi guru ke konten
include('system/inc/nav-guru.php');
//mendapatkan informasi dari hasil absen siswa
$nm_kelas = $_GET['kelas'];
$query = mysqli_query($connect,"SELECT * FROM kelas");
$data = mysqli_fetch_array($query);
//merubah waktu kedalam format indonesia
$hari = array ("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$bln = array ("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
?>

	<div class="page-content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-12 col-md-12">
				<?php 
				//kode php ini kita gunakan untuk menampilkan pesan absen sukses
				if (!empty($_GET['message']) && $_GET['message'] == 'absen-success') {
				echo '<div class="alert alert-success alert-fill alert-close alert-dismissible fade in" role="alert">
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  	<span aria-hidden="true">&times;</span> </button>
			  	SUCCESS !! - Siswa Berhasil Diabsen ! </div>';
				}
				?>
				</div>
			</div><!--.row-->			
			
			<section class="box-typical">
				<header class="box-typical-header">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-title">
							<div align="center">
							<h3 align="center"> DATA ABSENSI SISWA KELAS : <?php echo $nm_kelas; ?></h3>
							<h7 align="center">( <?php echo "".$hari[date("w")].", ".date("j")." ".$bln[date("n")]." ".date("Y");""; ?> )</h7>
							</div>
						</div>
					</div>
				</header>
				
				<div class="box-typical-body">
					<div class="table-responsive">
						<table id="table-sm" class="table table-bordered table-hover table-sm">
							<thead>
								<tr>
								<th><center>Foto</center></th>
								<th><center>Nama</center></th>
								<th><center>Nis</center></th>
								<th><center>Hadir (H)</center></th>
								<th><center>Sakit (S)</center></th>
								<th><center>Ijin (I)</center></th>
								<th><center>Alfa (A)</center></th>
								<th><center>Jumlah Tidak Hadir</center></th>
								</tr>
							</thead>
							
							<tbody>
								<?php
								$nm_kelas=$_GET['kelas'];
								$tanggal=$_GET['tanggal'];
								$query=mysqli_query($connect,"SELECT * FROM absensi WHERE nm_kelas='$nm_kelas' AND tanggal='$tanggal' ORDER BY nis ASC");
								while($row=mysqli_fetch_array($query)){
								$data=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM siswa WHERE nis='$row[nis]'"));
								$ket=$row['ket'];
								?>
								<tr>
								<td class="table-photo" align="center">
									<img src="<?php echo $data['foto']; ?>" alt"" />
								</td>
								<td><?php echo $data['nama'];?></td>
								<td><?php echo $data['nis'];?></td>
								<td align="center">
									<?php
									$hadir=mysqli_query($connect,"SELECT * FROM absensi WHERE nis='$row[nis]' AND tanggal='$tanggal' AND ket='H'");
									$jumlah=mysqli_num_rows($hadir);
									echo $jumlah;
									?>
								</td>
								<td align="center">
									<?php
									$hadir=mysqli_query($connect,"SELECT * FROM absensi WHERE nis='$row[nis]' AND tanggal='$tanggal' AND ket='S'");
									$jumlah=mysqli_num_rows($hadir);
									echo $jumlah;
									?>
								</td>
								<td align="center">
									<?php
									$hadir=mysqli_query($connect,"SELECT * FROM absensi WHERE nis='$row[nis]' AND tanggal='$tanggal' AND ket='I'");
									$jumlah=mysqli_num_rows($hadir);
									echo $jumlah;
									?>
								</td>
								<td align="center">
									<?php
									$hadir=mysqli_query($connect,"SELECT * FROM absensi WHERE nis='$row[nis]' AND tanggal='$tanggal' AND ket='A'");
									$jumlah=mysqli_num_rows($hadir);
									echo $jumlah;
									?>
								</td>
								<td align="center">
									<?php
									$hadir=mysqli_query($connect,"SELECT * FROM absensi WHERE nis='$row[nis]' AND ket='S' + ket='I' + ket='A' AND tanggal='$tanggal'");
									$jumlah=mysqli_num_rows($hadir);
									echo $jumlah;
									?>
								</td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div><!--.table-responsive-->
				</div><!--.box-typical-body-->
				
				<div class="card-block">
					<div class="row">  
						<div class="col-md-12">
							<div class="form-group" align="center">
								<div class="btn-group" role="group">
								<a href="javascript:history.back()" class="btn btn-default font-icon font-icon-refresh-2" data-toggle="tooltip" data-placement="top" title="Kembali?"></a>
								</div>
							</div>
						</div><!--.col-md-12-->
					</div><!--.row-->
				</div><!--.card-block-->
			</section>
			
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