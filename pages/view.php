<?php
    $id_sp = $_GET['id_sp'];
    $truyvan = mysqli_query($conn,"SELECT * FROM sanpham WHERE id_sp = '$id_sp'");
    $row = mysqli_fetch_array($truyvan);
    // Lấy id để truy vấn hãng sản xuất => làm link liên kết 
    $id_sx = $row['id_hang_sx'];
    $truyvan_hangsx = mysqli_query($conn,"SELECT * FROM hangsanxuat WHERE id_hang_sx = '$id_sx'");
    $row_hangsx = mysqli_fetch_array($truyvan_hangsx);

?>
<!-- tiêu đề -->
<title><?php echo''.$row['ten_sp'].'' ?></title>
<div class="container-fluid text-gray-900">
    <h5 class="mt-2 border-start border-3 rounded border-bottom border-danger p-2">
        <?php
            if($row['id_dm'] == 1){
                echo 'Bạn đang ở: <a href="index.php?layout=home">Trang chủ </a> › <a href="index.php?layout=laptop">Laptop</a> › '.$row['ten_sp'];
            }else{
                echo 'Bạn đang ở: <a href="index.php?layout=home">Trang chủ </a> › <a href="index.php?layout=pc">PC</a> ›  '.$row['ten_sp'];
            }
        ?>
    </h5>
    <div class="row">
        <div class="col-md-6">
            <img src="./admin/images/<?php echo''.$row['hinh_anh'].''?>" class="img-fluid" width="95%" alt="Responsive image">
        </div>
        <div class="col-md-6">
            <h3 class="font-weight-bold"><?php echo ''.$row['ten_sp'].'' ?></h3>
            <dd>✔ Bảo hành 24 tháng (1 đổi 1 cho sản phẩm lỗi trong tháng đầu tiên).</dd>
            <dd>✔ Hỗ trợ đổi mới trong 7 ngày.</dd>
            <dd>✔ Windows bản quyền tích hợp.</dd>
            <hr>
            <span class="text-uppercase font-weight-bolder text-danger h5">Quà tặng:</span>
            <dd class="font-weight-bold text-warning">🎁 Túi chống sốc GearVN</dd>
            <dd class="font-weight-bold text-success">🎁 Thú bông Lôi Điểu MSI</dd>
            <dd class="font-weight-bold">🎁 <a href="https://gearvn.com/collections/logitech-g203/">Giảm ngay 200.000đ khi mua chuột Logitech G203 kèm Laptop Gaming (Từ 01/06 - 30/06/2022)</a></dd>
            <hr>
            <span class="text-uppercase font-weight-bold text-danger h5">ƯU ĐÃI KHI MUA KÈM LAPTOP/PC:</span>
            <dd>⭐ Mua chuột không dây LM115G Wireless chỉ với 100,000đ.</dd>
            <dd>⭐ Giảm ngay 100,000đ khi mua thêm màn hình máy tính. </dd>
            <dd>⭐ Giảm ngay 100,000đ khi mua thêm Ram. </dd>
            <a href="https://gearvn.com/pages/microsoft-office-365">⭐ Giảm ngay 100,000đ khi mua kèm Microsoft Office (từ 01/04 - 30/06/2022)</a>
            <dd>Và còn rất nhiều ưu đãi khác. <a href="http://gearvn.com/pages/chuong-trinh-mua-kem-pc-gearvn" class="font-weight-bold">XEM NGAY CHI TIẾT TẠI ĐÂY</a></dd>
            <hr>
            <dd>Giá cũ: <del><span class="h5 ml-4 font-weight-bold text-gray-800"><?php echo''.number_format($row['gia']).''?></span></del><sup>đ</sup></dd>
            <dd>Giá mới: <span class="ml-4 h5 text-danger font-weight-bold">
                <?php 
                    if($row['khuyen_mai'] == 0){
                        $gia = number_format($row['gia']*1)."<sup>đ</sup>";
                    }else{
                        $gia = number_format($row['gia']-($row['gia'] * $row['khuyen_mai']))."<sup>đ</sup> (Tiết kiệm ".($row['khuyen_mai']*100)."%)";
                    }
                    echo $gia;
                ?>
            </span></dd>
            <a href="index.php?layout=them_gio_hang&&id_sp=<?php echo''.$row['id_sp'].''?>" class="btn btn-primary d-grid gap-2" type="submit">MUA NGAY</a>
        </div>
    </div>
    <div class="row mt-5">
        <nav class="col text-justify">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cấu hình sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Thông tin sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Thông tin bảo hành</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" class="">
                    <h3 class="font-weight-bold mt-2">Cấu hình <?php echo ''.$row['ten_sp'].'' ?></h3>
                    <table class="table table-hover table-responsive-md text-gray-900">
                        <tbody>
                            <tr>
                                <th class="font-weight-bold ">Mainboard:</th>
                                <td class="text-left">
                                    <?php
                                        if($row['Mainboard'] != null){
                                            echo ''.$row['Mainboard'].'';
                                        }else{
                                            echo '<i>Đang cập nhật</i>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold ">CPU:</th>
                                <td class="text-left">
                                    <?php
                                        if($row['CPU'] != null){
                                            echo ''.$row['CPU'].'';
                                        }else{
                                            echo '<i>Đang cập nhật</i>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold ">RAM:</th>
                                <td class="text-left">
                                    <?php
                                        if($row['RAM'] != null){
                                            echo ''.$row['RAM'].'';
                                        }else{
                                            echo '<i>Đang cập nhật</i>';
                                        }
                                    ?>    
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold ">Card màn hình:</th>
                                <td class="text-left">
                                    <?php
                                        if($row['card_man_hinh'] != null){
                                            echo ''.$row['card_man_hinh'].'';
                                        }else{
                                            echo '<i>Đang cập nhật</i>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold ">Hệ điều hành:</th>
                                <td class="text-left">
                                    <?php
                                        if($row['HDH'] != null){
                                            echo ''.$row['HDH'].'';
                                        }else{
                                            echo '<i>Đang cập nhật</i>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold ">Phiên bản:</th>
                                <td class="text-left">
                                    <?php
                                        if($row['phien_ban'] != null || $row['phien_ban'] == ' '){
                                            echo ''.$row['phien_ban'].'';
                                        }else{
                                            echo '<i>Đang cập nhật</i>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold ">Dung lượng ổ cứng:</th>
                                <td class="text-left">
                                    <?php
                                        if($row['dung_luong'] != null){
                                            echo ''.$row['dung_luong'].'';
                                        }else{
                                            echo '<i>Đang cập nhật</i>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold ">Loại ổ cứng:</th>
                                <td class="text-left">
                                    <?php
                                        if($row['loai_o_cung'] != null){
                                            echo ''.$row['loai_o_cung'].'';
                                        }else{
                                            echo '<i>Đang cập nhật</i>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold ">Màn hình (nếu có):</th>
                                <td class="text-left">
                                    <?php
                                        if($row['man_hinh'] != null){
                                            echo ''.$row['man_hinh'].'';
                                        }else{
                                            echo '<i>Đang cập nhật</i>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold ">Cổng kết nối:</th>
                                <td class="text-left">
                                    <?php
                                        if($row['cong_ket_noi'] != null){
                                            echo ''.$row['cong_ket_noi'].'';
                                        }else{
                                            echo '<i>Đang cập nhật</i>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold ">Kích thước, khối lượng:</th>
                                <td class="text-left">
                                    <?php
                                        if($row['kichthuoc_khoiluong'] != null){
                                            echo ''.$row['kichthuoc_khoiluong'].'';
                                        }else{
                                            echo '<i>Đang cập nhật</i>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold ">Pin (nếu có):</th>
                                <td class="text-left">
                                    <?php
                                        if($row['dung_luong_pin'] != null){
                                            echo ''.$row['dung_luong_pin'].'';
                                        }else{
                                            echo '<i>Đang cập nhật</i>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold ">Xuất xứ:</th>
                                <td class="text-left">
                                    <?php
                                        if($row['xuat_xu'] != null){
                                            echo ''.$row['xuat_xu'].'';
                                        }else{
                                            echo '<i>Đang cập nhật</i>';
                                        }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="tab-pane fade text-dark" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h3 class="font-weight-bold mt-2"><?php echo ''.$row['ten_sp'].'' ?></h3>
                    <?php echo $row['mo_ta_sp']?>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <dd>&nbsp;&nbsp;&nbsp;&nbsp;MTT.Tech xin lỗi vì sự cố khiến Laptop/PC của quý khách bị hỏng và phải đi bảo hành. MTT có 2 hỗ trợ dành riêng cho khách hàng mua điện thoại tại MTT.Tech trong thời gian đi bảo hành như sau:</dd>
                    <dd>&nbsp;&nbsp;&nbsp;&nbsp;MTT.Tech cung cấp cho khách hàng một điện thoại đã qua sử dụng để khách hàng sử dụng tạm thời trong thời gian bảo hành. Chi tiết máy cung cấp quý khách có thể hỏi nhân viên siêu thị hoặc xem trên giấy tiếp nhận bảo hành/sửa chữa dịch vụ.</dd>
                    <dd>&nbsp;&nbsp;&nbsp;&nbsp;Bảo hành có cam kết trong 12 tháng Nếu máy gửi đi bảo hành quá 15 ngày hãng chưa trả máy cho khách hàng, hoặc phải bảo hành lại sản phẩm lần nữa trong 30 ngày kể từ lần bảo hành trước), khách hàng được áp dụng phương thức Hư gì đổi nấy ngay và luôn hoặc Hoàn tiền với mức phí giảm 50%</dd>
                    <dd>Lưu ý: Chỉ áp dụng cho điện thoại và phải còn trong điều kiện bảo hành.</dd>
                    <a href="https://www.thegioididong.com/chinh-sach-bao-hanh-san-pham">Xem thêm chính sách đổi trả</a>
                </div>
            </div>
        </nav>
    </div>
    <?php include 'binhluan.php'; ?>

</div>