<?php 
$title = "Tahun Buku";
include("layout-header.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tahun Buku</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <!-- /.panel-heading -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <?php
                                        $sql = "SELECT * FROM tahun";
                                        $query = mysqli_query($koneksi, $sql);

                                        if (mysqli_num_rows($query) < 1) {
                                            echo "Tidak Ada Data";
                                        } else {
                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th>Id</th>";
                                            echo "<th>Kategori</th>";
                                            echo "<th>Aksi</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                        }

                                        while ($tahun = mysqli_fetch_array($query)){
                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td>".$tahun['id_tahun']."</td>";
                                            echo "<td>".$tahun['tahun']."</td>";
                                            echo "<td>";
                                            echo "<a class='btn btn-danger' data-toggle='tooltip' data-placement='left' title='Hapus' href='tahun-hapus.php?id=".$tahun['id_tahun']."' onClick='return hapus()'><i class='fa fa-trash fa-fw'></i></a>";
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
                            <p>Total Kategori : <?php echo mysqli_num_rows($query);  ?></p>
                            <p><i class="fa fa-warning fa-fw"></i><i>Penghapusan tahun dapat berpengaruh terhadap isi data buku</i></p>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
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
