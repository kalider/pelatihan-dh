<?php 
include 'koneksi.php';

$sql = "SELECT id, nama_depan, nama_belakang, jenis_kelamin, hp_orangtua, kelas, alamat FROM santri";
$result = mysqli_query($connect, $sql);

$data_santri = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($connect);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Data Santri</title>
</head>
<body>
	<h1>Data Santri</h1>

	<a href="tambah.php">Tambah Santri</a> <br><br>

	<table style="width:100%" border="1">
		<tr>
		    <th>Nama Depan</th>
		    <th>Nama Belakang</th>
		    <th>Jk</th>
		    <th>Hp Orang Tua</th>
		    <th>Kelas</th>
		    <th>Alamat</th>
		    <th colspan="2">Aksi</th>
		</tr>
		<?php 
			if (empty($data_santri)) {
				echo '<tr>
			  		<td colspan="8" style="text-align: center;">Belum ada data santri.</td>
			  	</tr>';
			} else {
			  	foreach($data_santri as $santri) {
			  		echo '<tr>
					    <td>' . $santri['nama_depan'] . '</td>
					    <td>' . $santri['nama_belakang'] . '</td>
					    <td>' . $santri['jenis_kelamin'] . '</td>
					    <td>' . $santri['hp_orangtua'] . '</td>
					    <td>' . $santri['kelas'] . '</td>
					    <td>' . $santri['alamat'] . '</td>
					    <td><a href="edit.php?id=' . $santri['id'] . '">Edit</a></td>
					    <td><a href="hapus.php?id=' . $santri['id'] . '">Hapus</a></td>
					</tr>';
			  	}
			}
		?>
	</table> 

</body>
</html>