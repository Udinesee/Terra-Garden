<?php
include "koneksi.php";
$nama_menu = (isset($_POST['nama_menu'])) ? htmlentities($_POST['nama_menu']) : "";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
$kat_menu = (isset($_POST['kat_menu'])) ? htmlentities($_POST['kat_menu']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";
$stok = (isset($_POST['stok'])) ? htmlentities($_POST['stok']) : "";

// $password =  md5('password');
$message = "";
$kode_rand = rand(10000, 99999)."-";
$target_dir = "../assets/images/" . $kode_rand;
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty($_POST['input_menu_validate'])) {

   // cek gambar atau bukan
   $cek = getimagesize($_FILES['foto']['tmp_name']);
   if ($cek === false) {
      $message = "Ini bukan file gambar";
      $statusUpload = 0;
   } else {
      $statusUpload = 1;
      if (file_exists($target_file)) {
         $message = "Maaf,file yang anda masukan sudah ada!!!";
         $statusUpload = 0;
      } else {
         if ($_FILES['foto']['size'] > 4000000) { //besar file maxsimum 4mb
            $message = "Maaf file anda terlalu besar";
            $statusUpload = 0;
         } else {
            if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif") {
               $message = "Maaf file harus berformat png,jpg,jpeg,gif";
               $statusUpload = 0;
            }
         }
      }
   }
   if ($statusUpload == 0) {
      $message = '<script>alert("' . $message . ', Gambar tidak bisa diupload");
                  window.location="../menu"</script>';
   }
   // echo $message;
   // exit();
   else {
      $select = mysqli_query($conn, "SELECT*FROM daftar_menu WHERE nama_menu='$nama_menu'");
      if (mysqli_num_rows($select) > 0) {
         $message = '<sc;ript>alert("Nama menu sudah ada");
            window.location="../menu"</script>';
      } else {
         if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            $query = mysqli_query($conn, "INSERT INTO daftar_menu(foto,nama_menu,keterangan,kategori,harga,stok)values('" . $kode_rand . $_FILES['foto']['name'] . "','$nama_menu','$keterangan','$kat_menu','$harga','$stok')");
            if ($query) {
               $message = '<script>alert("Data berhasil dimasukan");
            window.location="../menu"</script>';
            } else {
               $message = '<script>alert("Data gagal dimasukan");
            window.location="../menu"</script>';
            }
         } else {
            $message = '<script>alert("Maaf. Terjadi Kesalahan File Tidak Bisa Diupload");
            window.location="../menu"</script>';
         }
      }
   }
}
echo $message;
?>