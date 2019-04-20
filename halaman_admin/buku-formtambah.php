<?php 
$title = "Tambah Data Buku";
include("layout-header.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Data Buku</h1>
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
                            <form  method="POST" enctype="multipart/form-data" action="buku-tambah.php" role="form">
                                <div class="form-group">
                                    <label>Kode Inventaris</label>
                                    <input class="form-control" name="kdbuku" placeholder="Kode Inventaris">
                                </div>
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input class="form-control" name="isbn" placeholder="ISBN">
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input class="form-control" name="judul" placeholder="Judul Buku">
                                </div>
                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <input class="form-control" name="pengarang" placeholder="Pengarang">
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input class="form-control" name="penerbit" placeholder="Penerbit">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Terbit</label>
                                    <input class="form-control" name="tahun" placeholder="Tahun Terbit">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori">
                                        <option>-- Pilih Kategori --</option>
                                        <?php
                                        $sql = "SELECT * FROM kategori_buku";
                                        $query = mysqli_query($koneksi, $sql);

                                        if (mysqli_num_rows($query) < 1) {
                                            echo "<option>Belum Ada Kategori</option>";
                                        }

                                        while ($kategori = mysqli_fetch_array($query)){
                                            ?> 
                                            <option value="<?php echo $kategori['id_kategori'] ?>"> <?php echo $kategori['nama'] ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Klasifikasi</label>
                                        <input class="form-control" name="klasifikasi" placeholder="Klasifikasi">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input class="form-control" name="stok" placeholder="Stok">
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input class="form-control" type="file" name="foto">
                                    </div>
                                    <input type="submit" name="tambah" class="btn btn-primary" value="Tambah"/>
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
