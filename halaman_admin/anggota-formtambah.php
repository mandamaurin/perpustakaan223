<?php 
$title = "Tambah Data Buku";
include("layout-header.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Anggota</h1>
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
                            <form action="anggota-tambah.php" method="POST" role="form">
                                <div class="form-group">
                                    <label>Nomor Induk</label>
                                    <input class="form-control" name="induk" placeholder="Nomor Induk Siswa">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" name="nama" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jk">
                                        <option>-- Pilih Salah Satu --</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <input class="form-control" name="kelas" placeholder="Kelas">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Masuk</label>
                                    <input class="form-control" name="tahun" placeholder="Tahun Masuk">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
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
