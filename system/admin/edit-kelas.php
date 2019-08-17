<?php 
//panggil file session-admin.php untuk menentukan apakah admin atau bukan
include('system/inc/session-admin.php');
//panggil file conn.php untuk menghubung ke server
include('system/config/conn.php');
//panggil file header.php untuk menghubungkan konten bagian atas
include('system/inc/header.php');
//memberi judul halaman
echo '<title>Edit User - Absen Kit</title>';
//panggil file css.php untuk desain atau tema
include('system/inc/css.php');
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
include('system/inc/nav-admin.php');
//mendapatkan informasi untuk mengedit data
$id_kelas = $_GET['id'];
$query = mysql_query("SELECT * FROM kelas WHERE id_kelas='$id_kelas'") or die(mysql_error());
$data = mysql_fetch_array($query);
?>

	<div class="page-content">
		<div class="container-fluid">
			
			<section class="card">
				<h6 align="center" class="with-border m-t-lg"><strong>EDIT KELAS</strong></h6>	
				<div class="card-block">
					<div class="row">
						<form id="form-insert" name="form-insert" action="page.php?process-edit-kelas" enctype="multipart/form-data" method="POST">
							<div class="col-md-3 col-sm-6" ></div>
							
							<input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>" required="required" />
							<div class="col-md-6 col-sm-6" >
								<div class="form-group">
									<div class="input-group">
										<div class="form-control-wrapper">
											<input id="insert-nama" value="<?php echo $data['nm_kelas']; ?>" class="form-control" name="nm_kelas" type="text"
											data-validation="[L>=1]"
											data-validation-message="Nama Kelas Tidak Boleh Kosong" required="required" />
										</div>		
									
										<div class="input-group-btn" role="group">
											<button type="submit" class="btn btn-default font-icon font-icon-pencil" data-toggle="tooltip" data-placement="top" title="Edit?"></button>
											<a href="page.php?delete-kelas&id=<?php echo $data['id_kelas'];?>" onClick="return confirm('Yakin akan menghapus data ini?');" class="btn btn-default font-icon font-icon-trash" data-toggle="tooltip" data-placement="top" title="Hapus?"></a>
											<a href="javascript:history.back()" class="btn btn-default font-icon font-icon-refresh-2" data-toggle="tooltip" data-placement="top" title="Kembali?"></a>
										</div>
									</div> 
								</div>
							</div>
						</form>
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