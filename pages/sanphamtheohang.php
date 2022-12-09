<?php
    $ten_hangsx = $_GET['ten_hangsx'];
    $loai = $_GET['loai'];
    // $truyvan = mysqli_query($conn,"SELECT * FROM sanpham INNER JOIN danhmuc ON sanpham.id_dm = danhmuc.id_dm INNER JOIN hangsanxuat ON sanpham.id_hang_sx = hangsanxuat.id_hang_sx WHERE ten_hang_sx = '$ten_hangsx' AND ten_dm = '$loai'");
    // $row_ = mysqli_fetch_array($truyvan);
    $truyvan = mysqli_query($conn,"SELECT * FROM danhmuc INNER JOIN sanpham ON danhmuc.id_dm = sanpham.id_dm INNER JOIN hangsanxuat ON sanpham.id_hang_sx = hangsanxuat.id_hang_sx WHERE ten_hang_sx = '$ten_hangsx' AND ten_dm = '$loai' ");
?>

<title><?php echo $ten_hangsx ?></title>
<div class="container-fluid bg-trasparent mt-1" style="position: relative">
    <h5 class="mt-2 border-start border-3 rounded border-bottom border-danger p-2">
        <?php
            if($loai == 'Laptop'){
                echo 'Bạn đang ở: <a href="index.php?layout=home">Trang chủ </a> › <a href="index.php?layout=laptop">Laptop</a> › '.$ten_hangsx.'';
            }else{
                echo 'Bạn đang ở: <a href="index.php?layout=home">Trang chủ </a> › <a href="index.php?layout=pc">PC</a> › '.$ten_hangsx.'';
            }
        ?>
    </h5>

    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        <?php
            while($row = mysqli_fetch_array($truyvan)){
                $gia_goc = number_format($row['gia']);
                if($row['khuyen_mai'] == 0){
                    $gia = number_format($row['gia']*1);
                    $giamgia = '';
                }else{
                    $gia = number_format($row['gia']-($row['gia'] * $row['khuyen_mai']));
                    $giamgia = "-".($row['khuyen_mai']*100)."%";
                }
                echo '
                    <div class="col hp">
                        <div class="card h-100 shadow-sm">
                            <a href="index.php?layout=view&&id_sp='.$row['id_sp'].'">
                                <img src="admin/images/'.$row['hinh_anh'].'" class="card-img-top" alt="product.title" />
                            </a>
                            <div class="label-top">
                                <span class="float-end badge bg-danger">'.$giamgia.'</span>
                            </div>
                            <div class="card-body">
                                <div class="clearfix mb-3">
                                    <span class="float-start text-danger fw-bold">'.$gia.' VNĐ</span>
                                    <span class="float-end small text-secondary text-decoration-line-through fst-italic">'.$gia_goc.' VNĐ</span>
                                </div>
                                <h5 class="card-title text-center">
                                    <a class="text-primary fw-bold" target="_blank" href="index.php?layout=view&&id_sp='.$row['id_sp'].'">'.$row['ten_sp'].'</a>
                                </h5>
                                <div class="d-grid gap-2 my-4">
                                    <a href="index.php?layout=them_gio_hang&&id_sp='.$row['id_sp'].'" class="btn btn-warning bold-btn">thêm vào giỏ hàng</a>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                ';
            }
        ?>
    </div>
</div>