<?php

include("../koneksi.php");

if(isset($_POST['edit'])){

	$id = $_POST['id_anggota'];
	$induk = $_POST['induk'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$kelas = $_POST['kelas'];
	$tahun = $_POST['tahun'];
	$alamat = $_POST['alamat'];
	
	$sql = "UPDATE anggota SET nomor_induk='$induk', nama_siswa='$nama', jk='$jk', kelas='$kelas', tahun_masuk='$tahun', alamat='$alamat' WHERE id_anggota = '$id'";
	$query = mysqli_query($koneksi, $sql);
	
	if( $query ) {
		header('Location: anggota-list.php');
	} else {
		die("Gagal menyimpan perubahan...");
	}
	
} else {
	die("Akses dilarang...");
}

?>
