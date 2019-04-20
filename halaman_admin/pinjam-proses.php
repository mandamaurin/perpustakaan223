<?php
session_start();
include("../koneksi.php");
if(isset($_POST['pinjam']) ){

	$id_buku = $_POST['id_buku'];
	$induk = $_POST['induk'];
	$jumlah = $_POST['jumlah'];
	$tgl_input = Date('Y-m-d');
	$tgl_pinjam = Date('Y-m-d');
	$bataspinjam = date('Y-m-d', strtotime('+3 days', strtotime($tgl_pinjam)));

	$carihari = abs(strtotime($row['tgl_pinjam']) - strtotime($row['batas_pinjam']));
	$hitunghari = floor($carihari / (60*60*24) );
	$telat = '';
	if($hitunghari > 3){
		$status = "Belum Dikembalikan & Telat";
	} else{
		$status = "Belum Dikembalikan";
	}

	$sql = "INSERT INTO peminjaman(id_buku, nomor_induk, jumlah, tgl_pinjam, batas_pinjam, tgl_input ,status) VALUE ('$id_buku', '$induk', '$jumlah', '$tgl_pinjam', '$bataspinjam', '$tgl_input' ,'$status')";
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