<style>
    :root {
    --color-white: #fff;
    --color-black: #000;
    --color-pri: rgb(231, 38, 38);
    --color-border: rgb(0, 0, 0, 0.1);
    --color-text: #333;
    --color-bg-sidebar: rgb(44, 231, 175);
  }

    /* // phần cart  */
  .header-cart {
    float: right;
    position: relative;
    margin-right: 20px;
    padding: 2px 26px;
  }
  
  .header-cart-icon {
    font-size: 20px;
    /* color: var(--color-pri); */
  }
  .header-cart__view {
    border-radius: 4px;
    z-index: 1;
    position: absolute;
    top: 35px;
    right: 18px;
    width: 400px;
    min-height: 120px;
    background-color: var(--color-white);
    padding: 10px;
    box-shadow: 2px 2px 4px rgb(0, 0, 0, 0.5);
    border: 1px solid var(--color-border);
    display: none;
  }
  /* phần mũi nhọn */
  .header-cart__view::before {
    content: "";
    right: 14px;
    top: -18px;
    border-style: solid;
    position: absolute;
    border-width: 10px 10px;
    border-color: transparent transparent white transparent;
  }
  .header-cart-header {
    border-bottom: 1px solid rgb(0, 0, 0, 0.1);
    width: 100%;
    height: 30px;
    font-weight: bold;
    /* padding: 12px; */
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: default;
    margin: 0 0 12px 0;
  }
  
  .header-cart-title {
    width: 100%;
    float: left;
    text-align: left;
    /* font-size: 1.4rem; */
    color: var(--color-text);
  }
  
  /* list cart  */
  .header-cart-list {
    padding: 0;
    margin: 0;
    max-height: 50vh;
    margin-bottom: 10px;
    overflow-y: scroll;
  }
  
  .header-cart-item {
    padding: 8px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
  }
  .header-cart-item__title {
    flex: 1;
  }
  .header-car-item__price,
  .header-cart-count-item span {
    color: var(--color-pri);
  }
  .header-cart-count-item p{
      color: var(--color-text);
  }
  .header-cart-item__img,
  .header-cart-item__title,
  .header-car-item__price {
    padding: 5px;
    max-height: 40px;
  }
  
  .header-cart-item__img {
    width: 40px;
    border: 1px solid var(--color-pri);
    -ms-flex-item-align: center;
    -ms-grid-row-align: center;
    align-self: center;
  }
  .header-cart-item:nth-child(odd) {
    background-color: rgba(0, 0, 0, 0.1);
  }
  .cart-empty--img {
    width: 100%;
    padding: 20px;
    cursor: default;
  }
  .header-cart-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  
  .cart-btn a {
    background-color: transparent;
    text-decoration: none;
    color: var(--color-white);
  }
  
  .header-cart:hover .header-cart__view {
    display: block;
  }
</style>

<div class="header-cart">
    <span class=" position-relative">
      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/> 
      </svg>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          <?php
           if(isset($_SESSION['username'])){
            $user = $_SESSION['username'];
            $truyvan_user = mysqli_query($conn,"SELECT * FROM taikhoan WHERE username = '$user'");
            $thucthi_user = mysqli_fetch_array($truyvan_user);
            $id_user = $thucthi_user['id_tk'];
      
            $truyvan = mysqli_query($conn,"SELECT * FROM giohang WHERE id_tk = '$id_user'");
            $count = mysqli_num_rows($truyvan);
            echo $count;
           }else{
             echo '0';
           }
          ?>
      </span>
    </span>
    <div class="header-cart__view text-gray-900">
      <div class="header-cart-header">
        <span class="header-cart-title">Sản phẩm mới thêm</sp>
      </div>
      <ul class="header-cart-list text-gray-900">
        <?php 
          if(isset($_SESSION['username'])){
            $user = $_SESSION['username'];
            $truyvan_user = mysqli_query($conn,"SELECT * FROM taikhoan WHERE username = '$user'");
            $thucthi_user = mysqli_fetch_array($truyvan_user);
            $id_user = $thucthi_user['id_tk'];
      
            $truyvan = mysqli_query($conn,"SELECT * FROM giohang WHERE id_tk = '$id_user'");
            $count = mysqli_num_rows($truyvan);
            while($row = mysqli_fetch_array($truyvan)){
              $gia = number_format($row['don_gia']);
              echo'
              <li class="header-cart-item">
                  <img src="./admin/images/'.$row['hinh_anh'].'" alt="product photo" class="header-cart-item__img">
                  <h6 class="header-cart-item__title text-dark">'.$row['ten_sp'].'</h6>
                  <span class="header-car-item__price">'.$gia.' đ</span>
              </li>
              
              ';
            }
            echo'
            </ul>
                <div class="header-cart-footer">
                  <span class="header-cart-count-item">
                      <p>Có <span>'.$count.'</span> sản phẩm trong giỏ hàng</p>
                  </span>
                  <a href="index.php?layout=gio_hang" class="btn btn-primary">Chi tiết giỏ hàng</a>
                </div>
            ';
          }else{
            echo'
              <img class="cart-empty--img" src="./admin/images/empty-cart.png" alt="giỏ hàng trống">
              <span class="text-danger">Vui lòng <a class="" href="./admin/index.php" ><span class="glyphicon glyphicon-user" ></span> đăng nhập</a> để mua hàng!!!</span>
            ';
          }
          ?>        
    </div>
</div>