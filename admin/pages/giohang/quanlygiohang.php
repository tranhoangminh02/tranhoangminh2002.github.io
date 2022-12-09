<?php
  if (isset($_GET['page'])) {
      $page = $_GET['page'];
  } else {
      $page = 1;
  }
  $rowPerPage = 5;
  $perPage = $page * $rowPerPage - $rowPerPage;

  $sql = "SELECT * FROM giohang  LIMIT $perPage,$rowPerPage";
  $query = mysqli_query($conn, $sql);
  $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM giohang"));
  $totalPages = ceil($totalRows / $rowPerPage);
  $listPage = "";

    for ($i = 1; $i <= $totalPages; $i++) {
        if ($page == $i) {
            $listPage .= '
              <li class="page-item">
                <a class="page-link" href="quantri.php?layout=quanlygiohang&page=' . $i . '">' . $i . '</a>
              </li>
            ';
        } else {
            $listPage .= '
              <li class="page-item">
                <a class="page-link" href="quantri.php?layout=quanlygiohang&page=' . $i . '">' . $i . '</a>
              </li>
            ';
        }
    }
?>
  <h1 class="panel-title">QUẢN LÝ GIỎ HÀNG</h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead class="text-center align-middle">
            <th>ID User</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
            <th>Ngày đặt</th>
            <th class="delete">Xoá</th>
          </thead>
          <?php
            while ($row = mysqli_fetch_array($query)) {
              echo '
                <tr>
                  <td align="center" class="text-center align-middle">' . $row['id_tk'] . '</td>
                  <td align="center"><img src="../images/' . $row['hinh_anh'] . '" alt="" width="50%" class="img-responsive img-rounded text-center align-middle" ></td>
                  <td align="center" class="text-center align-middle">' . $row['ten_sp'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['so_luong'] . '</td>
                  <td align="center" class="text-center align-middle">' . number_format($row['don_gia']) . '</td>
                  <td align="center" class="text-center align-middle">' . number_format($row['thanh_tien']) . '</td>
                  <td align="center" class="text-center align-middle">' . $row['ngay_dat'] . '</td>
                  <td align="center" class="text-center align-middle">
                    <a href="./quantri.php?layout=xoagiohang&&id=' . $row['id_giohang'] . '" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
              ';
            }
          ?>
        </table>
      </div>
    </div>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
        <?php echo $listPage?>
    </ul>
  </nav>

