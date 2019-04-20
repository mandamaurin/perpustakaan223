<?php 
$title = "Edit Data Buku";
include("layout-header.php");

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

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Data Buku</h1>
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
                            <form action="buku-edit.php" method="POST" enctype="multipart/form-data" role="form">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_buku" value="<?php echo $buku['id_buku']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Kode Inventaris</label>
                                    <input class="form-control" name="kdbuku" value="<?php echo $buku['kode'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input class="form-control" name="isbn" value="<?php echo $buku['isbn'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input class="form-control" name="judul" value="<?php echo $buku['judul'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <input class="form-control" name="pengarang" value="<?php echo $buku['pengarang'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input class="form-control" name="penerbit" value="<?php echo $buku['penerbit'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Terbit</label>
                                    <input class="form-control" name="tahun" value="<?php echo $buku['tahun'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori">
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
                                        <input class="form-control" name="klasifikasi" value="<?php echo $buku['nomor_klasifikasi'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input class="form-control" name="stok" value="<?php echo $buku['stok'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input class="form-control" type="file" name="foto" value="<?php echo $buku['nama_file'] ?>">
                                    </div>
                                    <input type="submit" name="edit" class="btn btn-warning" value="Edit"/>
                                    <a class='btn btn-danger' href='buku-list.php'>Kembali</a>
                                </form>
                                <p style="margin-top: 8px"><i class="fa fa-info-circle fa-fw"></i><i>Untuk mengedit data buku isi semua inputan yang diminta termasuk foto, jika tidak maka proses edit gagal</i></p>
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
