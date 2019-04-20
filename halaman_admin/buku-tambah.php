<?php
include("../koneksi.php");

if(isset($_POST['tambah'])){

  $kdbuku = $_POST['kdbuku'];
  $isbn = $_POST['isbn'];
  $judul = $_POST['judul'];
  $pengarang = $_POST['pengarang'];
  $penerbit = $_POST['penerbit'];
  $tahun = $_POST['tahun'];
  $kategori = $_POST['kategori'];
  $stok = $_POST['stok'];
  $klasifikasi = $_POST['klasifikasi'];

  $nama_klasifikasi = '';
  $id_klasifikasi = '';

  if( $klasifikasi >= 900){
    $nama_klasifikasi = 'Geografi & Sejarah';
    $id_klasifikasi = '10';
  }else if( $klasifikasi == '2XX'){
    $nama_klasifikasi = 'Agama Islam';
    $id_klasifikasi = '11';
  }else if( $klasifikasi == '2X1'){
    $nama_klasifikasi = 'Alquran';
    $id_klasifikasi = '12';
  }else if( $klasifikasi == '2X2'){
    $nama_klasifikasi = 'Hadis yang Berkaitan';
    $id_klasifikasi = '13';
  }else if( $klasifikasi == '2X3'){
    $nama_klasifikasi = 'Aqaid & Ilmu Kalam';
    $id_klasifikasi = '14';
  }else if( $klasifikasi == '2X4'){
    $nama_klasifikasi = 'Fiqih';
    $id_klasifikasi = '15';
  }else if( $klasifikasi == '2X5'){
    $nama_klasifikasi = 'Akhlak & Tasawuf';
    $id_klasifikasi = '16';
  }else if( $klasifikasi == '2X6'){
    $nama_klasifikasi = 'Sosial & Budaya Islam';
    $id_klasifikasi = '17';
  }else if( $klasifikasi == '2X7'){
    $nama_klasifikasi = 'Filsafat Islam & Perkembangan';
    $id_klasifikasi = '18';
  }else if( $klasifikasi == '2X8'){
    $nama_klasifikasi = 'Aliran & Sekte Islam';
    $id_klasifikasi = '19';
  }else if( $klasifikasi == '2X9'){
    $nama_klasifikasi = 'Sejarah & Biografi Islam';
    $id_klasifikasi = '20';
  }else if ($klasifikasi >= 800 ){
    $nama_klasifikasi = 'Sastra';
    $id_klasifikasi = '9';
  } else if( $klasifikasi >= 700){
    $nama_klasifikasi = 'Seni';
    $id_klasifikasi = '8';
  } else if( $klasifikasi >= 600){
    $nama_klasifikasi = 'Teknologi';
    $id_klasifikasi = '7';
  } else if( $klasifikasi >= 500){
    $nama_klasifikasi = 'Ilmu Alam & Matematika';
    $id_klasifikasi = '6';
  } else if( $klasifikasi >= 400){
    $nama_klasifikasi = 'Bahasa';
    $id_klasifikasi = '5';
  }else if( $klasifikasi >= 300){
    $nama_klasifikasi = 'Ilmu Sosial & Keluarga';
    $id_klasifikasi = '4';
  }else if( $klasifikasi >= 200){
    $nama_klasifikasi = 'Agama';
    $id_klasifikasi = '3';
  }else if( $klasifikasi >= 100){
    $nama_klasifikasi = 'Filsafat & Psikologi';
    $id_klasifikasi = '2';
  } else{
    $nama_klasifikasi = 'Informasi Umum';
    $id_klasifikasi = '1';
  }

  $nama_file = $_FILES['foto']['name'];
  $ukuran_file = $_FILES['foto']['size'];
  $tipe_file = $_FILES['foto']['type'];
  $tmp_file = $_FILES['foto']['tmp_name'];

		// Set path folder tempat menyimpan gambarnya
  $path = "gambar_buku/".$nama_file;
		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
      
 			// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
  			if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
    		// Jika ukuran file kurang dari sama dengan 1MB, lakukan :
          
    		// Proses upload
    			if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            
      				// Jika gambar berhasil diupload, Lakukan :  
      				// Proses simpan ke Database

            $query ="INSERT INTO buku(kode, foto, isbn, judul, pengarang, penerbit, tahun, stok, id_kategori, id_klasifikasi, nomor_klasifikasi ,klasifikasi) VALUE ('$kdbuku', '$nama_file' ,'$isbn' ,'$judul', '$pengarang', '$penerbit', '$tahun', '$stok', '$kategori', '$id_klasifikasi','$klasifikasi','$nama_klasifikasi')";
      				$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
              
      					if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        				// Jika Sukses, Lakukan :
        				header('Location: buku-list.php'); // Redirectke halaman buku-list.php
             }else{
        				// Jika Gagal, Lakukan :
              header('Location: buku-formtambah.php');
            }
          } else{
      				// Jika gambar gagal diupload, Lakukan :
            echo "Maaf, Gambar gagal untuk diupload.";
            echo "<br><a href='buku-formtambah.php'>Kembali Ke Form</a>";
          }
        }else{
    		// Jika ukuran file lebih dari 1MB, lakukan :
          echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
          echo "<br><a href='buku-formtambah.php'>Kembali Ke Form</a>";
        }
      } else{
  			// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
       echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
       echo "<br><a href='buku-formtambah.php'>Kembali Ke Form</a>";
     }

   }
   ?>