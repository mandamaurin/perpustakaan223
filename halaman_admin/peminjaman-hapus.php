<?php

include("../koneksi.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM peminjaman WHERE id_pinjam = $id";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header('Location: peminjaman-list.php');
    } else{
        die("Data gagal dihapus");
    }

} else{
    die ("Akses Dilarang");
}

?>