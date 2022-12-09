<?php
  if (isset($_GET['page'])) {
      $page = $_GET['page'];
  } else {
      $page = 1;
  }
  $rowPerPage = 10;
  $perPage = $page * $rowPerPage - $rowPerPage;

  $query = mysqli_query($conn, "SELECT * FROM dondathang LIMIT $perPage,$rowPerPage");
  $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM dondathang"));
  $totalPages = ceil($totalRows / $rowPerPage);
  $listPage = "";

    for ($i = 1; $i <= $totalPages; $i++) {
        if ($page == $i) {
            $listPage .= '
              <li class="page-item">
                <a class="page-link" href="quantri.php?layout=quanlydondathang&page=' . $i . '">' . $i . '</a>
              </li>
            ';
        } else {
            $listPage .= '
              <li class="page-item">
                <a class="page-link" href="quantri.php?layout=quanlydondathang&page=' . $i . '">' . $i . '</a>
              </li>
            ';
        }
    }
?>
  <h1 class="panel-title">QUẢN LÝ ĐƠN ĐẶT HÀNG</h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead class="text-center align-middle">
            <th>ID</th>
            <th>Người mua</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Ngày mua</th>
            <th>Xem chi tiết</th>
          </thead>
          <?php
            while ($row = mysqli_fetch_array($query)) {
              echo '
                <tr>
                  <td align="center" class="text-center align-middle">' . $row['id'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['hoten'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['sdt'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['diachi'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['tensanpham'] . '</td>
                  <td align="center" class="text-right align-middle">' . number_format($row['dongia']) . '</td>
                  <td align="center" class="text-center align-middle">' . $row['ngaythanhtoan'] . '</td>
                  <td align="center" class="text-center align-middle">
                    <a href="./quantri.php?layout=chitietdondathang&&date=' . $row['ngaythanhtoan'] . '&&id='.$row['id_tk'].'" class="text-primary"><i class="fas fa-eye"></i></a>
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

