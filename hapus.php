<?php
include 'koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM santri WHERE id='$id'";

if (mysqli_query($connect, $sql)) {
	mysqli_close($connect);

	header("location: index.php");
}
else {
	echo "Data gagal dihapus.";
}

?>