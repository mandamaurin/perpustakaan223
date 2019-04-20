<?php

include("../koneksi.php");

if(isset($_GET['id_kategori'])){

	$id = $_GET['id_kategori'];

	$sql = "DELETE FROM kategori_buku WHERE id_kategori = $id";
	$query = mysqli_query($koneksi, $sql);

	if($query){
		header('Location: kategori-list.php');
	} else{
		die("Data gagal dihapus");
	}

} else{
	die ("Akses Dilarang");
}

?>