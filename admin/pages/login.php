<?php
    if (isset($_SESSION['username'])) {
        $user = $_SESSION['username'];
        $result = mysqli_query($conn,"SELECT * FROM taikhoan WHERE username ='$user'");
        while($r = mysqli_fetch_array($result)){
            $fname = $r['ho_ten'];
        }
    ?>
        <div class="dropdown text-white">
            <span class="btn btn-link dropdown-toggle fw-bold text-info" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Xin chào, <?php echo $fname ?>
            </span>
            <div class="dropdown-menu shadow-lg p-3 mb-5 bg-white rounded" aria-labelledby="dropdownMenuButton">
                <?php
                    $result = mysqli_query($conn, "SELECT * FROM taikhoan WHERE username = '$user'");
                    $row = mysqli_fetch_array($result);
                    echo'
                        <span class="dropdown-item"><b>Họ tên: </b>'.$row['ho_ten'].'</span>
                        <span class="dropdown-item"><b>Username: </b>'.$row['username'].'</span>
                        <span class="dropdown-item"><b>Số điện thoại: </b>'.$row['sdt'].'</span>
                        <span class="dropdown-item"><b>Email: </b>'.$row['email'].'</span>
                        <span class="dropdown-item"><b>Địa chỉ: </b>'.$row['dia_chi'].'</span>
                    ';
                    if($row['quyen_truy_cap'] == 2){
                        echo'
                            <span class="dropdown-item"><b>Cấp bậc: </b>Quản trị viên</span>
                            <a class="dropdown-item text-success" href="admin/pages/quantri.php"><i class="fas fa-user-cog"></i><b>Trang quản trị</b></a>
                        ';
                    }else{
                        echo'
                            <span class="dropdown-item"><b>Cấp bậc: </b>Thành viên</span>
                        ';
                    }
                ?>
                <a href="./admin/pages/logout.php" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt"></i> <b> Đăng xuất</b></a>
            </div>
        </div>
    <?php
    } else {
    ?>
        <a class="fw-bold text-primary" href="./admin/index.php" ><span class="glyphicon glyphicon-user" ></span> Đăng nhập / Đăng ký</a>
<?php
    }
?>

