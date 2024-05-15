<div class="col-lg-3 min-vh-100" style="background-color: #fff">
    <div class="p-2" style="background-color: #fff">
        <a class="d-flex text-decoration-none mt-1 align-items-center text-black">
            <span class="fs-5 d-none d-sm-inline">Menu</span>
        </a>
        <ul class="nav nav-pills flex-column mt-4">
            <li class="nav-item">
                <a href="dashboard" class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='dashboard') ? 'active link-light' : 'link-secondary' ; ?> "><i class="fs-5 fa fa-gauge "></i><span class="fs-4 ms-3 d-none d-sm-inline">Dashboard</span>
                </a>
            </li>
             <?php if($hasil['level']==1){ ?>
            <li class="nav-item">
                <a href="produk" class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='produk') ? 'active link-light' : 'link-secondary' ; ?>"><i class="fs-5 fa fa-table-list"></i><span class="fs-4 ms-3 d-none d-sm-inline">Produk</span>
                </a>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a href="menu" class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='menu') ? 'active link-light' : 'link-secondary' ; ?>"><i class="fa-solid fa-cart-shopping"></i></i><span class="fs-4 ms-3 d-none d-sm-inline">Daftar Tanaman</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="order" class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='order') ? 'active link-light' : 'link-secondary' ; ?>"><i class="fa-solid fa-cart-shopping"></i></i><span class="fs-4 ms-3 d-none d-sm-inline">Order</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="customer" class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='customer') ? 'active link-light' : 'link-secondary' ; ?>"><i class="fa-solid fa-user"></i></i><span class="fs-4 ms-3 d-none d-sm-inline">Customer</span>
                </a>
            </li>
            <?php if($hasil['level']==1){ ?>

            
            <li class="nav-item">
                <a href="user" class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='user') ? 'active link-light' : 'link-secondary' ; ?>"><i class="fa-solid fa-user"></i></i><span class="fs-4 ms-3 d-none d-sm-inline">User</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="report" class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='report') ? 'active link-light' : 'link-secondary' ; ?>"><i class="fs-5 fa fa-clipboard"></i><span class="fs-4 ms-3 d-none d-sm-inline">Report</span>
                </a>
            </li>
            <?php }?>
        </ul>
    </div>
</div>