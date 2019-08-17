<?php
//halaman awal
if(isset($_GET['masuk'])){ 
include 'sign-in.php';
}

if(isset($_GET['keluar'])){ 
include 'sign-out.php';
} 

if(isset($_GET['process-masuk'])){ 
include 'process-sign-in.php';
}

if(isset($_GET['lupa-sandi'])){ 
include 'reset.php';
}

//halaman error session
 if(isset($_GET['acces-admin'])){ 
include 'system/error/acces-admin.php';
}
 if(isset($_GET['acces-guru'])){ 
include 'system/error/acces-guru.php';
}
 if(isset($_GET['acces-sekretaris'])){ 
include 'system/error/acces-sekretaris.php';
}
if(isset($_GET['error-404'])){ 
include 'system/error/404.php';
}

//halaman admin
 if(isset($_GET['home'])){ 
include 'system/admin/home.php';
}
 if(isset($_GET['data-semua-siswa'])){ 
include'system/admin/data-all-siswa.php';
} 
if(isset($_GET['data-kelas'])){ 
include'system/admin/data-kelas.php';
}
if(isset($_GET['data-siswa'])){ 
include'system/admin/data-siswa.php';
}
if(isset($_GET['data-user'])){ 
include'system/admin/data-user.php';
}
if(isset($_GET['delete-kelas'])){ 
include'system/admin/delete-kelas.php';
}
if(isset($_GET['delete-siswa'])){ 
include'system/admin/delete-siswa.php';
}
if(isset($_GET['delete-user'])){ 
include'system/admin/delete-user.php';
}
if(isset($_GET['edit-kelas'])){ 
include'system/admin/edit-kelas.php';
}
if(isset($_GET['edit-siswa'])){ 
include'system/admin/edit-siswa.php';
}
if(isset($_GET['edit-user'])){ 
include'system/admin/edit-user.php';
}
if(isset($_GET['tambah-kelas'])){ 
include'system/admin/insert-kelas.php';
}
if(isset($_GET['tambah-siswa'])){ 
include'system/admin/insert-siswa.php';
}
if(isset($_GET['tambah-user'])){ 
include'system/admin/insert-user.php';
}
 if(isset($_GET['process-edit-kelas'])){ 
include'system/admin/process-edit-kelas.php';
} 
 if(isset($_GET['process-edit-siswa'])){ 
include'system/admin/process-edit-siswa.php';
} 
 if(isset($_GET['process-edit-user'])){ 
include'system/admin/process-edit-user.php';
}  
 if(isset($_GET['process-insert-kelas'])){ 
include'system/admin/process-insert-kelas.php';
} 
 if(isset($_GET['process-insert-siswa'])){ 
include'system/admin/process-insert-siswa.php';
} 
 if(isset($_GET['process-insert-user'])){ 
include'system/admin/process-insert-user.php';
} 
if(isset($_GET['detail-kelas'])){ 
include'system/admin/view-kelas.php';
}  
if(isset($_GET['detail-siswa'])){ 
include'system/admin/view-siswa.php';
}  
if(isset($_GET['detail-user'])){ 
include'system/admin/view-user.php';
}
if(isset($_GET['about'])){ 
include'system/admin/about.php';
}
if(isset($_GET['bantuan'])){ 
include'system/admin/help.php';
}

//halaman guru
 if(isset($_GET['g-home'])){ 
include'system/guru/home.php';
}
 if(isset($_GET['g-data-absensi'])){ 
include'system/guru/data-absensi.php';
}
 if(isset($_GET['rekap-absensi'])){ 
include'system/guru/rekap-absensi.php';
}
if(isset($_GET['g-export-excel'])){
include'system/guru/ke_excel_att.php';
}
if(isset($_GET['g-data-kelas'])){ 
include'system/guru/data-kelas.php';
}
if(isset($_GET['g-data-siswa'])){ 
include'system/guru/data-siswa.php';
}
if(isset($_GET['g-edit-profil'])){ 
include'system/guru/edit-profil.php';
}
 if(isset($_GET['g-process-edit-profil'])){ 
include'system/guru/process-edit-profil.php';
}  
if(isset($_GET['g-detail-kelas'])){ 
include'system/guru/view-kelas.php';
}  
if(isset($_GET['g-detail-siswa'])){ 
include'system/guru/view-siswa.php';
}  
if(isset($_GET['g-detail-profil'])){ 
include'system/guru/view-profil.php';
}
if(isset($_GET['g-about'])){ 
include'system/guru/about.php';
}
if(isset($_GET['g-bantuan'])){ 
include'system/guru/help.php';
}

//halaman sekretaris
 if(isset($_GET['s-home'])){ 
include'system/sekretaris/home.php';
}
 if(isset($_GET['data-absensi'])){ 
include'system/sekretaris/data-absensi.php';
}
if(isset($_GET['s-data-kelas'])){ 
include'system/sekretaris/data-kelas.php';
}
if(isset($_GET['s-data-siswa'])){ 
include'system/sekretaris/data-siswa.php';
}
if(isset($_GET['s-edit-profil'])){ 
include'system/sekretaris/edit-profil.php';
}
if(isset($_GET['absen-siswa'])){ 
include'system/sekretaris/insert-absensi.php';
}
 if(isset($_GET['s-process-edit-profil'])){ 
include'system/sekretaris/process-edit-profil.php';
}  
if(isset($_GET['process-insert-absensi'])){ 
include'system/sekretaris/process-insert-absensi.php';
} 
if(isset($_GET['s-detail-kelas'])){ 
include'system/sekretaris/view-kelas.php';
}  
if(isset($_GET['s-detail-siswa'])){ 
include'system/sekretaris/view-siswa.php';
}  
if(isset($_GET['s-detail-profil'])){ 
include'system/sekretaris/view-profil.php';
}
if(isset($_GET['s-about'])){ 
include'system/sekretaris/about.php';
}
if(isset($_GET['s-bantuan'])){ 
include'system/sekretaris/help.php';
}
?>