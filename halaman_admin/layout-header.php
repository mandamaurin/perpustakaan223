<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?php echo $title ?> </title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            function hapus(){
                var msg = "Apakah Anda Yakin Akan Menghapusnya?"
                agree = confirm(msg)
                if(agree)
                    return true
                else 
                    return false
            }

            function kembali(){
                var msg = "Apakah Buku Sudah Dikembalikan?"
                agree = confirm(msg)
                if(agree)
                    return true
                else
                    return false
            }
        </script>

    </head>

    <body>

        <?php 
        session_start();
        include("../koneksi.php");

    // cek apakah yang mengakses halaman ini sudah login
        if($_SESSION['level']==""){
            header("location:../login.php?pesan=gagal");
        }

        ?>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Aplikasi Perpustakaan</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['username']; ?> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-book fa-fw"></i> Katalog Buku<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="lihatbuku.php">Data Buku</a>
                                    </li>
                                    <li>
                                        <a href="buku-formtambah.php">Tambah Buku</a>
                                    </li>
                                    <li>
                                        <a href="kategori-list.php">Kategori Buku</a>
                                    </li>
                                    <li>
                                        <a href="kategori-form.php">Tambah Kategori</a>
                                    </li>
                                    <li>
                                        <a href="tahun-list.php">Tahun Buku</a>
                                    </li>
                                    <li>
                                        <a href="tahun-form.php">Tambah Tahun</a>
                                    </li>
                                <!--
                                <li>
                                    <a href="pengarang-list.php">Pengarang</a>
                                </li>
                                <li>
                                    <a href="pengarang-form.php">Tambah Pengarang</a>
                                </li>-->

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Data Anggota<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="anggota-list.php">Data Anggota</a>
                                </li>
                                <li>
                                    <a href="anggota-formtambah.php">Tambah Anggota</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Transaksi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="peminjaman-list.php">Data Peminjaman</a>
                                </li>
                                <li>
                                    <a href="peminjam-telat.php">Data Peminjam Telat</a> 
                                </li>
                                <li>
                                    <a href="lihatbukupinjam.php">Tambah Peminjaman</a> 
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
