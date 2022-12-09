
<?php
  if (isset($_GET['page'])) {
      $page = $_GET['page'];
  } else {
      $page = 1;
  }
  $rowPerPage = 5;
  $perPage = $page * $rowPerPage - $rowPerPage;

  $sql = "SELECT * FROM binhluan INNER JOIN sanpham ON sanpham.id_sp = binhluan.id_sp ORDER BY sanpham.id_sp DESC LIMIT $perPage,$rowPerPage";
  $query = mysqli_query($conn, $sql);
  $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM binhluan"));
  $totalPages = ceil($totalRows / $rowPerPage);
  $listPage = "";

    for ($i = 1; $i <= $totalPages; $i++) {
        if ($page == $i) {
            $listPage .= '
              <li class="page-item">
                <a class="page-link" href="quantri.php?layout=quanlybinhluan&page=' . $i . '">' . $i . '</a>
              </li>

            ';
        } else {
            $listPage .= '
              <li class="page-item">
                <a class="page-link" href="quantri.php?layout=quanlybinhluan&page=' . $i . '">' . $i . '</a>
              </li>
            ';
        }
    }

?>
  <h1 class="panel-title">QUẢN LÝ BÌNH LUẬN</h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead class="text-center align-middle">
            <th>Mã bình luận</th>
            <th>Mã sản phẩm</th>
            <th>Người bình luận</th>
            <th>Ngày bình luận</th>
            <th>Nội dung bình luận</th>
            <th class="update">Sửa</th>
            <th class="delete">Xoá</th>
          </thead>
          <?php
            while ($row = mysqli_fetch_array($query)) {
              echo '
                <tr>
                  <td align="center" class="text-center align-middle">' . $row['id'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['id_sp'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['ho_ten'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['ngay_tao'] . '</td>
                  <td align="center" class="text-center align-middle">' . $row['noi_dung'] . '</td>
                  <td align="center" class="text-center align-middle">
                    <a href="./quantri.php?layout=suabinhluan&&id=' . $row['id'] . '" class="text-warning"><i class="fas fa-edit"></i></a>
                  </td>
                  <td align="center" class="text-center align-middle">
                    <a href="./quantri.php?layout=xoabinhluan&&id=' . $row['id'] . '" class="text-danger"><i class="fas fa-trash-alt"></i></a>
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

