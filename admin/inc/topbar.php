 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form action="quantri.php?layout=timkiem"  method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input name="tim-kiem-admin" type="text" class="form-control bg-light border-0 small" placeholder="Search for ID or Name Product"
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Topbar Navbar ...-->

        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->
        <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Xin chào, <?php echo $r['ho_ten'] ?></span>
                    <img class="img-profile rounded-circle"
                        src="../../bootstrap/img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <?php   
                        $result = mysqli_query($conn, "SELECT * FROM taikhoan WHERE username = '$user'");
                        $row = mysqli_fetch_array($result);
                        echo'
                            <a class="dropdown-item"><b>Họ tên: </b>'.$row['ho_ten'].'</a>
                            <a class="dropdown-item"><b>Username: </b>'.$row['username'].'</a>
                            <a class="dropdown-item"><b>Password: </b>'.$row['password'].'</a>
                            <a class="dropdown-item"><b>Số điện thoại: </b>'.$row['sdt'].'</a>
                            <a class="dropdown-item"><b>Email: </b>'.$row['email'].'</a>
                            <a class="dropdown-item"><b>Địa chỉ: </b>'.$row['dia_chi'].'</a>
                            <a class="dropdown-item" href="../pages/logout.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
                            </a>
                        ';
                    ?>
                </div>
            </li>
        </ul>
    </nav>
    <!-- End of Topbar -->
