<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
//panggil file session-sekretaris.php untuk menentukan apakah sekretaris atau bukan
include('system/inc/session-sekretaris.php');
//panggil file conn.php untuk menghubung ke server
include('system/config/conn.php');
//panggil file header.php untuk menghubungkan konten bagian atas
include('system/inc/header.php');
//memberi judul halaman
echo '<title>Data Semua Kelas - Absen Kit</title>';
//panggil file css.php untuk desain atau tema
include('system/inc/css.php');
//panggil file navi-sekretaris.php untuk menghubungkan sekretaris ke konten
include('system/inc/nav-sekretaris.php');
?>
	
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12">
				<?php 
				//kode php ini kita gunakan untuk menampilkan pesan tambah data sukses
				if (!empty($_GET['message']) && $_GET['message'] == 'insert-success') {
				echo '<div class="alert alert-success alert-fill alert-close alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button> SUCCESS !! - Data Kelas Berhasil Di Tambah ! </div>';
				} 
				//kode php ini kita gunakan untuk menampilkan pesan edit data sukses
				else if (!empty($_GET['message']) && $_GET['message'] == 'edit-success') {
				echo '<div class="alert alert-success alert-fill alert-close alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button> SUCCESS !! - Data Kelas Berhasil Di Edit ! </div>';
				} 
				//kode php ini kita gunakan untuk menampilkan pesan tambah data sukses
				else if (!empty($_GET['message']) && $_GET['message'] == 'delete-success') {
				echo '<div class="alert alert-success alert-fill alert-close alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button> SUCCESS !! - Data Kelas Berhasil Di Hapus ! </div>';
				}
				?>
				</div>
			</div><!--.row-->	
 			
			<section class="box-typical">
				<header class="box-typical-header">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-title">
							<h3>DATA SEMUA KELAS</h3>
						</div>
						<form  id="form-insert" name="form-insert" method="get" action="search/s-kelas.php">
							<div class="tbl-cell tbl-cell-icon-right col-lg-6"> </div>
						
							<div class="tbl-cell tbl-cell-action col-lg-4" align="right">
								<div class="form-control-wrapper">
									<input type="text" class="form-control form-control-rounded" name="q" id="form-q" placeholder="Masukan Nama Kelas" 
									data-validation="[L>=1]"
									data-validation-message="Tidak boleh kosong!"/>
								</div>
							</div>
						
							<div class="tbl-cell tbl-cell-icon-right col-lg-1" align="center">
								<button type="submit" class="btn btn-rounded btn-primary font-icon font-icon-search"> </button>
							</div>
						</form>
					</div>
				</header>
				
				<div class="box-typical-body">
					<div class="table-responsive">
						<table id="table-sm" class="table table-bordered table-hover table-sm">
							<thead>
								<tr>
								<th><center>Nama Kelas</center></th>
								<th><center><i class="font-icon glyphicon glyphicon-cog"></i> </center></th>
								</tr>
							</thead>
							   
							<tbody>
								<?php
								$batas = 10;
								$pg = isset($_GET['pg']) ? $_GET['pg']:"";
								if (empty($pg)) {
								$posisi = 0;
								$pg = 1;
								} else {
								$posisi = ($pg-1)*$batas; }
								$sql = mysql_query("SELECT * FROM kelas ORDER BY nm_kelas ASC limit $posisi, $batas ");
								$no = 1+$posisi;
								while ($data = mysql_fetch_assoc($sql)) 
								{
								?>
								<tr>
								<td><center><?php echo $data['nm_kelas']; ?></center></td>
								<td align="center">
								<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
									<a href="page.php?s-detail-kelas&id=<?php echo $data['id_kelas'];?>" class="btn btn-default font-icon font-icon-eye" data-toggle="tooltip" data-placement="top" title="Detail?"></a>
								</div>
								</td>
								</tr>
								<?php 
								} 
								?>
							</tbody>
						</table>
					</div>
				</div><!--.box-typical-body-->
			<div class="card-block">
					<div class="col-md-6">
						<?php
						//hitung jumlah data
						$jml_data = mysql_num_rows(mysql_query("SELECT * FROM kelas"));
						//Jumlah halaman
						$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
						?>
						<br>
  						<span class="label label-success">Info! </span> Total  
						<span class="label label-primary">Kelas : <?php echo $jml_data; ?> </span>
  						<span class="label label-primary">Halaman : <?php echo $JmlHalaman; ?> </span>
					</div>
					
					<div class="col-md-6" align="right">
						<nav>
							<ul class="pagination">
								<?php
								//Jumlah halaman
								$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
 
								//Navigasi ke sebelumnya
								if ($pg > 1 ) {
								$link = $pg-1;
								$prev = "<li class='page-item'>
								<a class='page-link' href='page.php?s-data-kelas&pg=$link' aria-label='Previous'>
								<span aria-hidden='true'>&laquo;</span>
								<span class='sr-only'>Previous</span>
								</a></li>";
								} else {
								$prev = "<li class='page-item disabled'>
								<a class='page-link' href='page.php?s-data-kelas&pg=$link' aria-label='Previous'>
								<span aria-hidden='true'>&laquo;</span>
								<span class='sr-only'>Previous</span>
								</a></li> ";
								}
	 
								//Navigasi nomor
								$nmr = '';
								for ($i = 1; $i<= $JmlHalaman; $i++){
								if ($i == $pg){
								$nmr.= "<li class='page-item active'>
								<a class='page-link'>$i<span class='sr-only'>(current)</span></a></li>";
								} else {
								$nmr.= "<li class='page-item'><a class='page-link' href='page.php?s-data-kelas&pg=$i'>$i</a></li>";
								}
								}
 
								//Navigasi ke selanjutnya
								if ($pg < $JmlHalaman){
								$link = $pg+1;
								$next = "<li class='page-item'>
								<a class='page-link' href='page.php?s-data-kelas&pg=$link'aria-label='Next'>
								<span aria-hidden='true'>&raquo;</span>
								<span class='sr-only'>Next</span>
								</a></li>";
								} else {
								$next = " <li class='page-item disabled'>
								<a class='page-link' href='page.php?s-data-kelas&pg=$link'aria-label='Next'>
								<span aria-hidden='true'>&raquo;</span>
								<span class='sr-only'>Next</span>
								</a></li>";
								}
 
								//Tampilkan navigasi
								echo $prev . $nmr . $next;
								?>
							</ul>
						</nav>
					</div>
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