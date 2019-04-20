<?php
include("../koneksi.php");

if(isset($_POST['tambah'])){

	$tahun = $_POST['tahun'];

	$sql = "INSERT INTO tahun (tahun) VALUE ('$tahun')";
	$query = mysqli_query($koneksi, $sql);

	if ($query){
		header('Location: tahun-list.php');
	} else{
		header('Location: tahun-form.php');
	}

} else{
	die("Akses Dilarang");
}
?>