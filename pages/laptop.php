<title>LAPTOP - MTT</title>

<div class="container-fluid bg-trasparent mt-1" style="position: relative">
    <div class="h5 p-3 mb-2 bg-danger text-white rounded mt-1">
        <strong>LAPTOP VĂN PHÒNG - DOANH NGHIỆP</strong>
    </div>

    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        <?php
        // tạo biến 
            $result = mysqli_query($conn,"SELECT * FROM sanpham INNER JOIN danhmuc ON sanpham.id_dm = danhmuc.id_dm WHERE ten_dm = 'Laptop' AND loai_sp = 'Văn phòng - Doanh nghiệp' AND so_luong > 0 LIMIT 8");
            while($row = mysqli_fetch_array($result)){
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
                                <img src="admin/images/'.$row['hinh_anh'].'"  class="card-img-top" alt="product.title" />
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
    
    <div class="h5 p-3 mb-2 bg-danger text-white rounded mt-2">
        <strong>LAPTOP GAMING</strong>
    </div>
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        <?php
            $result = mysqli_query($conn,"SELECT * FROM sanpham INNER JOIN danhmuc ON sanpham.id_dm = danhmuc.id_dm WHERE ten_dm = 'Laptop' AND loai_sp = 'Gaming' AND so_luong > 0 LIMIT 8");

            while($row = mysqli_fetch_array($result)){
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
    
    
    <div class="h5 p-3 mb-2 bg-danger text-white rounded mt-2 mb-5">
        <strong>LAPTOP KỸ THUẬT - ĐỒ HOẠ</strong>
    </div>
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        <?php
            $result = mysqli_query($conn,"SELECT * FROM sanpham INNER JOIN danhmuc ON sanpham.id_dm = danhmuc.id_dm WHERE ten_dm = 'Laptop' AND loai_sp = 'Đồ hoạ' AND so_luong > 0 LIMIT 8");

            while($row = mysqli_fetch_array($result)){
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
    
    
    <!-- <div class="h5 p-3 mb-2 bg-danger text-white rounded mt-2">
        <strong>LAPTOP - HÃNG MSI</strong>
    </div>
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        <?php
            $result = mysqli_query($conn,"SELECT * FROM sanpham INNER JOIN hangsanxuat ON sanpham.id_hang_sx = hangsanxuat.id_hang_sx  WHERE ten_hang_sx = 'MSI' AND so_luong > 0 ORDER BY gia ASC LIMIT 8");

            while($row = mysqli_fetch_array($result)){
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
                                <h5 class="card-title">
                                    <a class="text-primary fw-bold text-center" target="_blank" href="index.php?layout=view&&id_sp='.$row['id_sp'].'">'.$row['ten_sp'].'</a>
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
    </div> -->
</div>
