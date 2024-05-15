<?php
include "koneksi.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$nama_menu = (isset($_POST['nama_menu'])) ? htmlentities($_POST['nama_menu']) : "";
 $keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
 $kat_menu = (isset($_POST['kat_menu'])) ? htmlentities($_POST['kat_menu']) : "";
 $harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";
 $stok = (isset($_POST['stok'])) ? htmlentities($_POST['stok']) : "";
// $password =  md5('password');

// $message1 = "Ini Bukan file gambar";
// $message2 = "Maaf,file yang anda masukan sudah ada!!!";
// $message3 = "Maaf file anda terlalu besar";
// $message4 = "Maaf file harus berformat png,jpg,jpeg,gif";
// $message5 = '<script>alert("Gambar tidak bisa diupload");
//                   window.location="../menu"</script>';

$kode_rand =rand(10000,99999)."_";
$target_dir = "../Batamera/assets/images/".$kode_rand;
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty($_POST['input_menu_validate'])) {

   // cek gambar atau bukan
   $cek = getimagesize($_FILES['foto']['tmp_name']);
   if ($cek === false) {
      $message = "Ini Bukan file gambar";
      $statusUpload = 0;
   } else {
      $statusUpload = 1;
      if (file_exists($target_file)) {
         $message = "Maaf,file yang anda masukan sudah ada!!!";
         $statusUpload = 0;
      } else {
         if ($_FILES['foto']['size'] > 500000) { //besar file maxsimum 500kb
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
      $message = '<script>alert("' . $message . 'Gambar tidak bisa diupload");
                  window.location="../menu"</script>';
   } else {
      $select = mysqli_query($conn, "SELECT*FROM daftar_menu WHERE nama_menu='$nama_menu'");
      if (mysqli_num_rows($select) > 0) {
         $message = '<script>alert("Nama menu sudah ada");
            window.location="../menu"</script>
            </script>';
      } else {
         if (move_uploaded_file($_FILES['foto']['name'], $target_file)) {
            $query = mysqli_query($conn, "UPDATE daftar_menu SET foto='" .$kode_rand. $_FILES['foto']['name'] . "', nama_menu='$nama_menu', keterangan='$keterangan', kategori='$kat_menu', harga='$harga', stok='$stok' WHERE id='$id'");
            if ($query) {  
               $message = '<script>alert("Data berhasil dimasukan");
            window.location="../menu"</script>
            </script>';
            } else {
               $message = '<script>alert("Data gagal dimasukan");
            window.location="../menu"</script>
            </script>';
            }
         } else {
            $message = '<script>alert("Maaf. Terjadi Kesalahan File Tidak Bisa Diupload");
            window.location="../menu"</script>
            </script>';
         }
      }
   }
}
echo $message;
?>