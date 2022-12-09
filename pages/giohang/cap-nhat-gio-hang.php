<?php

    $user = $_SESSION['username'];
    $truyvan_user = mysqli_query($conn,"SELECT * FROM taikhoan WHERE username = '$user'");
    $thucthi_user = mysqli_fetch_array($truyvan_user);
    $id_tk = $thucthi_user['id_tk'];

    $id_sp = $_GET['id_sp'];
    $truyvan_giohang = mysqli_query($conn,"SELECT * FROM giohang WHERE id_sp = '$id_sp' and id_tk = '$id_tk'");
    $truyvan_sanpham = mysqli_query($conn,"SELECT * FROM sanpham WHERE id_sp = '$id_sp'");
    $row_giohang = mysqli_fetch_array($truyvan_giohang);
    $row_sanpham = mysqli_fetch_array($truyvan_sanpham);
    date_default_timezone_set('Asia/SaiGon');
    $ngay_dat = date('Y/m/d H:i:s');
    if($row_sanpham['khuyen_mai'] == 0){
        $gia = $row_sanpham['gia']*1;
    }else{
        $gia = $row_sanpham['gia'] * $row_sanpham['khuyen_mai'];
    }
    $id_giohang = $row_giohang['id_giohang'];
    $id_tk = $row_giohang['id_tk'];
    $idsp = $row_giohang['id_sp'];
    $tensp = $row_giohang['ten_sp'];
    $hinh_anh = $row_giohang['hinh_anh'];
    if($_GET['type'] == 'unplus'){
        $soluong = $row_giohang['so_luong'];
        $soluong -= 1;
        $thanh_tien = $soluong * $gia;
        if($soluong <= 0){
            mysqli_query($conn, "DELETE FROM giohang WHERE id_sp='$id_sp'");
        }else{
            mysqli_query($conn, "UPDATE `giohang` SET `id_giohang`='$id_giohang',`id_sp`='$idsp',`ten_sp`='$tensp',`hinh_anh`='$hinh_anh',`so_luong`='$soluong',`don_gia`='$gia',`id_tk`='$id_tk',`thanh_tien`='$thanh_tien',`ngay_dat`='$ngay_dat' WHERE id_sp = '$idsp'");
        }
    }
    else{
        $soluong = $row_giohang['so_luong'];
        $soluong += 1;
        $thanh_tien = $soluong * $gia;

        if($soluong > $row_sanpham['so_luong']){
            echo '
                <script>
                    alert("Hiện tại sản phẩm '.$tensp.' chỉ còn '.$row_giohang['so_luong'].' cái.");
                </script>
            ';
        }else{
            mysqli_query($conn, "UPDATE `giohang` SET `id_giohang`='$id_giohang',`id_sp`='$idsp',`ten_sp`='$tensp',`hinh_anh`='$hinh_anh',`so_luong`='$soluong',`don_gia`='$gia',`id_tk`='$id_tk',`thanh_tien`='$thanh_tien',`ngay_dat`='$ngay_dat' WHERE id_sp = '$idsp'");
        }
    }
?>
<script> location.replace("index.php?layout=gio_hang"); </script>

