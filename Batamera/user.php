<?php
include "proses/koneksi.php";
$query = mysqli_query($conn, "SELECT* FROM users");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}
?>

<div class="col-lg-9  mt-2">
  <div class="card">
    <div class="card-header">
      Halaman User
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah User</button>
        </div>
      </div>
      <!-- Modal User Tambah -->
      <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
              <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" required>
                        <label for="floatingInput">Nama</label>
                        <div class="invalid-feedback">
                            Masukan Nama
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required>
                        <label for="floatingInput">Username</label>
                        <div class="invalid-feedback">
                            Masukan Username
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                      <div class="form-floating mb-3">
                      <select required class="form-select" aria-label="Default select example" name="level">
                          <option selected hidden value=""></option>
                          <option value="1">Admin</option>
                          <option value="2">Kasir</option>
                          <option value="3">Dapur</option>
                          <option value="3">Owner</option>
                      </select>
                        <label for="floatingInput">Pilih Level User</label>
                        <div class="invalid-feedback">
                            Pilih Level
                        </div>
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="form-floating mb-3" >
                        <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxxx" name="nohp">
                        <label for="floatingInput">Nomor Hp</label>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput" placeholder="Password"  value ="12345" name="password">
                        <label for="floatingPassword">Password</label>
                      </div>
                    </div>
                </div>
                <div class="form-floating">
                  <textarea class="form-control" id=""style="100px" name="alamat"></textarea>
                  <label for="floatingInput">Alamat</label>
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="input_user_validate" value="12345">Save changes</button>
            </div>
            </form>
            
          </div>
        </div>
      </div>
      <!-- Akhir Modal User Tambah Baru -->
      <?php
      foreach ($result as $row){

      
        ?>
      <!-- Modal view -->
      <div class="modal fade" id="ModalView<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form  class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
              
              <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" value="<?php echo $row['nama']?>">
                        <label for="floatingInput">Nama</label>
                        <div class="invalid-feedback">
                            Masukan Nama
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username"  value="<?php echo $row['username']?>">
                        <label for="floatingInput">Username</label>
                        <div class="invalid-feedback">
                            Masukan Username
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                      <div class="form-floating mb-3">
                      <select disabled class="form-select" aria-label="Default select example" name="level">
                      <?php
                      $data = array("Admin", "Kasir", "Dapur", "Owner");
                      foreach($data as $key => $value){
                        if($row['level']==$key+1){
                          echo"<option selected value=".($key+1).">$value</option>";
                        }else{
                          echo"<option value=".($key+1).">$value</option>";
                        }
                      }
                      ?>
                      </select>
                        <label for="floatingInput">Pilih Level User</label>
                        <div class="invalid-feedback">
                            Pilih Level
                        </div>
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="form-floating mb-3" >
                        <input disabled type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxxx" name="nohp" value="<?php echo $row['nohp']?>">
                        <label for="floatingInput">Nomor Hp</label>
                      </div>
                    </div>
                </div>
                <div class="form-floating">
                  <textarea disabled class="form-control" id="" style="100px" name="alamat"><?php echo $row['alamat']?></textarea>
                  <label for="floatingInput">Alamat</label>
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir Modal View -->


      <!-- Modal Edit -->
      <div class="modal fade" id="ModalEdit<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form  class="needs-validation" novalidate action="proses/proses_edit_user.php" method="POST">
              <input type="hidden" value="<?php echo $row['id']?>" name="id">
              <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" required value="<?php echo $row['nama']?>">
                        <label for="floatingInput">Nama</label>
                        <div class="invalid-feedback">
                            Masukan Nama
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required  value="<?php echo $row['username']?>">
                        <label for="floatingInput">Username</label>
                        <div class="invalid-feedback">
                            Masukan Username
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                      <div class="form-floating mb-3">
                      <select class="form-select" aria-label="Default select example" name="level">
                      <?php
                      $data = array("Admin","Kasir","Dapur","Owner");
                      foreach($data as $key => $value){
                        if($row['level']==$key+1){
                          echo"<option selected value=".($key+1).">$value</option>";
                        }else{
                          echo"<option value=".($key+1).">$value</option>";
                        }
                      }
                      ?>
                      </select>
                        <label for="floatingInput">Pilih Level User</label>
                        <div class="invalid-feedback">
                            Pilih Level
                        </div>
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="form-floating mb-3" >
                        <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxxx" name="nohp" value="<?php echo $row['nohp']?>">
                        <label for="floatingInput">Nomor Hp</label>
                      </div>
                    </div>
                </div>
                <div class="form-floating">
                  <textarea class="form-control" id="" style="100px" name="alamat"><?php echo $row['alamat']?></textarea>
                  <label for="floatingInput">Alamat</label>
                </div>
            </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="input_user_validate" value="12345">Save changes</button>
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir Modal Edit -->

      <!-- Modal Delete -->
      <div class="modal fade" id="ModalDelete<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form  class="needs-validation" novalidate action="proses/proses_delete_user.php" method="POST">
              <input type="hidden" value="<?php echo $row['id']?>" name="id">
              <div class="col-lg-12">
                Apakah ingin menghapus user <b> <?php echo $row['nama']?></b> ??
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345">Delete</button>
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir Modal Delete -->
      <?php
      }
      if (empty($result)) {
        echo "Data user tidak ada";
      } else {


        ?>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Level</th>
                <th scope="col">No HP</th>
                <th scope="col">Aksi</th>
            </thead>
            <tbody>
              <?php
              $no =1;
              foreach ($result as $row) {

                ?>


                <tr>
                  <th scope="row"><?php echo $no++?></th>
                  <td>
                    <?php echo $row['nama'] ?>
                  </td>
                  <td>
                    <?php echo $row['username'] ?>
                  </td>
                  <td>
                    <?php 
                        if($row['level']==1){
                          echo"Admin";
                        }elseif($row['level']==2){
                          echo"Kasir";
                        }elseif($row['level']==3){
                          echo"Dapur";
                        }elseif($row['level']==4){
                          echo"Owner";
                        }
                        
                        ?>
                  </td>
                  <td>
                    <?php echo $row['nohp'] ?>
                  </td>
                  <td class="d-flex">
                    <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id']?>"><i
                        class="fa fa-eye"></i></button>
                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id']?>"><i class="fa fa-pen-to-square"></i></button>
                    <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"  data-bs-target="#ModalDelete<?php echo $row['id']?>"><i class="fa fa-trash"></i></button>
                    
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</div>


