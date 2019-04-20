<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "smp_perpus";

$koneksi = mysqli_connect($server, $user, $password, $database);

if( !$koneksi ){
	die ("Gagal terhubung" .mysqli_connect_error());
}
?>