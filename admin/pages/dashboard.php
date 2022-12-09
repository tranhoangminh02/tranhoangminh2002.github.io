
<div class="row">
    <div class="col-xl-5 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Giỏ hàng</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                            $truyvan = mysqli_query($conn,"SELECT count(id_giohang) as row FROM giohang");
                            $row = mysqli_fetch_array($truyvan);
                            echo $row['row'];
                        ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-xl-5 col-md-12 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Doanh thu</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                            $truyvan_ = mysqli_query($conn,"SELECT sum(dongia) as tatol_price FROM dondathang");
                            $row_ = mysqli_fetch_array($truyvan_);
                            echo number_format($row_['tatol_price']);
                        ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-5 col-md-12 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sản phẩm
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?php
                                    $truyvan__ = mysqli_query($conn,"SELECT count(id_sp) as tatol_product FROM sanpham");
                                    $row__ = mysqli_fetch_array($truyvan__);
                                    echo $row__['tatol_product'];
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-xl-5 col-md-12 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Đánh giá</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                                $truyvan___ = mysqli_query($conn,"SELECT count(id) as bldg FROM binhluan");
                                $row___ = mysqli_fetch_array($truyvan___);
                                echo $row___['bldg'];
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
