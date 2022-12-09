<div class="container-fluid">
    <div class="row border border-1 rounded">
        <div class="col-12">
            <h5 class="mt-2 border-start border-3 rounded border-bottom border-primary p-2 text-primary">BÌNH LUẬN</h5>
            <form method="post" class="was-validated">
                <div class="mb-3">
                    <label for="hoten" class="form-label fw-bold">Họ tên</label>
                    <input type="text" name="hoten" class="form-control is-invalid" required >
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label fw-bold">Viết bình luận</label>
                    <textarea required name="binh_luan" placeholder="Viết bình luận vào đây" class="form-control is-invalid" rows="3"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary float-end mb-4" class="form-control">Gửi bình luận</button>
            </form>
        </div>
        <hr>
        <div class="col-12">
            <?php
            // Kiểm tra nếu tồn tại (nhấn) nút GỦI BÌNH LUẬN
                if (isset($_POST['submit'])) {
                // tạo biến $hoten, $id_sp, $binh_luan, $ngay_gio để lưu các giá trị người dùng nhập ở form bình luận
                    $hoten = $_POST['hoten'];
                    $id_sp = $_GET['id_sp'];
                    $binh_luan = $_POST['binh_luan'];
                    date_default_timezone_set('Asia/SaiGon');
                    $ngay_gio = date('Y/m/d H:i:s');
                // thực thi, tiến hành INSERT (chèn) các nội dung ở trên vào bẳng bình luận
                    mysqli_query($conn, "INSERT INTO binhluan(id,id_sp,ho_ten,ngay_tao,noi_dung) VALUES(null, '$id_sp', '$hoten', '$ngay_gio', '$binh_luan')");
                }
            ?>
            <div>
                <h5 class="mt-2 border-start border-3 rounded border-bottom border-success p-2 text-success">BÌNH LUẬN GẦN ĐÂY</h5>
                <?php
                // tạo biến $id_sp để lấy mã của sản phẩm trên thanh URL
                    $id_sp = $_GET['id_sp'];
                // tạo biến $query để lưu các kết quả từ câu truy vấn bên dưới với điều kiện là mã sản phẩm trong bản bình luận trùng với sản phẩm đang xem
                    $query = mysqli_query($conn, "SELECT * FROM binhluan WHERE id_sp = '$id_sp'");
                // tạo biến $count_view để thực thi và lưu giá trị là kết quả số lượng kết quả vừa truy vấn được ở câu lệnh bên trên
                    $count_view = mysqli_num_rows($query);
                    echo '
                        <span class="total_conmment">Bài viết này có <b>' . $count_view . '</b> bình luận</span>
                    ';
                ?>
                <?php
                if($count_view > 0){ ?>
                <?php
                    //TÌM TỔNG SỐ RECORDS
                        $result_total = mysqli_query($conn, "SELECT count(id) AS total FROM binhluan WHERE id_sp = '$id_sp'");
                        $row = mysqli_fetch_array($result_total);
                        $total_records = $row['total'];
                    //TÌM LIMIT VÀ CURRENT_PAGE
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $limit = 5;
                    // TÍNH TOÁN TOTAL_PAGE VÀ START
                    // tổng số trang
                        $total_page = ceil($total_records / $limit);
                    // Giới hạn current_page trong khoảng 1 đến total_page
                        if ($current_page > $total_page) {
                            $current_page = $total_page;
                        } else if ($current_page < 1) {
                            $current_page = 1;
                        }
                    // Tìm Start
                        $start = ($current_page - 1) * $limit;
                        // TRUY VẤN LẤY DANH SÁCH TIN TỨC
                        // Có limit và start rồi thì truy vấn CSDL lấy danh sách
                            $result_view = mysqli_query($conn, "SELECT * FROM binhluan WHERE id_sp = '$id_sp' LIMIT $start, $limit");
                        ?>
                
                <div>
                <?php
                    // HIỂN THỊ DANH SÁCH
                    while ($row = mysqli_fetch_array($result_view)) {
                        echo '
                            <ul class="list-unstyled">
                                <li class="p-2 fw-bold text-dark"><i class="fas fa-user text-primary"></i> ' . $row['ho_ten'] . '
                                <span class="ms-3"><i class="fas fa-calendar text-warning"></i> ' . $row['ngay_tao'] . ' </span></li>
                                <li class="p-2 ms-5 bg-light text-dark border-start rounded  border-success">' . $row['noi_dung'] . '</li>
                            </ul>
                        ';
                    }
                ?>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <?php
                    //  HIỂN THỊ PHÂN TRANG
                    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                    if ($current_page > 1 && $total_page > 1) {
                        echo '
                            <li class="page-item">
                                <a href="index.php?layout=view&&id_sp=' . $id_sp . '&&page=' . ($current_page - 1) . '">Prev</a> | 
                            </li>
                        ';
                    }
                    // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++) {
                        // Nếu là trang hiện tại thì hiển thị thẻ span
                        // ngược lại hiển thị thẻ a
                        if ($i == $current_page) {
                            echo '
                                <li class="page-item">
                                    <span>Trang ' . $i . '</span> | 
                                </li>
                            ';
                        } else {
                            echo '
                                <li class="page-item">
                                    <a href="index.php?layout=view&&id_sp=' . $id_sp . '&&page=' . $i . '">Trang ' . $i . '</a> | 
                                </li>
                            ';
                        }
                    }
                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                    if ($current_page < $total_page && $total_page > 1) {
                        echo '
                            <li class="page-item">
                                <a href="index.php?layout=view&&id_sp=' . $id_sp . '&&page=' . ($current_page + 1) . '">Next</a>  
                            <li class="page-item">
                        ';
                    }
                ?>
            </ul>
        </nav>
            <?php
        }else{?>
            <div class="">Hiện chưa có bình luận nào! Bạn hãy là người bình luận đầu tiên.</div>
        <?php }
        ?>
        </div>
    </div>
</div>
