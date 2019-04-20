<?php 
$title = "Dashboard Admin";
include("layout-header.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php
                    $total_stok = '';
                    $sql = mysqli_query($koneksi, "SELECT *FROM buku");
                    
                    while($data_buku = mysqli_fetch_array($sql)){
                       $stok[] = $data_buku['stok'];
                       $total_stok = array_sum($stok);
                   }
                   
                   ?>
                   <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-book fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $total_stok; ?></div>
                        <div>Jumlah Buku</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <a href="buku-list.php"><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <?php
                $sql1 = mysqli_query($koneksi, "SELECT *FROM kategori_buku");
                $data_kategori = mysqli_fetch_array($sql1);
                ?>
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo mysqli_num_rows($sql1); ?></div>
                        <div>Total Kategori Buku</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <a href="kategori-list.php"><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                $sql2 = mysqli_query($koneksi, "SELECT *FROM anggota");
                $data_anggota = mysqli_fetch_array($sql2);
                ?>
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo mysqli_num_rows($sql2); ?></div>
                        <div>Total Anggota</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <a href="anggota-list.php"><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">

                <?php
                $totalbuku = 0;
                $sql3 = mysqli_query($koneksi, "SELECT *FROM peminjaman");
                
                while($data_pinjam = mysqli_fetch_array($sql3)){

                    $jumlahbuku[] = $data_pinjam['jumlah'];
                    $totalbuku = array_sum($jumlahbuku);

                }
                
                ?>
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $totalbuku; ?></div>
                        <div>Jumlah Buku Dipinjam</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <a href="peminjaman-list.php"><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <?php
                $tanggal_sekarang = Date('Y-m-d');
                $sql4 = mysqli_query($koneksi, "SELECT *FROM peminjaman WHERE batas_pinjam < '$tanggal_sekarang' AND status ='Belum Dikembalikan' ");
                $data_telat = mysqli_fetch_array($sql4);
                ?>
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-warning fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo mysqli_num_rows($sql4); ?></div>
                        <div>Peminjam Telat</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <a href="peminjam-telat.php"><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include("layout-footer.php"); ?>
