<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_santri";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if(!$connect) {
	die("Koneksi ke database gagal. " . mysqli_connect_error());
}

?>