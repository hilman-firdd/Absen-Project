<?php 
//panggil file session-admin.php untuk menentukan apakah admin atau bukan
include('system/inc/session-admin.php');
//panggil file conn.php untuk menghubung ke server
include('system/config/conn.php');
//panggil file header.php untuk menghubungkan konten bagian atas
include('system/inc/header.php');
//memberi judul halaman
echo '<title>Lihat Kelas - Absen Kit</title>';
//panggil file css.php untuk desain atau tema
include('system/inc/css.php');
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
include('system/inc/nav-admin.php');
//mendapatkan informasi untuk menlihat data
$id_kelas = $_GET['id'];
$query = mysqli_query($connect,"SELECT * from kelas where id_kelas='$id_kelas'") or die(mysql_error());
$data = mysqli_fetch_array($query);
?>

	<div class="page-content">
		<div class="container-fluid">
		
			<div class="box-typical box-typical-full-height">
				<div class="add-customers-screen tbl">
					<div class="add-customers-screen-in">
						<div class="add-customers-screen-user">
							<i class="font-icon font-icon-learn"></i>
						</div>
						
						<div class="col-md-4"></div>
						
						<div class="col-md-4">
							<div class="table-responsive">
								<table id="table-sm" class="table table-bordered table-hover table-sm">
									<thead>
										<tr>
										<th colspan="3"><center>Detail Kelas</center></th>
										</tr>
									</thead>
									
									<tbody>
										<tr>
										<td align="right">Nama Kelas</td>
										<td align="center">:</td>
										<td align="left"><?php echo $data['nm_kelas']; ?></td>
										</tr> 
									</tbody>
								</table>
							</div>
						</div>
					
						<div class="col-md-4"></div>
						
						<div class="col-md-12">
							<div class="form-group" align="center">
								<div class="btn-group" role="group">

									<a href="page.php?edit-kelas&id=<?php echo $data['id_kelas'];?>" class="btn btn-default font-icon font-icon-pencil" data-toggle="tooltip" data-placement="top" title="Edit?"></a>
									<a href="page.php?delete-kelas&id=<?php echo $data['id_kelas'];?>" onClick="return confirm('Yakin akan menghapus data ini?');" class="btn btn-default font-icon font-icon-trash" data-toggle="tooltip" data-placement="top" title="Hapus?"></a>
									<a href="javascript:history.back()" class="btn btn-default font-icon font-icon-refresh-2" data-toggle="tooltip" data-placement="top" title="Kembali?"></a>
								</div>
							</div>
						</div><!--.col-md-12-->
						
					</div><!--.add-customers-screen-in-->
				</div><!--.add-customers-screen-->
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