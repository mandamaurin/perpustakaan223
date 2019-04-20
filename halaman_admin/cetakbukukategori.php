<?php 
$title = "Cetak Data Buku";
include("../koneksi.php");

$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM kategori_buku WHERE id_kategori = '$id'");
$kategori = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Buku Perpustakaan SMP N 223 Jakarta</title>
    <style type="text/css">
        table, th, td{
            border : 1px solid black;
            border-collapse: collapse;
        }
        th, td{
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Data Buku Perpustakaan SMP N 223</h1>
    <h2>Kategori : <?php echo $kategori['nama'] ?></h2>
    <table style="width: 100%">
        <?php
        $sql = "SELECT * FROM buku WHERE id_kategori = '$id'";
        $query = mysqli_query($koneksi, $sql);

        $no = 1;
        $totalstok = '';

        if (mysqli_num_rows($query) < 1) {
            echo "Tidak Ada Data";
        } else {
            echo "<thead>";
            echo "<tr>";
            echo "<th>No</th>";
            echo "<th>Gambar</th>";
            echo "<th>Kode Inventaris</th>";
            echo "<th>ISBN</th>";
            echo "<th>No. - Klasifikasi</th>";
            echo "<th>Judul</th>";
            echo "<th>Pengarang</th>";
            echo "<th>Penerbit</th>";
            echo "<th>Tahun</th>";
            echo "<th>Stok</th>";
            echo "</tr>";
            echo "</thead>";
        }

        while ($buku = mysqli_fetch_array($query)){
            $stok[] = $buku['stok'];
            $totalstok = array_sum($stok);
            echo "<tbody>";
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td><img src='gambar_buku/".$buku['foto']."' width='120' height='120'></td>";
            echo "<td>".$buku['kode']."</td>";
            echo "<td>".$buku['isbn']."</td>";
            echo "<td>".$buku['nomor_klasifikasi']." - ".$buku['klasifikasi']."</td>";
            echo "<td>".$buku['judul']."</td>";
            echo "<td>".$buku['pengarang']."</td>";
            echo "<td>".$buku['penerbit']."</td>";
            echo "<td>".$buku['tahun']."</td>";
            echo "<td>".$buku['stok']."</td>";
            echo "</tr>";
            echo "</tbody>";

        }

        ?>
    </table>
    
    <p>Total Buku Keseluruhan : <?php echo $totalstok;  ?></p>
    
    <script>
        window.print();
    </script>
</body>
</html>

