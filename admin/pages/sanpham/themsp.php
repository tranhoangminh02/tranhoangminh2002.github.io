<?php
    $sql_hangsx = "SELECT * FROM hangsanxuat";
    $query_hangsx = mysqli_query($conn, $sql_hangsx);
    if (isset($_POST['submit'])) {
        $tensanpham = $_POST['ten_san_pham'];
        $loai_sp = $_POST['loai_sp'];
        $hangsanxuat = $_POST['hangsx'];
        $soluong = $_POST['so_luong'];
        $gia = $_POST['gia'];
        $motasp = $_POST['mo_ta_sp'];
        $baohanh = $_POST['bao_hanh'];
        $khuyenmai = $_POST['khuyen_mai'];
        $mainboard = $_POST['mainboard'];
        $cpu = $_POST['cpu'];
        $ram = $_POST['ram'];
        $dungluong = $_POST['dung_luong'];
        $hedieuhanh = $_POST['he_dieu_hanh'];
        $phien_ban = $_POST['phien_ban'];
        $loaiocung = $_POST['loai_o_cung'];
        $kichthuoc_khoiluong = $_POST['kichthuoc_khoiluong'];
        $congketnoi = $_POST['cong_ket_noi'];
        $manhinh = $_POST['man_hinh'];
        $pin = $_POST['pin'];
        $xuatxu = $_POST['xuat_xu'];
        $id_dm = $_POST['danhmuc'];
        $hangsx = $_POST['hangsx'];
        $card_man_hinh = $_POST['card_man_hinh'];
        date_default_timezone_set('Asia/SaiGon');
        $ngay_tao = date('Y/m/d H:i:s');
        $user = $_SESSION['username'];
            $result = mysqli_query($conn,"SELECT * FROM taikhoan WHERE username ='$user'");
            while($r = mysqli_fetch_array($result)){
                $id_tk = $r['id_tk'];
            }
        if (isset($tensanpham) && isset($hangsanxuat) && isset($soluong) && isset($gia) && isset($motasp)&& isset($cpu) && isset($ram)&& isset($dungluong) && isset($loaiocung) && isset($kichthuoc_khoiluong)&& isset($congketnoi)&& isset($xuatxu)) {
            $hinh_anh = "IMG_".$_FILES['hinh_anh']['name'];
            $file = $_FILES['hinh_anh']['tmp_name'];
            $path = "../images/" . $hinh_anh;
            move_uploaded_file($file, $path);

            mysqli_query($conn,"INSERT INTO `sanpham`(`id_sp`, `id_dm`, `id_tk`, `id_hang_sx`, `ten_sp`, `loai_sp`,`so_luong`, `gia`, `mo_ta_sp`, `hinh_anh`, `bao_hanh`, `khuyen_mai`, `Mainboard`, `CPU`, `RAM`,`card_man_hinh`, `HDH`, `phien_ban`, `dung_luong`, `loai_o_cung`, `kichthuoc_khoiluong`, `cong_ket_noi`, `man_hinh`, `dung_luong_pin`, `xuat_xu`, `ngay_tao`)VALUES (null,'$id_dm','$id_tk','$hangsx','$tensanpham','$loai_sp','$soluong','$gia','$motasp','$hinh_anh','$baohanh','$khuyenmai','$mainboard','$cpu','$ram','$card_man_hinh','$hedieuhanh','$phien_ban','$dungluong','$loaiocung','$kichthuoc_khoiluong','$congketnoi','$manhinh','$pin','$xuatxu','$ngay_tao')");
            
            echo '<center class="alert alert-success">S???n ph???m ???? ???????c th??m th??nh c??ng!</center>';
            
        } else {
            echo '<center class="alert alert-danger">Th??m s???n ph???m th???t b???i!</center>';
        }
    }
?>

<div class="h2 mb-4 text-primary">TH??M S???N PH???M</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="panel">
            <form method="post" enctype="multipart/form-data" role="form">
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-6">
                            <label for="">T??n s???n ph???m</label>
                            <input type="text" name="ten_san_pham" class="form-control" required="">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-xl-5">
                            <label for="">Lo???i s???n ph???m</label>
                            <input type="text" name="loai_sp" class="form-control" required="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="">Danh m???c s???n ph???m</label>
                            <select name="danhmuc" class="form-control">
                            <!-- <option value="unselect" selected>H??ng s???n xu???t</option> -->
                                <?php
                                    $result_dm = mysqli_query($conn, "SELECT * FROM danhmuc");
                                    while ($row_id_dm = mysqli_fetch_array($result_dm)) {
                                    ?>
                                        <option value="<?php echo $row_id_dm['id_dm']; ?>"><?php echo $row_id_dm['ten_dm']; ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-lg-3">
                            <label for="">H??ng s???n xu???t</label>
                            <select name="hangsx" class="form-control">
                                <!-- <option value="unselect" selected>H??ng s???n xu???t</option> -->
                                <?php
                                $result_id = mysqli_query($conn, "SELECT * FROM hangsanxuat");
                                while ($row_id_hang = mysqli_fetch_array($result_id)) {
                                ?>
                                    <option value="<?php echo $row_id_hang['id_hang_sx']; ?>"><?php echo $row_id_hang['ten_hang_sx']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-lg-3">
                            <label for="">H??nh ???nh</label>
                            <input type="file" name="hinh_anh" required="" class="form-control-file">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="">S??? l?????ng</label>
                            <input type="number" name="so_luong" id="" required min="1" class="form-control" value="10">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-lg-3">
                            <label for="">Gi??</label>
                            <input type="text" name="gia" id="" required="" class="form-control">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-lg-3">
                            <label for="">Khuy???n m??i</label>
                            <input type="text" name="khuyen_mai" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">M?? t??? s???n ph???m</label>
                    <textarea type="text" name="mo_ta_sp" required="" id="editor1"></textarea>
                </div>
                <div class="form-group">
                    <label for="">B???o h??nh</label>
                    <input type="text" name="bao_hanh" value="B???o h??nh 24 th??ng (1 ?????i 1 cho s???n ph???m l???i trong th??ng ?????u ti??n)" required="" class="form-control">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-5">
                            <label for="">Mainboard</label>
                            <input type="text" name="mainboard" class="form-control">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-lg-6">
                            <label for="">Lo???i CPU</label>
                            <input type="text" name="cpu" required="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-5">
                            <label for="">RAM</label>
                            <input type="text" name="ram" required="" class="form-control">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-lg-6">
                            <label for="">Card m??n h??nh</label>
                            <input type="text" name="card_man_hinh" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-5">
                            <label for="he_dieu_hanh">H??? ??i???u h??nh</label>
                            <select name="he_dieu_hanh" id="he_dieu_hanh" class="form-control">
                                <option>None</option>
                                <option>Windows 7</option>
                                <option>Windows 8.1</option>
                                <option>Windows 10</option>
                                <option>Windows 11</option>
                                <option>Mac OS</option>
                                <option>Free DOS</option>
                            </select>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-lg-6">
                            <label for="phien_ban">Phi??n b???n</label>
                            <input type="text" name="phien_ban" id="phien_ban" class="form-control" value="Home SL"></input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10">
                        <label for="">Dung l?????ng</label>
                        <input type="text" name="dung_luong" class="form-control">
                    </div>
                    <div class="col-1"></div>
                    <div class="col-lg-1">
                        <label for="loai_o_cung">Lo???i ??? c???ng</label>
                        <input type="text" name="loai_o_cung" id="loai_o_cung" class="form-control" value="SSD"></input>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Kh???i l?????ng, k??ch th?????c</label>
                    <input type="text" name="kichthuoc_khoiluong" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">C???ng k???t n???i</label>
                    <input type="text" name="cong_ket_noi" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">M??n h??nh</label>
                    <input type="text" name="man_hinh" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Pin</label>
                    <input type="text" name="pin"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Xu???t x???</label>
                    <input type="text" name="xuat_xu" required="" class="form-control" value="Trung Qu???c">
                </div>
                <div class="float-right">
                    <button type="submit" name="submit" class="btn btn-outline-primary">Th??m m???i</button>
                    <button type="reset" class="btn btn-outline-success">L??m m???i</button>
                </div>
            </form>
        </div>
    </div>
</div>