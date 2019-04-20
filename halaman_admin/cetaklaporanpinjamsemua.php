<?php 
$title = "Cetak Laporan Peminjaman Harian";
include("../koneksi.php");
include("function.php");
$tanggal_sekarang = Date('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Peminjaman Perpustakaan SMP N 223 Jakarta</title>
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
    <h1>Laporan Peminjaman Buku SMP N 223</h1>
    <h2>Tanggal Cetak : <?php echo tanggal_indo(date('Y-m-d')); ?></h2>
    
    <table style="width: 100%">
        <?php

        $sql = "SELECT * FROM peminjaman, anggota, buku WHERE peminjaman.id_buku = buku.id_buku AND peminjaman.nomor_induk=anggota.nomor_induk";
        $query = mysqli_query($koneksi, $sql);
        $no = 1;
        $totalbuku = '';

        if (mysqli_num_rows($query) < 1) {
            echo "Tidak Ada Data";
        } else {
            echo "<thead>";
            echo "<tr>";
            echo "<th>No.</th>";
            echo "<th>No. Induk</th>";
            echo "<th>Nama</th>";
            echo "<th>Kelas</th>";
            echo "<th>Klasifikasi</th>";
            echo "<th>Judul Buku</th>";
            echo "<th>Jumlah</th>";
            echo "<th>Tanggal Pinjam</th>";
            echo "<th>Batas Pinjam</th>";
            echo "<th>Status</th>";
            echo "</tr>";
            echo "</thead>";
        }

        while ($row = mysqli_fetch_array($query)){

            $jumlahbuku[] = $row['jumlah'];
            $totalbuku = array_sum($jumlahbuku);

            echo "<tbody>";
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$row['nomor_induk']."</td>";
            echo "<td>".$row['nama_siswa']."</td>";
            echo "<td>".$row['kelas']."</td>";
            echo "<td>".$row['nomor_klasifikasi']." - ".$row['klasifikasi']."</td>";
            echo "<td>".$row['judul']."</td>";
            echo "<td>".$row['jumlah']."</td>";
            echo "<td>".tanggal_tabel($row['tgl_pinjam'])."</td>";
            echo "<td>".tanggal_tabel($row['batas_pinjam'])."</td>";
            echo "<td>".$row['status']."</td>";
            echo "</tr>";
            echo "</tbody>";

        }

        ?>
    </table>
    
    <p>Total Peminjam: <?php echo mysqli_num_rows($query); ?></p>
    <p>Total Buku Keseluruhan : <?php echo $totalbuku;  ?></p>
    
    <script>
        window.print();
    </script>
</body>
</html>

