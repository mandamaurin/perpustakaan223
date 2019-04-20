<?php

include("../koneksi.php");

if(isset($_GET['id'])){

	$id = $_GET['id'];

	$sql = "DELETE FROM anggota WHERE id_anggota = $id";
	$query = mysqli_query($koneksi, $sql);

	if($query){
		header('Location: anggota-list.php');
	} else{
		die("Data gagal dihapus");
	}

} else{
	die ("Akses Dilarang");
}

?>