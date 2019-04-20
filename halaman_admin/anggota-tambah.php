<?php
include("../koneksi.php");

if(isset($_POST['tambah'])){

	$induk = $_POST['induk'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$kelas = $_POST['kelas'];
	$tahun = $_POST['tahun'];
	$alamat = $_POST['alamat'];

	$sql = "INSERT INTO anggota(nomor_induk, nama_siswa, jk, kelas, tahun_masuk, alamat) VALUE ('$induk', '$nama', '$jk', '$kelas', '$tahun','$alamat')";
	$query = mysqli_query($koneksi, $sql);

	if ($query){
		header('Location: anggota-list.php');
	} else{
		header('Location: anggota-formtambah.php');
	}

} else{
	die("Akses Dilarang");
}
?>