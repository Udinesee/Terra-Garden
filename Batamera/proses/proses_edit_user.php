<?php
include "koneksi.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$name = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$password =  md5('password');

if (!empty($_POST['input_user_validate'])){
   $select = mysqli_query ($conn,"SELECT*FROM users WHERE username='$username'");
   if(mysqli_num_rows($select) > 0){
      $message='<script>alert("Username sudah ada");
            window.location="../user"</script>
            </script>';
   }else{
      $query = mysqli_query ($conn,"UPDATE users  SET nama='$name', username='$username', level='$level', nohp='$nohp', alamat='$alamat' WHERE id='$id'");
      if(!$query){
         $message='<script>alert("Data gagal diupdate")</script>';
      }else{
         $message='<script>alert("Data berhasil diupdate");
                  window.location="../user"</script>
                  </script>';
      }
   }
}echo $message;



?>
