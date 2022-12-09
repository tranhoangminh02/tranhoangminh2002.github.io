<?php
    if(isset($_SESSION['username'])){
        $user = $_SESSION['username'];
        $result = mysqli_query($conn,"SELECT * FROM taikhoan WHERE username ='$user'");
        $r = mysqli_fetch_array($result);
        $id_tk = $r['id_tk'];

        $id_sp = $_GET['id_sp'];
        // Truy vấn lấy dữ liệu để chèn vào GIỎ HÀNG
        $truyvan = mysqli_query($conn,"SELECT * FROM sanpham WHERE id_sp = '$id_sp'");
        $row = mysqli_fetch_array($truyvan);
        if($row['khuyen_mai'] == 0){
            $gia = $row['gia'];
        }else{
            $gia = $row['gia'] - ($row['gia'] * $row['khuyen_mai']);
        }
        // $idsp = $row['id_sp'];
        $tensp = $row['ten_sp'];
        $hinh_anh = $row['hinh_anh'];
        // $id_tk = $row['id_tk'];
    
        date_default_timezone_set('Asia/SaiGon');
        $ngay_dat = date('Y/m/d H:i:s');
    
        // Truy vấn lấy dữ liệu, kiểm tra sản phẩm có tồn tại trong giỏ hàng => UPDATE
        $truyvan_giohang = mysqli_query($conn,"SELECT * FROM giohang WHERE id_sp = '$id_sp' and id_tk = '$id_tk'");
        $rows = mysqli_fetch_array($truyvan_giohang);

        $truyvan_ = mysqli_query($conn,"SELECT * FROM giohang WHERE id_tk = '$id_tk'");
        $row_ = mysqli_fetch_array($truyvan_);

        if($rows['so_luong'] > 0){
            $id_giohang = $rows['id_giohang'];
            $soluong = $rows['so_luong'] + 1;
            $thanh_tien = $soluong * $gia;
            mysqli_query($conn,"UPDATE `giohang` SET `id_giohang`='$id_giohang',`id_sp`='$id_sp',`ten_sp`='$tensp',`hinh_anh`='$hinh_anh',`so_luong`='$soluong',`don_gia`='$gia',`id_tk`='$id_tk',`thanh_tien`='$thanh_tien',`ngay_dat`='$ngay_dat' WHERE id_sp='$id_sp'");
        }else{
            $soluong = 1;
            $thanh_tien = $soluong * $gia;
            mysqli_query($conn,"INSERT INTO `giohang`(`id_giohang`,`id_sp`, `ten_sp`, `hinh_anh`, `so_luong`, `don_gia`, `id_tk`,`thanh_tien`,`ngay_dat`) VALUES (null,'$id_sp','$tensp','$hinh_anh','$soluong','$gia','$id_tk','$thanh_tien','$ngay_dat')");
        }
        
    }

?>
<script> location.replace("index.php?layout=gio_hang"); </script>
