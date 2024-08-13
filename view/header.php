<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css?<?= time(); ?>" />
    <!-- font-size -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.14/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.14/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
</head>

<body>
    <header>
        <section class="sreach">
            <form action="">
                <input type="text" placeholder="   Tìm kiếm..." />
            </form>
            <div>
                <a href="./index.php?act=add_to_wishlist"><i class="fa-regular fa-heart"></i></a>
                <a href="./index.php?act=giohang"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </section>
    </header>
    <nav>
        <ul class="sub-menu sub1">
            <li><a href="./index.php">Trang chủ</a></li>
            <li><a href="#!">Sản phẩm</a></li>
            <li><a href="#!">Tin tức</a></li>
        </ul>
        <h1 class="iii"><a href="./index.php" style="text-decoration: none; color: black;">TDI</a></h1>
        <ul class="sub-menu sub2">
            <li><a href="#!">Sale</a></li>
            <?php if(isset($_SESSION['username'])) { ?>
                <li><a href="?act=taikhoan">Tài khoản</a></li>
                <li><a href="?act=dangxuat">Đăng Xuất</a></li>
            <?php } else { ?>
                <li><a href="./view/login/dangnhap.php">Đăng nhập</a></li>
                <li><a href="./view/login/signup.php">Đăng ký</a></li>
            <?php } ?>
        </ul>
    </nav>
    <?php if($_GET['act'] == "home" || $_GET['act'] == "") { ?>
    <section class="banner">
        <img src="./img/banner-gia-dung1.jpg" alt="" />
    </section>
    <?php } ?>