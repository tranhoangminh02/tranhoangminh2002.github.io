<?php
    if(isset($_POST['submit'])){
        if(isset($_POST['tim-kiem-admin']) && $_POST['tim-kiem-admin']){
            $tukhoatimkiem = $_POST['tim-kiem-admin'];
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $rowPerPage = 5;
            $perPage = $page * $rowPerPage - $rowPerPage;
            $query = mysqli_query($conn,"SELECT * FROM danhmuc INNER JOIN sanpham ON danhmuc.id_dm = sanpham.id_dm INNER JOIN hangsanxuat ON sanpham.id_hang_sx = hangsanxuat.id_hang_sx WHERE ten_hang_sx LIKE '%$tukhoatimkiem%' OR ten_dm LIKE '%$tukhoatimkiem%' OR ten_sp LIKE '%$tukhoatimkiem%' OR loai_sp LIKE '%$tukhoatimkiem%'");
            $totalRows = mysqli_num_rows($query);
            $totalPages = ceil($totalRows / $rowPerPage);
            $listPage = "";
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($page == $i) {
                    $listPage .= '
                    <li class="page-item">
                        <a class="page-link" href="quantri.php?layout=quanlysanpham&page=' . $i . '">' . $i . '</a>
                    </li>
                    ';
                } else {
                    $listPage .= '
                    <li class="page-item">
                        <a class="page-link" href="quantri.php?layout=quanlysanpham&page=' . $i . '">' . $i . '</a>
                    </li>
                    ';
                }
            }
            echo '
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        Tìm thấy <span class="font-italic text-danger">'.$totalRows.'</span> kết quả với từ khoá: <span class="font-italic text-danger">'.$tukhoatimkiem.'</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead class="text-center align-middle">
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th class="update">Sửa</th>
                                    <th class="delete">Xoá</th>
                                </thead>
            ';
            // Do data
            while ($row = mysqli_fetch_array($query)) {
                echo '
                    <tr>
                        <td align="center" class="text-center align-middle">' . $row['id_sp'] . '</td>
                        <td align="center" class="text-center align-middle">' . $row['ten_sp'] . '</td>
                        <td align="center"><img src="../images/' . $row['hinh_anh'] . '" alt="" width="50%" class="img-responsive img-rounded text-center al    ign-middle" ></td>
                        <td align="center" class="text-center align-middle">' . $row['so_luong'] . '</td>
                        <td align="center" class="text-center align-middle">
                            <a href="./quantri.php?layout=suasanpham&&id=' . $row['id_sp'] . '" class="text-warning"><i class="fas fa-edit"></i></a>
                        </td>
                        <td align="center" class="text-center align-middle">
                            <a onclick="return delete_baiviet()" href="./quantri.php?layout=xoasanpham&&id=' . $row['id_sp'] . '" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                ';
            }
            echo '
                            </table>
                        </div>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">'.$listPage.'</ul>
                </nav>
            ';
        }else{
            echo '<script> location.replace("quantri.php?layout=404"); </script>';
        }    
    }    
?>  
                    