<?php 
include 'koneksi.php';

$id = $_GET['id'];

$sql = "SELECT nama_depan, nama_belakang, jenis_kelamin, hp_orangtua, kelas, alamat FROM santri WHERE id='$id'";
$result = mysqli_query($connect, $sql);
$santri = mysqli_fetch_assoc($result);

if(isset($_POST['simpan'])){
	$nama_depan = $_POST['nama_depan'];
	$nama_belakang = $_POST['nama_belakang'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$hp_orangtua = $_POST['hp_orangtua'];
	$kelas = $_POST['kelas'];
	$alamat = $_POST['alamat'];

	$sql = "UPDATE santri SET nama_depan='$nama_depan', nama_belakang='$nama_belakang', jenis_kelamin='$jenis_kelamin', hp_orangtua='$hp_orangtua', kelas='$kelas', alamat='$alamat' WHERE id='$id'";

	if (mysqli_query($connect, $sql)) {
		header("location: index.php");
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
	<title>Ubah Santri</title>
</head>
<body>
	<h1>Ubah Santri</h1>

	<form method="POST">
	  <label for="fname">Nama depan:</label><br>
	  <input type="text" id="fname" name="nama_depan" value="<?php echo($santri['nama_depan']) ?>"><br><br>

	  <label for="lname">Nama belakang:</label><br>
	  <input type="text" id="lname" name="nama_belakang" value="<?php echo($santri['nama_belakang']) ?>"><br><br>

	  <label>JK:</label><br><br>
	  <input type="radio" id="laki" name="jenis_kelamin" value="laki-laki" <?php if($santri['jenis_kelamin'] == 'laki-laki') echo 'checked'; ?>>
	  <label for="laki">Laki - laki</label><br>
	  <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan" <?php if($santri['jenis_kelamin'] == 'perempuan') echo 'checked'; ?>>
	  <label for="perempuan">Perempuan</label><br><br>
	  
	  <label for="phone">No handphone orang tua:</label><br>

	  <input type="text" id="phone" name="hp_orangtua" value="<?php echo($santri['hp_orangtua']) ?>"><br><br>

	  <label for="kelas">Kelas</label><br>
	  <select name="kelas">
	    <option value="wustho-1" <?php if($santri['kelas'] == 'wustho-1') echo 'selected'; ?>>Wustho 1</option>
	    <option value="wustho-2" <?php if($santri['kelas'] == 'wustho-2') echo 'selected'; ?>>Wustho 2</option>
	    <option value="wustho-3" <?php if($santri['kelas'] == 'wustho-3') echo 'selected'; ?>>Wustho 3</option>
	  </select><br><br>
	  <label for="alamat">Alamat:</label><br>
	  <textarea id="alamat" name="alamat" rows="4"><?php echo($santri['alamat']) ?></textarea><br><br>

	  <input type="submit" name="simpan" value="simpan"><br><br>
	</form>

	<a href="index.php">Kembali</a>
</body>
</html>