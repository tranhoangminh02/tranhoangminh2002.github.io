<?php
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM binhluan WHERE id = '$id'");
    $row = mysqli_fetch_array($result);

    if (isset($_POST['submit'])) {
        $masp = $_POST['masp'];
        $noidung = $_POST['noidung'];
        $ngaytao = $row['ngay_tao'];
        $hoten = $row['ho_ten'];

        if (isset($masp) && isset($noidung)) {
            mysqli_query($conn, "UPDATE `binhluan` SET `id`='$id',`id_sp`='$masp',`ho_ten`='$hoten',`ngay_tao`='$ngaytao',`noi_dung`='$noidung' WHERE id = '$id'");
            // echo '<center class="alert alert-success">Sản phẩm đã được sửa thành công!</center>';
            echo '<script> location.replace("quantri.php?layout=quanlybinhluan"); </script>';
        }else{  
            echo '<center class="alert alert-danger">Sửa bình luận thất bại!</center>';
        }
    }
?>
<h2 class="mb-4 text-primary">SỬA BÌNH LUẬN</h2>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="panel">
            <form method="post" enctype="multipart/form-data" role="form">
                <div class="form-group">
                    <label for="">Mã sản phẩm</label>
                    <input type="text" name="masp" class="form-control" required value="<?php echo $row['id_sp'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Ngày bình luận</label>
                    <input type="text" name="ngaybl" id="" required class="form-control" value="<?php echo $row['ngay_tao']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nội dung bình luận</label>
                    <input type="text" name="noidung" required id="" class="form-control" value="<?php echo $row['noi_dung']?>"></input>
                </div>
                <div class="float-right">
                    <button type="submit" name="submit" class="btn btn-outline-primary">Cập nhật thông tin bình luận</button>
                    <button type="reset" class="btn btn-outline-success">Làm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>