<?php
  if (isset($_GET['page'])) {
      $page = $_GET['page'];
  } else {
      $page = 1;
  }
  $rowPerPage = 5;
  $perPage = $page * $rowPerPage - $rowPerPage;

  $sql = "SELECT * FROM sanpham INNER JOIN danhmuc ON sanpham.id_dm = danhmuc.id_dm ORDER BY sanpham.id_sp DESC LIMIT $perPage,$rowPerPage";
  $query = mysqli_query($conn, $sql);
  $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham"));
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
?>
  <h1 class="panel-title">QUẢN LÝ SẢN PHẨM</h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="./quantri.php?layout=themsanpham" class="btn btn-primary" role="button">Thêm sản phẩm</a>
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
          <?php
            while ($row = mysqli_fetch_array($query)) {
              echo '
                <tr>
                  <td align="center" class="text-center align-middle">' . $row['id_sp'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['ten_sp'] . '</td>
                  <td align="center"><img src="../images/' . $row['hinh_anh'] . '" alt="" width="50%" class="img-responsive img-rounded text-center align-middle" ></td>
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

