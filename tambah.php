<?php 
include 'koneksi.php';

if(isset($_POST['simpan'])){
	$nama_depan = $_POST['nama_depan'];
	$nama_belakang = $_POST['nama_belakang'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$hp_orangtua = $_POST['hp_orangtua'];
	$kelas = $_POST['kelas'];
	$alamat = $_POST['alamat'];

	$sql = "INSERT INTO santri (nama_depan, nama_belakang, jenis_kelamin, hp_orangtua, kelas, alamat)
	VALUES ('$nama_depan', '$nama_belakang', '$jenis_kelamin', '$hp_orangtua', '$kelas', '$alamat')";

	if (mysqli_query($connect, $sql)) {
	  echo "Data santri berhasil di tambahkan";
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($connect);
	}
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tambah Santri</title>
</head>
<body>
	<h1>Tambah Santri</h1>

	<form method="POST">
	  <label for="fname">Nama depan:</label><br>
	  <input type="text" id="fname" name="nama_depan"><br><br>

	  <label for="lname">Nama belakang:</label><br>
	  <input type="text" id="lname" name="nama_belakang"><br><br>

	  <label>JK:</label><br><br>
	  <input type="radio" id="laki" name="jenis_kelamin" value="laki-laki">
	  <label for="laki">Laki - laki</label><br>
	  <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan">
	  <label for="laki">Perempuan</label><br><br>
	  
	  <label for="phone">No handphone orang tua:</label><br>
	  <input type="text" id="phone" name="hp_orangtua"><br><br>

	  <label for="kelas">Kelas</label><br>
	  <select name="kelas">
	    <option value="wustho-1">Wustho 1</option>
	    <option value="wustho-2">Wustho 2</option>
	    <option value="wustho-3">Wustho 3</option>
	  </select><br><br>
	  <label for="alamat">Alamat:</label><br>
	  <textarea id="alamat" name="alamat" rows="4"></textarea><br><br>

	  <input type="submit" name="simpan" value="simpan"><br><br>
	</form>

	<a href="index.php">Kembali</a>
</body>
</html>