<?php
	include 'con.php';
	$data = mysqli_query($connect,"SELECT * from absensi and siswa");
?>
<html>
<head>
	<title>Print Document</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
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
        <?php $query=mysqli_query($connect,"SELECT DISTINCT nis FROM absensi WHERE nm_kelas='$nm_kelas' AND tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY nis ASC");
		while($row=mysqli_fetch_array($query)){
		$data=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM siswa WHERE nis='$row[nis]'"));
		$ket=$row['ket']; ?>
        <tr id="rowHover">
        	<td width="10%" align="center"><?php echo $hasil['kodepegawai']; ?></td>
            <td width="25%" id="column_padding"><?php echo $hasil['namapegawai']; ?></td>
            <td width="10%" id="column_padding"><?php echo $hasil['jeniskelamin']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
</html>