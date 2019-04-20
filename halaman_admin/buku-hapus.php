<?php

include("../koneksi.php");

if(isset($_GET['id_buku'])){

	$id = $_GET['id_buku'];

	$sql = "DELETE FROM buku WHERE id_buku = $id";
	$query = mysqli_query($koneksi, $sql);

	if($query){
		header('Location: buku-list.php');
	} else{
		die("Data gagal dihapus");
	}

} else{
	die ("Akses Dilarang");
}

?>