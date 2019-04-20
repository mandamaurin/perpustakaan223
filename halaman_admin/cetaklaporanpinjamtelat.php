<?php 
$title = "Cetak Laporan Peminjaman Telat";
include("../koneksi.php");
include("function.php");
$tanggal_sekarang = Date('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Peminjam Telat Perpustakaan SMP N 223 Jakarta</title>
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
    <h1>Laporan Peminjam Telat Buku SMP N 223</h1>
    <h2>Tanggal Cetak : <?php echo tanggal_indo(date('Y-m-d')); ?></h2>
    
    <table style="width: 100%">
        <?php

        
        $sql = "SELECT * FROM peminjaman, anggota, buku WHERE peminjaman.id_buku = buku.id_buku AND peminjaman.nomor_induk=anggota.nomor_induk AND peminjaman.batas_pinjam < '$tanggal_sekarang'";
        $query = mysqli_query($koneksi, $sql);
        $no = 1;

        if (mysqli_num_rows($query) < 1) {
            echo "Tidak Ada Data";
        } else {
            echo "<thead>";
            echo "<tr>";
            echo "<th>No.</th>";
            echo "<th>No. Induk</th>";
            echo "<th>Nama</th>";
            echo "<th>Kelas</th>";
            echo "<th>No. - Klasifikasi</th>";
            echo "<th>Judul Buku</th>";
            echo "<th>Jumlah</th>";
            echo "<th>Tanggal Pinjam</th>";
            echo "<th>Batas Pinjam</th>";
            echo "<th>Telat</th>";
            echo "<th>Status</th>";
            echo "</tr>";
            echo "</thead>";
        }

        while ($row = mysqli_fetch_array($query)){

            $carihari = abs(strtotime($tanggal_sekarang) - strtotime($row['batas_pinjam']));
                //$carihari = abs(strtotime($row['batas_pinjam']) - strtotime($tanggal_sekarang));
                //$hitunghari = floor($carihari / (60*60*24) );

            if($tanggal_sekarang > $row['batas_pinjam']){
                $hitunghari = floor($carihari / (60*60*24) );

            } else{
                $hitunghari = 0;
            }

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
            echo "<td>".$hitunghari." hari</td>";
            echo "<td>".$row['status']."</td>";
            echo "</tr>";
            echo "</tbody>";

        }

        ?>
    </table>
    
    <p>Total Buku Keseluruhan : <?php echo $totalbuku;  ?></p>
    
    <script>
        window.print();
    </script>
</body>
</html>

