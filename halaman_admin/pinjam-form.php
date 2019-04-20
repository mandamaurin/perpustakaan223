<?php 
$title = "Pinjam Buku";
include("layout-header.php");

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pinjam Buku</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="pinjam-proses.php" method="POST" role="form">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_buku" value="<?php echo @$_GET['id_buku']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Induk Siswa</label>
                                    <input class="form-control" name="induk" placeholder="Nomor Induk Siswa">
                                </div>
                                <div class="form-group">
                                    <?php
                                    if( !isset($_GET['id_buku']) ){
                                        header('Location: buku-list.php');
                                    }

                                    $id = $_GET['id_buku'];

                                    $sql = "SELECT * FROM buku WHERE id_buku=$id";
                                    $query = mysqli_query($koneksi, $sql);
                                    $buku = mysqli_fetch_assoc($query);

                                                // jika data yang di-edit tidak ditemukan
                                    if( mysqli_num_rows($query) < 1 ){
                                        die("data tidak ditemukan...");
                                    }   
                                    ?>
                                    <label>Kode Inventaris</label>
                                    <input class="form-control" name="kdbuku" value="<?php echo $buku['kode'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input class="form-control" name="judul" value="<?php echo $buku['isbn'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input class="form-control" name="judul" value="<?php echo $buku['judul'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Pinjam</label>
                                    <select class="form-control" name="jumlah">

                                        <?php for ($i=1; $i < $buku['stok']; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php
                                    } ?>
                                    
                                </select>
                            </div>
                                        <!--<div class="form-group">
                                            <label>Lama Pinjam</label>
                                            <select class="form-control" name="lama">
                                                <option value="7">1 minggu</option>
                                                <option value="180">1 semester</option>
                                            </select>
                                        </div>-->
                                        <input type="submit" name="pinjam" class="btn btn-warning" value="Pinjam"/>
                                        <a class='btn btn-danger' href='buku-listpinjam.php'>Kembali</a>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row -->
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
