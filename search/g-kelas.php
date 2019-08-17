<?php 
//panggil file session-admin.php untuk menentukan apakah admin atau bukan
include('inc/session-guru.php');
//panggil file conn.php untuk menghubung ke server
include('../system/config/conn.php');
//panggil file header.php untuk menghubungkan konten bagian atas
include('../system/inc/header.php');
//memberi judul halaman
	echo '<title>Pencarian Data Kelas - Absen Kit</title>';
//panggil file css.php untuk desain atau tema
include('inc/css.php');
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
include('inc/nav-guru.php');
?>
	<div class="page-content">
		<div class="container-fluid">
		
			<section class="box-typical">
				<header class="box-typical-header">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-title">
							<h3>PENCARIAN DATA KELAS</h3>
						</div>
						<form  id="form-insert" name="form-insert" method="get" action="">
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
								//membentuk klausa where pencarian 
								if(isset($_GET['q']) && $_GET['q']){
								$q = $_GET['q']; 
								$sql = "SELECT * FROM kelas WHERE nm_kelas like '%$q%' limit 10";
								$result = mysqli_query($connect,$sql);
								if(mysqli_num_rows($result) > 0) {
								while($data = mysqli_fetch_array($result))
								{
 								?>
								<tr>
								<td><center><?php echo $data['nm_kelas']; ?></center></td>
								<td align="center">
								<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
									<a href="../page.php?g-detail-kelas&id=<?php echo $data['id_kelas'];?>" class="btn btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail?"><i class="font-icon font-icon-eye"></i> </a>
								</div>
								</td>
								</tr>
	 							<?php 
								} 
								?>
							</tbody>
							<?php }else{ echo '<tr><td  colspan="7" align="center">Nama Kelas tidak ditemukan!</td></tr>'; } } ?>
						</table>
					</div>
				</div><!--.box-typical-body-->
			
				<div class="card-block">
					<div class="col-md-6">
						<br>
  						<span class="label label-success">Info! </span> Hasil  Pencarian
  						<span class="label label-primary">Untuk : <?php echo $q; ?> </span>
					</div>
					
					<div class="col-md-6" align="right">
						<nav>
							<ul class="pagination">
								<li class="page-item disabled">
								<a class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
								</a>
								</li>
								
								<li class="page-item active">
								<a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
								</li>
								
								<li class="page-item disabled">
								<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
								</a>
								</li>
							</ul>
						</nav>
					</div>
				</div><!--.card-block-->
			</section>
			
		</div><!--.container-fluid-->
	</div><!--.page-content-->
	
<?php 
//panggil file footer.php untuk menghubungkan konten bagian bawah
include('inc/footer.php');
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