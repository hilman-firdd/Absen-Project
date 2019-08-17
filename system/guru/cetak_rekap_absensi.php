<?php
include('../inc/session-guru.php');
include('../config/conn.php');
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/vnd-ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Rekap_Absensi.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);


?>
        <?php
            $nm_kelas=$_GET['nm_kelas'];
            $tgl1=$_GET['tgl1'];
            $tgl2=$_GET['tgl2'];
        ?>
        <h3 style="text-align: center;">
        Hasil Rekapan Siswa<br>
        SMK WIDYA DIRGANTARA BANDUNG
        <hr>
        </h3>
        <label for="nm_kelas">Kelas :</label> <?php echo $_GET['nm_kelas']; ?> <br>
        <label for="tgl1"> Tanggal -</label> <?php echo $_GET['tgl1']; ?>
        <label for="tgl2"> </label> <?php echo $_GET['tgl2']; ?>
        <table width="600" border="1" align="center">
        <tr>
		
		<th><center>Nama</center></th>
		<th><center>Nis</center></th>
		<th><center>Hadir (H)</center></th>
		<th><center>Sakit (S)</center></th>
		<th><center>Ijin (I)</center></th>
		<th><center>Alfa (A)</center></th>
		<th><center>Jumlah Tidak Hadir</center></th>
        </tr>

        <?php
        
        $tgl1=$_GET['tgl1'];
		$tgl2=$_GET['tgl2'];
		$nm_kelas=$_GET['nm_kelas'];
		$query=mysqli_query($connect,"SELECT DISTINCT nis FROM absensi WHERE nm_kelas='$nm_kelas' AND tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY nis ASC");
		
		//test
		$h = mysqli_fetch_array($hadir1);
		$s = mysqli_fetch_array($hadir2);
		$i = mysqli_fetch_array($hadir3);
		$a = mysqli_fetch_array($hadir4);
		$sia = mysqli_fetch_array($hadir5);


		while($row=mysqli_fetch_array($query)){
		$hadir1=mysqli_query($connect,"SELECT * FROM absensi WHERE nis='$row[nis]' AND ket='H' AND tanggal BETWEEN '$tgl1' AND '$tgl2'");
		$hadir2=mysqli_query($connect,"SELECT * FROM absensi WHERE nis='$row[nis]' AND ket='S' AND tanggal BETWEEN '$tgl1' AND '$tgl2'");
		$hadir3=mysqli_query($connect,"SELECT * FROM absensi WHERE nis='$row[nis]' AND ket='I' AND tanggal BETWEEN '$tgl1' AND '$tgl2'");
		$hadir4=mysqli_query($connect,"SELECT * FROM absensi WHERE nis='$row[nis]' AND ket='A' AND tanggal BETWEEN '$tgl1' AND '$tgl2'");
		$hadir5=mysqli_query($connect,"SELECT * FROM absensi WHERE nis='$row[nis]' AND ket='S' + ket='I' + ket='A' AND tanggal BETWEEN '$tgl1' AND '$tgl2'");
		
		$data=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM siswa WHERE nis='$row[nis]'"));
		$ket=$row['ket'];
		?>

        <tr>
			
			<td><?php echo $data['nama'];?></td>
		    <td><?php echo $data['nis'];?></td>
			<td align="center">
				<?php
				$jumlah=mysqli_num_rows($hadir1);
				echo $jumlah;
				?>
			</td>
			<td align="center">
				<?php
				$jumlah=mysqli_num_rows($hadir2);
				echo $jumlah;
				?>
			</td>
			<td align="center">
				<?php
				$jumlah=mysqli_num_rows($hadir3);
				echo $jumlah;
				?>
			</td>
			<td align="center">
				<?php
				$jumlah=mysqli_num_rows($hadir4);
				echo $jumlah;
				?>
			</td>
			<td align="center">
				<?php
				$jumlah=mysqli_num_rows($hadir5);
				echo $jumlah;
				?>
			</td>
				<tr bgcolor="#FFFFFF">
				<td align="center"><?php echo $h['H'];?></td>
				<td align="center"><?php echo $s['S'];?></td>
				<td align="center"><?php echo $i['I'];?></td>
				<td align="center"><?php echo $a['A'];?></td>
				</tr>
				</tr>
				<?php
				}
				?>
				</table>

</body>
</html>