<nav class="navbar navbar-expand sticky-top shadow rounded" style="background-color: #ff9900;">

    <div class="container-lg">
        <a class="navbar-brand" href="Home">
            <img src="assets/Logo Terragarden no text-03.png" alt="Logo" width="30" class="d-inline-block align-text-top">
            <span class="fs-5 ms-2 d-none d-sm-inline text-black fw-normal">Terra Garden</span>
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="fs-5 ms-2 d-none d-sm-inline ">
                            <?php
                             echo  $hasil['username']; ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt bg-light">
                        <li>
                            <a class="dropdown-item text-black" href="#">
                                <i class="fa-4 fa fa-user"></i><span class="fs-5 ms-2 d-none d-sm-inline">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-black" href="#" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword">
                                <i class="fa-solid fa-key"></i><span
                                    class="fs-5 ms-2 d-none d-sm-inline">Ubah Password</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-black" href="logout">
                                <i class="fa-4 fa fa-right-from-bracket"></i><span
                                    class="fs-5 ms-2 d-none d-sm-inline">Logout</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>


</nav>
<!-- Modal Edit -->
<div class="modal fade" id="ModalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form  class="needs-validation" novalidate action="proses/proses_ubah_password.php" method="POST">
              <input type="hidden" value="<?php echo $row['id']?>" name="id">
              <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required  value="<?php echo $_SESSION['username_batamera']?>">
                        <label for="floatingInput">Username</label>
                        <div class="invalid-feedback">
                            Masukan Username
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword"name="passwordlama" required >
                        <label for="floatingInput">Password Lama</label>
                        <div class="invalid-feedback">
                            Masukan Password Lama
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput"name="passwordbaru" required >
                        <label for="floatingInput">Password Baru</label>
                        <div class="invalid-feedback">
                            Masukan Password Baru
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword"name="repasswordbaru"required >
                        <label for="floatingInput">Ulangi Password Baru</label>
                        <div class="invalid-feedback">
                            Masukan Ulangi Password Baru
                        </div>
                      </div>
                    </div>
                </div>
                
            </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="ubah_password_validate" value="12345">Save changes</button>
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir Modal Edit -->