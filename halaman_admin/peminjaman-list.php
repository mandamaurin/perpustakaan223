<?php 
$title = "Data Peminjaman";
include("layout-header.php");

function tanggal_tabel($tanggal){

    $bulan = array(1 => 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Juni', 'Juli', 'Agust', 'Sept', 'Okt', 'Nov', 'Des');
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Semua Peminjaman</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">

                        <div class="row">
                           <div class="box-tools" style="width: 350px; margin-left: 35px; margin-bottom: 20px;">
                            <form action="peminjaman-list.php" method="GET">
                                <div class="input-group">
                                    <input type='text' class="form-control input-sm pull-right" name='qcari' placeholder='Cari Berdasarkan Nama atau Nomor Induk atau Judul' required /> 
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <?php

                                        // Cek apakah terdapat data pada page URL
                                    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                                        $limit = 30; // Jumlah data per halamanya

                                        // Buat query untuk menampilkan daa ke berapa yang akan ditampilkan pada tabel yang ada di database
                                        $limit_start = ($page - 1) * $limit;

                                        if(isset($_GET['qcari'])){
                                            $qcari = $_GET['qcari'];
                                            $sql = "SELECT * FROM peminjaman, anggota, buku, klasifikasi WHERE peminjaman.id_buku = buku.id_buku AND peminjaman.nomor_induk=anggota.nomor_induk AND buku.id_klasifikasi = klasifikasi.id AND anggota.nama_siswa like '%$qcari%' OR anggota.nomor_induk like '%$qcari%' OR buku.judul like '%$qcari%' LIMIT ".$limit_start.",".$limit;
                                        } else{
                                            $sql = "SELECT * FROM peminjaman, anggota, buku, klasifikasi WHERE peminjaman.id_buku = buku.id_buku AND peminjaman.nomor_induk=anggota.nomor_induk AND buku.id_klasifikasi = klasifikasi.id LIMIT ".$limit_start.",".$limit;
                                        }

                                        $query = mysqli_query($koneksi, $sql);

                                        $totalbuku = '';

                                        if (mysqli_num_rows($query) < 1) {
                                            echo "Tidak Ada Data";
                                        } else {
                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th>Id</th>";
                                            echo "<th>No. Induk</th>";
                                            echo "<th>Nama</th>";
                                            echo "<th>Kelas</th>";
                                            echo "<th>No. - Klasifikasi</th>";
                                            echo "<th>Judul Buku</th>";
                                            echo "<th>Jumlah</th>";
                                            echo "<th>Tanggal Pinjam</th>";
                                            echo "<th>Batas Pinjam</th>";
                                            echo "<th>Status</th>";
                                            echo "<th>Aksi</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                        }

                                        while ($row = mysqli_fetch_array($query)){

                                            $jumlahbuku[] = $row['jumlah'];
                                            $totalbuku = array_sum($jumlahbuku);

                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td>".$row['id_pinjam']."</td>";
                                            echo "<td>".$row['nomor_induk']."</td>";
                                            echo "<td>".$row['nama_siswa']."</td>";
                                            echo "<td>".$row['kelas']."</td>";
                                            echo "<td>".$row['nomor_klasifikasi']." - ".$row['nama_klasifikasi']."</td>";
                                            echo "<td>".$row['judul']."</td>";
                                            echo "<td>".$row['jumlah']."</td>";
                                            echo "<td>".tanggal_tabel($row['tgl_pinjam'])."</td>";
                                            echo "<td>".tanggal_tabel($row['batas_pinjam'])."</td>";
                                            echo "<td>".$row['status']."</td>";
                                            echo "<td>";
                                            if($row['status'] == 'Belum Dikembalikan'){
                                                echo "<a class='btn btn-success' data-toggle='tooltip' data-placement='left' title='Dikembalikan' href='peminjaman-edit.php?id=".$row['id_pinjam']."' onClick='return kembali()'><i class='fa fa-check fa-fw'></i></a>";
                                            } else{
                                                echo "<a class='btn btn-danger' data-toggle='tooltip' data-placement='left' title='Hapus' href='peminjaman-hapus.php?id=".$row['id_pinjam']."' onClick='return hapus()'><i class='fa fa-trash fa-fw'></i></a>";
                                            }
                                            echo "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";

                                            
                                            echo "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";

                                        }

                                        ?>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel -->

                            <div class="row">
                                <div class="col-lg-6">
                            <!--
                                Buat paginationnya
                                Dengan bootstrap, kita jadi dimudahkan untuk membuat tombol-tombol pagination dengan design yang
                                bagus tentunya -->
                                <ul class="pagination">
                                    <!-- LINK FIRST AND PREV -->
                                    <?php
                                if ($page == 1) { // Jika page adalah pake ke 1, maka disable link PREV
                                    ?>
                                    <li class="disabled"><a href="#">First</a></li>
                                    <li class="disabled"><a href="#">&laquo;</a></li>
                                    <?php
                                } else { // Jika buka page ke 1
                                    $link_prev = ($page > 1) ? $page - 1 : 1;
                                    ?>
                                    <li><a href="peminjaman-list.php?page=1">First</a></li>
                                    <li><a href="peminjaman-list?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                                    <?php
                                }
                                ?>

                                <!-- LINK NUMBER -->
                                <?php
                                // Buat query untuk menghitung semua jumlah data
                                $sql2 = "SELECT COUNT(*) AS jmlh FROM peminjaman";
                                $query2 = mysqli_query($koneksi, $sql2);
                                $get_jumlah = mysqli_fetch_array($query2);

                                $jumlah_page = ceil($get_jumlah['jmlh'] / $limit); // Hitung jumlah halamanya
                                $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                                $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
                                $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

                                for ($i = $start_number; $i <= $end_number; $i++) {
                                    $link_active = ($page == $i) ? 'class="active"' : '';
                                    ?>
                                    <li <?php echo $link_active; ?>><a href="peminjaman-list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    <?php
                                }
                                ?>

                                <!-- LINK NEXT AND LAST -->
                                <?php
                                // Jika page sama dengan jumlah page, maka disable link NEXT nya
                                // Artinya page tersebut adalah page terakhir
                                if ($page == $jumlah_page) { // Jika page terakhir
                                    ?>
                                    <li class="disabled"><a href="#">&raquo;</a></li>
                                    <li class="disabled"><a href="#">Last</a></li>
                                    <?php
                                } else { // Jika bukan page terakhir
                                    $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
                                    ?>
                                    <li><a href="peminjaman-list.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                                    <li><a href="peminjaman-list.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <p><i>*Menampilkan maksimal 30 data per halaman</i></p>
                    <p>Total Peminjam: <?php echo mysqli_num_rows($query); ?></p>
                    <p>Total Buku yang Dipinjam: <?php echo $totalbuku;  ?></p>
                    
                    <!--<p><i class="fa fa-warning fa-fw"></i><i>Peminjam yang sudah mengembalikan buku akan dihapus datanya dari sistem</i></p>-->
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <a href="cetaklaporanpinjamharian.php" target="_blank"><button class="btn btn-primary"><i class="fa fa-print fa-fw"></i>Cetak Data Peminjaman Hari Ini</button></a>
                </div>
                <div class="col-lg-4">
                    <a href="cetaklaporanpinjambulanan.php" target="_blank"><button class="btn btn-primary"><i class="fa fa-print fa-fw"></i>Cetak Data Peminjaman Bulan Ini</button></a>
                </div> 
                <div class="col-lg-4">
                    <a href="cetaklaporanpinjamsemua.php" target="_blank"><button class="btn btn-primary"><i class="fa fa-print fa-fw"></i>Cetak Seluruh Data Peminjaman</button></a>
                </div>                    
            </div><!--row-->

            
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include("layout-footer.php"); ?>