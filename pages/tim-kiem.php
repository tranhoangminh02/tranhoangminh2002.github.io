<div class="container-fluid bg-trasparent mt-1" style="position: relative">
        <?php
            if(isset($_POST['btn-tim-kiem'])){
                 if (isset($_POST['tim-kiem']) && !empty($_POST['tim-kiem'])) {
                    $tu_khoa_tim_kiem = $_POST['tim-kiem'];
                    $truyvan = "SELECT * FROM danhmuc INNER JOIN sanpham ON danhmuc.id_dm = sanpham.id_dm INNER JOIN hangsanxuat ON sanpham.id_hang_sx = hangsanxuat.id_hang_sx WHERE ten_hang_sx LIKE '%$tu_khoa_tim_kiem%' OR ten_dm LIKE '%$tu_khoa_tim_kiem%' OR ten_sp LIKE '%$tu_khoa_tim_kiem%' OR loai_sp LIKE '%$tu_khoa_tim_kiem%'";
                    echo '<title>Kết quả tìm kiếm '.$tu_khoa_tim_kiem.'</title>';
                }else{
                    echo '
                        <script language="javascript">          
                            alert("Vui lòng nhập từ khoá cần tìm!")
                        </script>
                    ';
                    // $truyvan = "SELECT * FROM sanpham";
                    echo '<script> location.replace("./inc/404.php"); </script>';
                }
                $thucthi = mysqli_query($conn,$truyvan);
                $count = mysqli_num_rows($thucthi); 
            ?>
    <div class="h5 mb-2 mt-1 border-start rounded border-4 border-primary p-2 border-bottom">
        <?php
            if($_POST['tim-kiem'] != ''){
                echo 'Tìm thấy <span class="text-danger">'.$count.'</span> kết quả với từ khoá: <span class="fst-italic text-danger">'.$tu_khoa_tim_kiem.'</span>';
            }else{
                echo '<span class="text-danger"></span>';
            }
        ?>
        
    </div>        
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">            
                <?php
                while($row = mysqli_fetch_array($thucthi)){
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
                                    <img src="./admin/images/'.$row['hinh_anh'].'" class="card-img-top" alt="product.title" />
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
                                    <div class="clearfix mb-1">
                                        <span class="float-start"><a href="#"><i class="fas fa-question-circle"></i></a></span>
                                        <span class="float-end">
                                            <i class="far fa-heart" style="cursor: pointer; "></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            }
        ?>
    </div>
</div>