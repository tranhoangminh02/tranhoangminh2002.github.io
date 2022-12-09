<?php
    if (isset($_POST['submit'])) {
        $user = $_POST['user'];
        $pass = $_POST['password'];
        $hoten = $_POST['hoten'];
        $email = $_POST['email'];
        $quyen = $_POST['quyen_truy_cap'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['dia_chi'];

        if (isset($user) && isset($pass)) {
            mysqli_query($conn, "INSERT INTO `taikhoan`(`id_tk`, `ho_ten`, `username`, `password`, `email`, `quyen_truy_cap`, `dia_chi`, `sdt`) VALUES (null,'$hoten','$user','$pass','$email','$quyen','$diachi','$sdt')");
            // echo '<center class="alert alert-success">Sản phẩm đã được sửa thành công!</center>';
            echo '<script> location.replace("quantri.php?layout=quanlythanhvien"); </script>';
        }else{  
            echo '<center class="alert alert-danger">Thêm thành viên thất bại!</center>';
        }
    }
    ?>
<h2 class="mb-4 text-primary">THÊM THÀNH VIÊN</h2>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="panel">
            <form method="post" enctype="multipart/form-data" role="form">
                <div class="form-group">
                    <label for="">Họ tên</label>
                    <input type="text" name="hoten" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="user"  required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password" required id="" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" required id="" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="">Quyền truy cập</label>
                    <input type="text" name="quyen_truy_cap" required id="" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="sdt" required id="" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="dia_chi" required id="" class="form-control"></input>
                </div>
                <div class="float-right">
                    <button type="submit" name="submit" class="btn btn-outline-primary">Thêm thành viên</button>
                    <button type="reset" class="btn btn-outline-success">Làm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>