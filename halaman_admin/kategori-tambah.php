<?php
include("../koneksi.php");

if(isset($_POST['tambah'])){

	$nama = $_POST['nama'];

	$sql = "INSERT INTO kategori_buku(nama) VALUE ('$nama')";
	$query = mysqli_query($koneksi, $sql);

	if ($query){
		header('Location: kategori-list.php');
	} else{
		header('Location: kategori-form.php');
	}

} else{
	die("Akses Dilarang");
}
?>