<div class="container-fluid">
    <div class="h5 p-3 mb-2 bg-info text-dark rounded mt-1">
        <strong>Giỏ hàng của bạn</strong>
    </div>
    <div class="table-responsive-sm ">
            <table class="table">
                <?php
                if(isset($_SESSION['username'])){
                    $user = $_SESSION['username'];
                    $truyvan_user = mysqli_query($conn,"SELECT * FROM taikhoan WHERE username = '$user'");
                    $thucthi_user = mysqli_fetch_array($truyvan_user);
                    $id_user = $thucthi_user['id_tk'];
                    $stt = 0;
                    $tatol_money=null;

                    $truyvan = mysqli_query($conn,"SELECT * FROM giohang WHERE id_tk = '$id_user'");
                    $truyvan_sanpham = mysqli_query($conn,"SELECT * FROM sanpham");
                    $row_sanpham = mysqli_fetch_array($truyvan_sanpham);

                    $count = mysqli_num_rows($truyvan);
                    if($count > 0){
                        echo'
                            <thead>
                                <tr class="text-gray-900"> 
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col" class="text-center">Sản phẩm</th>
                                    <th scope="col" class="text-center">Hình ảnh</th>
                                    <th scope="col" class="text-center">Giá</th>
                                    <th scope="col" class="text-center">Số lượng</th>
                                    <th scope="col" class="text-center">Tổng tiền</th>
                                    <th scope="col" class="text-center">Xoá</th>
                                </tr>
                            </thead>
                            <tbody>
                        ';
                        while($row = mysqli_fetch_array($truyvan)){
                            $stt++;
                            $thanh_tien = $row['so_luong'] * $row['don_gia'];
                            $tatol_money += $thanh_tien;
            
                            echo'
                                <tr class="text-gray-900 text-center align-middle">
                                    <th scope="row" class=" text-center align-middle">'.$stt.'</th>
                                    <td class=" text-center align-middle"><a href="index.php?layout=view&&id_sp='.$row['id_sp'].'">'.$row['ten_sp'].'</a></td>
                                    <td class=" text-center align-middle"><img src="./admin/images/'.$row['hinh_anh'].'" alt="product photo" class="img-responsive mx-auto d-block"></td>
                                    <td class=" text-center align-middle">'.number_format($row['don_gia']).'</td>
                                    <td class=" text-center align-middle">
                                        <a href="./index.php?layout=cap_nhat_gio_hang&&id_sp='.$row['id_sp'].'&&type=unplus" class="btn text-warning btn-sl text-center align-middle">-</a>
                                        '.$row['so_luong'].'
                                        <a href="./index.php?layout=cap_nhat_gio_hang&&id_sp='.$row['id_sp'].'&&type=plus" class="btn text-success text-center align-middle">+</a>
                                    </td>
                                    <td class=" text-center align-middle text-danger">'.number_format($thanh_tien).' <sup><u>đ</u></sup></td>
                                    <td class=" text-center align-middle">
                                        <a href="./index.php?layout=xoa_gio_hang&&id_sp='.$row['id_sp'].'&&type=simple"><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>          
                            ';
                        }
                        echo'
                            <tfoot>
                                <tr>
                                    <td class=" text-left align-middle" colspan="2">
                                        <a class="btn btn-primary" href="./index.php?layout=home">Tiếp tục mua hàng</a>
                                    </td>
                                    <td class="text-gray-900 text-right align-middle font-weight-bold" colspan="3">
                                    Tổng tiền giỏ hàng:<span class="text-danger font-weight-bolder"> '.number_format($tatol_money).' VNĐ</span>
                                    </td>
                                    <td class=" text-center align-middle">
                                    <a class="btn btn-success" href="./index.php?layout=thanh_toan&&id_tk='.$id_user.'">Thanh toán</a>
                                    </td>
                                    <td class=" text-center align-middle">
                                        <a class="btn btn-danger" href="./index.php?layout=xoa_gio_hang&&id_sp='.$row['id_sp'].'&&type=all">Xoá hết sản phẩm</a>  
                                    </td>
                                </tr>
                            </tfoot>
                        ';
                    }else{
                        echo'
                            <div class="text-danger">Hiện tại giỏ hàng đang rỗng !!!</div>
                            <a href="./index.php?layout=home"><i class="fas fa-arrow-left"></i>Tiếp tục mua hàng</a>
                        ';
                    }
                }else{
                    echo'
                        <p class="text-danger">Vui lòng <a class="" href="./admin/index.php" ><span class="glyphicon glyphicon-user" ></span> đăng nhập</a> để mua hàng !!!</p>
                    ';
                }
                ?>
                </tbody>
            </table>
    </div>
</div>
