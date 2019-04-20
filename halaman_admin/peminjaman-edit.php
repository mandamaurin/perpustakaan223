<?php
session_start();
include("../koneksi.php");
if(isset($_GET['id']) ){

	$id = $_GET['id'];
	
	$status = 'Sudah Dikembalikan';

	$sql = "UPDATE peminjaman SET status = '$status' WHERE id_pinjam = '$id'";
	$query = mysqli_query($koneksi, $sql);

	if ($query){
		header('Location: peminjaman-list.php');
	} else{
		header('Location: pinjam-form.php');
	}

} else{
	die("Akses Dilarang");
}
?>