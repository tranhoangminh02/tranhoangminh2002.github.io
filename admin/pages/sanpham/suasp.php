<?php
    $id_sp = $_GET['id'];
    $sql = "SELECT * FROM sanpham WHERE id_sp = '$id_sp'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $sql_dm = "SELECT * FROM danhmuc";
    $query_dm = mysqli_query($conn, $sql_dm);

    $user = $_SESSION['username'];
    $results = mysqli_query($conn,"SELECT * FROM taikhoan WHERE username = '$user'");
    $rows = mysqli_fetch_array($results);
    $id_tk = $rows['id_tk'];

    if (isset($_POST['submit'])) {
        $tensanpham = $_POST['ten_san_pham'];
        $loai_sp = $_POST['loai_sp'];
        $hangsanxuat = $_POST['hangsx'];
        $soluong = $_POST['so_luong'];
        $gia = $_POST['gia'];
        $motasp = $_POST['mo_ta_sp'];
        $baohanh = $_POST['bao_hanh'];
        $khuyenmai = $_POST['khuyen_mai'];
        $cpu = $_POST['cpu'];
        $mainboard = $_POST['mainboard'];
        $ram = $_POST['ram'];
        $dungluong = $_POST['dung_luong'];
        $hedieuhanh = $_POST['he_dieu_hanh'];
        $phienban = $_POST['phien_ban'];
        $loaiocung = $_POST['loai_o_cung'];
        $kichthuoc_khoiluong = $_POST['kichthuoc_khoiluong'];
        $congketnoi = $_POST['cong_ket_noi'];
        $manhinh = $_POST['man_hinh'];
        $pin = $_POST['pin'];
        $xuatxu = $_POST['xuat_xu'];
        $id_dm = $_POST['danhmuc'];
        $hangsx = $_POST['hangsx'];
        $card_man_hinh = $_POST['card_man_hinh'];


        if (isset($tensanpham) && isset($hangsanxuat) && isset($soluong) && isset($gia) && isset($motasp)&& isset($baohanh) && isset($khuyenmai) && isset($cpu) && isset($ram)&& isset($dungluong) && isset($hedieuhanh) && isset($phienban) && isset($loaiocung) && isset($kichthuoc_khoiluong)&& isset($congketnoi)&& isset($manhinh)&& isset($pin)&& isset($xuatxu)) {
            if($_FILES['hinh_anh']['name'] == ''){
                $hinh_anh = $_POST['hinh_anh'];
            }else{
                $hinh_anh = "IMG_".$_FILES['hinh_anh']['name'];
                $file = $_FILES['hinh_anh']['tmp_name'];
                $path = "../images/" . $hinh_anh;
                move_uploaded_file($file, $path);
            }
            mysqli_query($conn, "UPDATE sanpham SET id_sp='$id_sp',id_dm='$id_dm',id_tk='$id_tk',id_hang_sx='$hangsanxuat',ten_sp='$tensanpham',loai_sp='$loai_sp',so_luong='$soluong',gia='$gia',mo_ta_sp='$motasp',hinh_anh='$hinh_anh',bao_hanh='$baohanh',khuyen_mai='$khuyenmai',Mainboard='$mainboard',CPU='$cpu',RAM='$ram',card_man_hinh='$card_man_hinh',HDH='$hedieuhanh', phien_ban='$phienban',dung_luong='$dungluong',loai_o_cung='$loaiocung',kichthuoc_khoiluong='$kichthuoc_khoiluong',cong_ket_noi='$congketnoi',man_hinh='$manhinh',dung_luong_pin='$pin',xuat_xu='$xuatxu' WHERE id_sp = '$id_sp'");
            echo '<center class="alert alert-success">Sản phẩm đã được sửa thành công!</center>';

        }else{  
            echo '<center class="alert alert-danger">Sửa sản phẩm thất bại!</center>';
        }
    }
?>
<h2 class="mb-4 text-primary">SỬA SẢN PHẨM</h2>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="panel">
            <form method="post" enctype="multipart/form-data" role="form">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="ten_san_pham" class="form-control" required="" value="<?php echo $row['ten_sp'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Loại sản phẩm</label>
                    <input type="text" name="loai_sp" class="form-control" required="" value="<?php echo $row['loai_sp'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Danh mục sản phẩm</label>
                    <select name="danhmuc" class="form-control">
                        <?php
                            $result_dm = mysqli_query($conn, "SELECT * FROM danhmuc");
                            while ($row_id_dm = mysqli_fetch_array($result_dm)) {
                            ?>
                                <option <?php
                                    if($row['id_dm'] == $row_id_dm['id_dm']){
                                        echo 'selected="selected"';
                                    }?>
                                value="<?php echo $row_id_dm['id_dm']; ?>"><?php echo $row_id_dm['ten_dm']; ?></option>
                            <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Hãng sản xuất</label>
                    <select name="hangsx" class="form-control">
                        <?php
                        $result_id = mysqli_query($conn, "SELECT * FROM hangsanxuat");
                        while ($row_id_hang = mysqli_fetch_array($result_id)) {
                        ?>
                            <option <?php
                                if($row['id_hang_sx'] == $row_id_hang['id_hang_sx']){
                                    echo 'selected="selected"';
                                }?>value="<?php echo $row_id_hang['id_hang_sx']; ?>"><?php echo $row_id_hang['ten_hang_sx']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Hình ảnh</label>
                    <input type="file" name="hinh_anh" class="form-control-file">          
                    <input type="hide" name="hinh_anh" value="<?php echo $row['hinh_anh']; ?>" class="form-control-plaintext" readonly>

                </div>
                <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="number" name="so_luong" id="" required="" class="form-control" value="<?php echo $row['so_luong']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Giá</label>
                    <input type="text" name="gia" id="" required="" class="form-control" value="<?php echo $row['gia']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Mô tả sản phẩm</label>
                    <textarea type="text" name="mo_ta_sp" required="" id="editor1"<?php if (isset($_POST['mo_ta_sp'])) {
                                                                                            echo $_POST['mo_ta_sp'];
                                                                                        } else {
                                                                                            echo $row['mo_ta_sp'];
                                                                                        }  ?>></textarea>
                </div>
                <div class="form-group">
                    <label for="">Bảo hành</label>
                    <input type="text" name="bao_hanh" value="<?php echo $row['bao_hanh']; ?>" required="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Khuyến mãi</label>
                    <input type="text" name="khuyen_mai" required="" class="form-control" value="<?php echo $row['khuyen_mai']; ?>">
                    <!-- Khi lay du lieu phai x100 -->
                </div>
                <div class="form-group">
                    <label for="">Mainboard</label>
                    <input type="text" name="mainboard"  class="form-control" value="<?php echo $row['Mainboard']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Loại CPU</label>
                    <input type="text" name="cpu" required="" class="form-control" value="<?php echo $row['CPU']; ?>">
                </div>
                <div class="form-group">
                    <label for="">RAM</label>
                    <input type="text" name="ram" required="" class="form-control" value="<?php echo $row['RAM']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Card màn hình</label>
                    <input type="text" name="card_man_hinh" class="form-control" value="<?php echo $row['card_man_hinh']; ?>">
                </div>
                <div class="form-group">
                    <label for="he_dieu_hanh">Hệ điều hành</label>
                    <input type="text" name="he_dieu_hanh" required="" class="form-control" value="<?php echo $row['HDH']; ?>">
                </div>
                <div class="form-group">    
                    <label for="phien_ban">Phiên bản</label>
                    <input type="text" name="phien_ban" id="phien_ban" class="form-control" value="<?php echo $row['phien_ban']; ?>"></input>
                </div>
                <div class="form-group">
                    <label for="">Dung lượng</label>
                    <input type="text" name="dung_luong" required="" class="form-control" value="<?php echo $row['dung_luong']; ?>">
                </div>
                <div class="form-group">
                <label for="loai_o_cung">Loại ổ cứng</label>
                    <input type="text" name="loai_o_cung" id="loai_o_cung" class="form-control" value="<?php echo $row['loai_o_cung']; ?>"></input>
                </div>
                <div class="form-group">
                    <label for="">Khối lượng, kích thước</label>
                    <input type="text" name="kichthuoc_khoiluong"  class="form-control" value="<?php echo $row['kichthuoc_khoiluong']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Cổng kết nối</label>
                    <input type="text" name="cong_ket_noi" class="form-control" value="<?php echo $row['cong_ket_noi']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Màn hình</label>
                    <input type="text" name="man_hinh" class="form-control" value="<?php echo $row['man_hinh']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Pin</label>
                    <input type="text" name="pin" class="form-control" value="<?php echo $row['dung_luong_pin']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Xuất xứ</label>
                    <input type="text" name="xuat_xu" required="" class="form-control" value="<?php echo $row['xuat_xu']; ?>">
                </div>
                <div class="float-right">
                    <button type="submit" name="submit" class="btn btn-outline-primary">Cập nhật thông tin sản phẩm</button>
                    <button type="reset" class="btn btn-outline-success">Làm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>