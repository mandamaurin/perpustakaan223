<?php 
$title = "Tambah Kategori Buku";
include("layout-header.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Kategori Buku</h1>
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
                            <form action="kategori-tambah.php" method="POST" role="form">
                                <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input class="form-control" name="nama">
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