<?php

include("../koneksi.php");

if(isset($_GET['id'])){

	$id = $_GET['id'];

	$sql = "DELETE FROM tahun WHERE id_tahun = $id";
	$query = mysqli_query($koneksi, $sql);

	if($query){
		header('Location: tahun-list.php');
	} else{
		die("Data gagal dihapus");
	}

} else{
	die ("Akses Dilarang");
}

?>