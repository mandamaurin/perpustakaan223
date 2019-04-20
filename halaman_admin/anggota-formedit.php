<?php 
$title = "Edit Anggota";
include("layout-header.php");

if( !isset($_GET['id_anggota']) ){
    header('Location: anggota-list.php');
}

$id = $_GET['id_anggota'];

$sql = "SELECT * FROM anggota WHERE id_anggota=$id";
$query = mysqli_query($koneksi, $sql);
$anggota = mysqli_fetch_assoc($query);

    // jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Anggota</h1>
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
                            <form action="anggota-edit.php" method="POST" role="form">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_anggota" value="<?php echo $anggota['id_anggota']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Induk</label>
                                    <input class="form-control" name="induk" value="<?php echo $anggota['nomor_induk']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" name="nama" value="<?php echo $anggota['nama_siswa']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jk">
                                        <option>-- Pilih Salah Satu --</option>
                                        <option <?php echo ($anggota['jk'] == 'L') ? "selected": "" ?>>L</option>
                                        <option <?php echo ($anggota['jk'] == 'P') ? "selected": "" ?>>P</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <input class="form-control" name="kelas" value="<?php echo $anggota['kelas']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Masuk</label>
                                    <input class="form-control" name="tahun" value="<?php echo $anggota['tahun_masuk']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat"><?php echo $anggota['alamat'] ?></textarea>
                                </div>
                                <input type="submit" name="edit" class="btn btn-primary" value="Edit"/>
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
