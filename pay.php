<?php 

// foreach($userInfo1 as $info){
//     extract($info);
// }
// // echo $full_name;
// var_dump($Sp_cart);  
extract($userInfo1);

$result = implode(';', array_map(function($item) {
    return $item['book_name'];
  }, $Sp_cart));

// echo $result;
// var_dump($Sp_cart);


$result1 = implode(';', array_map(function($item) {
    return $item['book_quantity'];
  }, $Sp_cart));
// echo $result1;

$result2 = implode(';', array_map(function($item) {
    return $item['price'];
  }, $Sp_cart));
// echo $result2;
// echo $book_quantity;
// $book_price = implode(';', array_map(function($item) {
// return $item['$book_price'];
// }, $Sp_cart));

// echo $book_price;

//   echo $result;
//   echo $result;
// var_dump($userInfo1);

// $temp = 'Tạ du;Hạ triều;Hạ tri dư;Tiêu ngạn';
// extract($temp);
// var_dump($temp);
?>

<link rel="stylesheet" href="../css/pay.css">

</head>
<body>
    <!-- header -->
    <header id="header">
        <!-- header top -->
        <div class="header__top">
            <div class="container">
                <section class="row flex">
                    <div class="col-lg-5 col-md-0 col-sm-0 heade__top-left">
                        <span>MagicBook - Điều kì diệu qua từng trang sách</span>
                    </div>

                    <nav class="col-lg-7 col-md-0 col-sm-0 header__top-right">
                        <ul class="header__top-list">
                            <li class="header__top-item">
                                <a href="index.html" class="header__top-link">

                                Hỏi đáp</a>
                            </li>
                            <li class="header__top-item">
                                <a href="#" class="header__top-link">Hướng dẫn</a>
                            </li>
                            <li class="header__top-item">
                                <?php 
                                    if (isset($_SESSION['iduser'])) {
                                        echo '
                                        <li class="header__top-item">
                                        <a href="#" class="header__top-link">Xin Chào '.$_SESSION['user'].'</a>
                                        </li>
                                        ';
                                        echo '<a href="./index.php?act=logout" class="header__top-link">Đăng Xuất</a>';
                                    }
                                    else{
                                        echo '<a href="#" class="header__top-link">Đăng Nhập/Đăng ký</a>';
                                    }  
                                ?>
                            </li>
                        </ul>
                    </nav>
                </section>
            </div>
        </div>
        <!--end header top -->

        <div class="header__bottom">
            <div class="container">
                <section class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 header__logo">
                        <h1 class="header__heading">
                            <a href="#" class="header__logo-link">
                                <img src="../images1/logo1.png" alt="Logo" class="header__logo-img">
                            </a>
                        </h1>
                    </div>

                    <form action="./index.php?act=find" method="post" class="col-lg-6 col-md-7 col-sm-0 header__search">
                    <!-- <div class="col-lg-6 col-md-7 col-sm-0 header__search"> -->
                        
                            <select name="catalogy_name" id="" class="header__search-select">
                                <option value="0">All</option>
                                <?php
                                    foreach($echo_all_catalogy as $data){
                                        extract($data);
                                    echo '
                                    <option value="'.$id.'">'.$name.'</option>
                                    ';
                                    }
                                ?>
                            </select>
                            <input type="text" name="find_value" class="header__search-input" placeholder="Tìm kiếm tại đây...">
                        <button class="header__search-btn">
                            <div class="header__search-icon-wrap">
                                <i class="fas fa-search header__search-icon"></i>
                            </div>
                        </button>
                        
                    <!-- </div> -->
                    </form>

                    <div class="col-lg-2 col-md-0 col-sm-0 header__call">
                        <div class="header__call-icon-wrap">
                            <i class="fas fa-phone-alt header__call-icon"></i>  
                        </div>
                        <div class="header__call-info">
                            <div class="header__call-text">
                                Gọi điện tư vấn
                            </div>
                            <div class="header__call-number">
                                0585.245.989
                            </div>
                        </div>
                    </div>

                    <a href="./index.php?act=Cart" class="col-lg-1 col-md-1 col-sm-0 header__cart">
                        <div class="header__cart-icon-wrap">
                                <?php
                                foreach ($count as $item) {
                                ?>
                                <span class="header__notice"> <?php echo $item ?> </span>
                                <?php } ?>
                                <i class="fas fa-shopping-cart header__nav-cart-icon"></i>
                        </div>
                    </a>
                </section>
            </div>   
        </div>
        <!--end header bottom -->

        <!-- header nav -->
        <div class="header__nav">
            <div class="container">
                <section class="row">

                <div class="header__nav col-lg-9 col-md-0 col-sm-0">
                        <ul class="header__nav-list">
                            <li class="header__nav-item">
                                <a href="index.php" class="header__nav-link">Trang chủ</a>
                            </li>
                            <li class="header__nav-item">
                                <a href="index.php?act=catalogy" class="header__nav-link">Danh mục sản phẩm</a>
                            </li>
                            <!-- <li class="header__nav-item">
                                <a href="index.php?act=Product" class="header__nav-link">Sản phẩm</a>
                            </li>
                            <li class="header__nav-item">
                                <a href="post.html" class="header__nav-link">Bài viết</a>
                            </li>
                            <li class="header__nav-item">
                                <a href="#" class="header__nav-link">Tuyển cộng tác viên</a>
                            </li>
                            <li class="header__nav-item">
                                <a href="contact.html" class="header__nav-link">Liên hệ</a>
                            </li> -->
                        </ul>
                    </div>      
                </section>
            </div>
        </div>
    </header>
    <!--end header nav -->
        <form action="./index.php?act=Bill" method="post">
        <input type="hidden" name="allBooks" value="<?php echo $result?>">
        <input type="hidden" name="book_quantity" value="<?php echo $result1?>">
        <input type="hidden" name="book_price" value="<?php echo $result2?>">
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-6">
                    <div class="mb-4">
                        
                        <h4 class="font-weight-semi-bold mb-4">Địa Chỉ Thanh Toán</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Họ và Tên</label>
                                <input class="form-control" type="text" placeholder="Trần Bách Thành Tài,...etc" value="<?php echo $full_name; ?>" />
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" type="text" name="phone" placeholder="0963898231" value="<?php echo $phone; ?>"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control"  name="address" type="text" placeholder="Hạ Long" value="<?php echo $address; ?>"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Phương thức thanh toán</label>
                                <select class="form-control" id="payment-method" name="payment-method">
                                    <option value="0" class="form-control" selected>Chọn hình thức thanh toán</option>
                                    <option value="Cash" class="form-control">Thanh toán khi nhận hàng</option>
                                    <option value="Momo" class="form-control">Thanh toán qua MOMO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div class="col-lg-6">
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Tổng Số Đơn Hàng</h4>
                        </div>
                        <div class="card-body">
                            <h2 class="font-weight-medium mb-3">Sản Phẩm</h2>
                            <?php
                            $total = 0;
                            foreach($onePersonCart as $item){
                                
                                extract($item);
                                $total += $price*$book_quantity;
                                
                                echo '<div class="d-flex justify-content-between">
                                <p>'.$book_name.' X'.$book_quantity.'</p>
                                <p>'.number_format($book_quantity*$price, 0, '.', '.').' VND</p>
                                </div>';
                            }
                            ?>
                                <!-- <hr class="mt-0">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Tổng phụ</h6>
                                    <h6 class="font-weight-medium"><php echo $total >VNĐ</h6>
                                </div> -->
                            <!-- <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium" id="cost">25.000VNĐ</h6>
                            </div> -->
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h2 class="font-weight-bold">Tổng Cộng</h2>
                                <h2 class="font-weight-bold"><?php echo number_format($total, 0, '.', '.'); ?>VNĐ</h2>
                            </div>
                        </div>
                    </div>
                            
                </div>
            </div>
            
        </div>
        <div class="card-footer border-secondary bg-transparent">
            <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">
                Đặt Hàng
            </button>
        </div>
        </form>
    </body>
</html>
